<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($roleId)
    {
        $permissions = Permission::all();
        $rolepermissions = Role::findOrFail($roleId)->permissions;

        if(count($rolepermissions) > 0){
            foreach($permissions as $permission){
                $permission->setAttribute('active',false);
                foreach($rolepermissions as $rolepermission){
                    if($rolepermission->id == $permission->id){
                        $permission->active = true;
                    }
                }
            }
        }

        return response()->view('cms.spatie.role.rolepermission',['roleId' => $roleId, 'permissions'=>$permissions]);
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
    public function store(Request $request,$roleId)
    {
        $validator = Validator($request->all(),[
         'permission_id' => 'required|exists:permissions,id',
        ]);

        if(!$validator->fails()){
            $role = Role::findorFail($roleId);
            $permission = Permission::findOrFail($request->get('permission_id'));

            if($role->hasPermissionTo($permission->id)){
                $role->revokePermissionTo($permission->id);
                return response()->json(['icon' => 'error' , 'title' =>'removed'],200);

            }else{
                $role->givePermissionTo($permission->id);
                return response()->json(['icon' => 'success' , 'title' =>' added successfully'],200);
            }

        }else{
            return response()->json(['icon'=>'error' , 'title' => $validator->getMessageBag()->first()],400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
