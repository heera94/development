<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ResponseController;
use App\User;
use App\Model\Userdetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.profile.show');
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
        return view('users.index', compact('user','image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     public function update(Request $request)
        {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
          
               ]);
             $user= User::where('id',Auth::User()->id)->update(['name'=> $request->name ,'email'=>$request->email]);

            $this->validate($request, [
                'city' => 'required',
                'dob' => 'required',
          
               ]);

            $users= Userdetails::where('user_id',Auth::User()->id)->update(['city'=> $request->city ,'dob'=>$request->dob]);

            return redirect('/my-profile');

        }
          
      
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateUserProfileImage(Request $request)
    {
        $result = [];
        return ResponseController::sendResponse($request, [
            "route" => "department.index",
            "data" => $result,
            "message" => trans('messages.success-updated')
        ]);
    }

    
    public function getProfile(Request $request)
    { 
       $user= User::where('users.id',Auth::User()->id)->select('user_details.city','user_details.dob')
       ->leftjoin('user_details','users.id','=','user_details.user_id')
       ->first();
     
       return view('admin.profile.my-profile',[

                    'user' => $user
           ]);
    }

    public function saveProfile(Request $request)
    {  

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'password' => 'required',
            'city'=> 'required',
            'dob' => 'required',
            'email' => 'required|email|max:150|unique:users,email,NULL,id,deleted_at,NULL',
        ]);
         
           
        if ($validator->passes()) {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            $id = User::where('email',$request->email)->select
            ('id')->first()->id;
            $details = new Userdetails();
            $details->user_id = $id;
            $details->dob= $request->dob;
            $details->city = $request->city;
            $details->save();
        
        }
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Error!');
     
        }
}
