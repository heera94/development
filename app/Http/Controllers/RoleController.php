<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use DB;

class RoleController extends Controller
{
    use Authorizable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('role.index', compact('roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:roles']);

        if( Role::create($request->only('name')) ) {
            flash('Role Added');
        }

        return redirect()->back();
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
        if($role = Role::findOrFail($id)) {
            // admin role has everything
            if($role->name === 'Admin') {
                $role->syncPermissions(Permission::all());
                return redirect()->route('roles.index');
            }

            $permissions = $request->get('permissions', []);

            $role->syncPermissions($permissions);

            flash( $role->name . ' permissions has been updated.');
        } else {
            flash()->error( 'Role with id '. $id .' not found.');
        }
        return redirect()->route('roles.index');
    }

    /*
    |--------------------------------------------------------------------------
    | @Author: Anju Thomas,Athira NK
    | @Created at: 03-09-2019
    |--------------------------------------------------------------------------
    | @Purpose: Function to getting roles and pass it to blade
    |
    */
    public function getRoles()
    {
        $permissions = Permission::all();
        $permissionAry = json_decode($permissions);
        $roles = Role::all();
        $rolesAry =json_decode($roles);
        $passAry=array();
        for($i=0;$i<count($permissionAry);$i++){
            $value = explode("_",$permissionAry[$i]->name);
            $passAry[$i] = $value[1];
            $passAry2[$i] = $value[0];
            $passAryId[$i] = $permissionAry[$i]->id;
        }
        $passAry = array_unique($passAry);
        $passAry2 = array_unique($passAry2);
        $per_id = DB::table('role_has_permissions')
        ->leftjoin('permissions','role_has_permissions.permission_id','=','permissions.id')
        ->select('permissions.name','role_has_permissions.role_id')
        ->get();
        return view('rolesettings',compact('passAry','passAry2','rolesAry','passAryId','permissions','permissionAry','per_id'));
    }
    /*
    |--------------------------------------------------------------------------
    | @Author: Anju Thomas,Athira NK
    | @Created at: 03-09-2019
    |--------------------------------------------------------------------------
    | @Purpose: Function to save role permissions
    |
    */
    public function saveRolePermissions(Request $request)
    {
        $permissions = $request->get('chkbox', []);
        for($i=0;$i<count($permissions);$i++)
        {
          $value=explode("/",$permissions[$i]);
          $prmsnid[$i]=$value[0];
          $rlid[$i]=$value[1];
          if($role = Role::find($rlid[$i]))
          $role->syncPermissions(Array ($prmsnid));
        }
    }
}
