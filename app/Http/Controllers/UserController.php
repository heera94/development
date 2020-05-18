<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Permission;
use App\Authorizable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\Model\Userdetails;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Http\Controllers\Datatables\DatatableSettings;
use Crypt;
use Datatables;

use Intervention\Image\ImageManagerStatic as Image;
class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = User::latest()->paginate();

        // $userDetails = User::select('id', 'name', 'email','created_at')->with('roles')
        // ->with([
        //   'user_details' => function($query) {
        //     $query->select('id', 'user_id', 'location', 'contact_number', 'image');
        //   }
        // ])->first();
        //
        //
        //   print_r($userDetails->roles);
        return view('user.index');
    }
  
    public function list()
    {
      $userDetails = User::select('id', 'name', 'email','created_at')->with('roles')
      ->with([
        'user_details' => function($query) {
          $query->select('id', 'user_id','city','status');
        }
      ])->get();

       return datatables()->of($userDetails)
      
       ->editColumn('actions', function($userDetails){
          return DatatableSettings::tableActions('users',$userDetails->id);
       })
       ->editColumn('created_by', function($userDetails){
         if(isset($userDetails->creted_by))
         return $userDetails->creted_by;
         else
         return 'Nil';
       })
       ->editColumn('status', function($userDetails){
         if(isset($userDetails->user_details->status)){
		    return DatatableSettings::dataTableStatusSwitcher($userDetails->user_details->status,$userDetails->id,'/change-user-status',$userDetails->row);
        }
        else{
         return 'Nil';
        }
		    })
       ->editColumn('created_at', function($userDetails){
           return DatatableSettings::showCreatedDate($userDetails->created_at,'diffForHumans-only');
       })
       ->rawColumns([ 'created_at','actions','status','created_by'])
       ->make(true);
    }

    
    public function create()
    {
        $roles = Role::pluck('name', 'id');

        return view('user.new', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function store(Request $request)
    {
            $this->validate($request, [
            'name' => 'bail|required',
            'email' => 'required|email|unique:users',
            'dob'=> 'required',
          
            'city'  => 'required'
        ]);
        //File upload
        $imageName = "userimg-".time().".png";
        $path =storage_path().'/app/public/Images/'. $imageName;
        Image::make(file_get_contents($request->image))->save($path);
        // hash password
        $request->merge(['password' => bcrypt($request->get('password'))]);
        // Create the user
        if ( $user = User::create($request->except('roles', 'permissions')) ) {
            $this->syncPermissions($request, $user);
            //Store location,Contact number,image to userdetails table
            $userdetailAry = $request->all();
            $userdetailAry["city"] = $request->city;
            // $userdetailAry["user_id"]  = $user->id;
            // $userdetailAry["image"]    = '$imageName';
            // $userdetailAry["contact_number"] = $request->contact_number;
            Userdetails::create($userdetailAry);

            flash('User has been created.');

        } else {
            flash()->error('Unable to create user.');
        }

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      // return 1;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $user = User::where('id', Crypt::decrypt($id))->select('id', 'name', 'email','password')
        ->with([
          'user_details' => function($query) {
            $query->select('id','city','dob', 'image');
          }
        ])->first();
       
        $image ='data:image/png;base64,'.base64_encode(file_get_contents(storage_path().'/app/public/Images/'.$user->user_details->image));
        return view('profile.index', compact('user','image'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     
    public function update(Request $request, $id)
    {

      $this->validate($request, [
      'name' => 'bail|required',
      'email' => 'required|email',
      'dob' => 'required',
      'image' => 'required',
      'city' => 'required' 

     ]);

        // Get the user
        $user = User::findOrFail($id);

        // Update user
        $user->fill($request->except('roles[]', 'permissions', 'password'));

        // check for password change
        if($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        // Handle the user roles
        $this->syncPermissions($request, $user);
        $user->save();

        //Updates user details values into the user_details table
        $userDetails = Userdetails::where('user_id',$id)->first();
      

        //file upload
        $imageName = "userimg-".time().".png";
        $path =storage_path().'/app/public/Images/'. $imageName;
        Image::make(file_get_contents($request->image))->save($path);
        $userDetails->image=$imageName;
        $userDetails->save();

        flash()->success('User has been updated.');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $status = 0;
        if ( Auth::user()->id == $id ) {
            flash()->warning('Deletion of currently logged in user is not allowed :(')->important();
            return redirect()->back();
        }
        if( User::findOrFail($id)->delete() ) {
            $status = 1;
            flash()->success('User has been deleted');
        } else {
            flash()->success('User not deleted');
        }

        return [
          'status' => $status
        ];
    }
    public function changeStatus(Request $request)
    {
        $id = \Crypt::decrypt($request->id);
        $updateStatus = 'false';
        if($status = Userdetails::select('status')->where('user_id',$id)->first()){
            $message = trans('messages.success-update');
            if($status->status==1){
                $updateStatus = 0;
            }else {
                $updateStatus = 1;
            }
            Userdetails::where('user_id',$id)->update(['status'=>$updateStatus]);
        }else {
            $message = trans('messages.error');
        }
        return [
            'status'    => $updateStatus,
            'message'   => $message
        ];
    }
    /**
     * Sync roles and permissions
     *
     * @param Request $request
     * @param $user
     * @return string
     */
    
     
    public function myProfile()
    {
      $userDetails = User::where('id', Auth::user()->id)->select('id', 'name', 'email')
      ->with([
        'user_details' => function($query) {
          $query->select('id', 'user_id','city');
        }
      ])->first();
      return view('user.index',compact('userDetails'));
    }
}
