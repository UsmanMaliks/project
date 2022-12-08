<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\RoleDataTable;
use App\DataTables\UserDataTable;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function usertable(UserDataTable $myDataTable)
    {

        $count = Role::count();
        $skip = 1;
        $limit = $count - $skip; // the limit
        $role = Role::skip($skip)->take($limit)->get();
        return $myDataTable->render('dashboard.usertable', compact('role'));
    }
    public function roletable(RoleDataTable $datatable)
    {
        return $datatable->render('dashboard.roletable');
    }

    public function createuser(Request $request)
    {
        $rules = array(
            'name'    =>  'required',
            'email'    =>  'required',
            'password'    =>  'required',
            'password_confirmation'    =>  'required',
            'phone_no'    =>  'required',
            'file'    =>  'required',
            'address' => 'required',
            'role'    =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        if ($request->hasFile('file')) {

            $filename = $request->file->getClientOriginalName();
            $request->file->storeAs('avatar', $filename, 'public');

            $form_data = array(


                'name'    =>  $request->name,
                'email'    =>  $request->email,
                'password'    =>  bcrypt($request->password),
                'phone_no'    =>  $request->phone_no,
                'avatar'    =>  $filename,
                'address' => $request->address,
                'type'    =>  $request->type,
                'is_active' => 0,

            );

            User::create($form_data);

            $createduser = User::where('email', $request->email)->first();

            $createduser->assignRole($request->role);

            return response()->json(['success' => 'User Created Successfully']);
        }

        return response()->json(['success' => 'User not Created']); //error message
    }

    public function edit($id)
    {
        if (request()->ajax()) {
            $data = User::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    public function updateuser(Request $request)
    {
        if ($request->hasFile('file')) {

            $filename = $request->file->getClientOriginalName();
            $request->file->storeAs('avatar', $filename, 'public');
        } else {
            $filename = $request->oldimage;
        }


        $form_data = array(
            "name" => $request->name,
            "email" => $request->email,
            "phone_no" => $request->phone_no,
            "address" => $request->address,
            "avatar" => $filename,
            "type" => $request->type
        );



        User::whereId($request->hidden_id)->update($form_data);

        if ($request->has('role')) {

            $createduser = User::whereId($request->hidden_id)->first();

            $createduser->roles()->detach();

            $createduser->assignRole($request->role);
        }




        return response()->json(['success' => 'Updated']);
    }

    public function updateative(Request $request)
    {

        $form_data = array(
            "is_active" => $request->is_active
        );

        User::whereId($request->hidden_id1)->update($form_data);
        return response()->json(['success' => 'Updated']);
    }

    public function destroy($id)
    {
        $checkadmin = User::whereId($id)->select()->get();

        foreach($checkadmin as $admin)
        {
            $valid = $admin->id;
        }

        if($id == 1)
        {
            $data = array(
                "admin" => "Cannot Delete Admin"
            );
            return response()->json(['result' => $data]);
        }
        else
        {
            $user = User::findOrFail($id);
            $user->delete();
            $data = array(
                "admin" => "deleted"
            );
            return response()->json(['result' => $data]);
        }

    }

    public function rolestore(Request $request)
    {
        $formdata = $request->validate([
            "rolename" => "required",
            "permission" => "required"
        ]);



        $name = $request->rolename;
        $role =  Role::create(['name' => $name]);
        $input = $request->permission;
        $role->givePermissionTo($input);

        return redirect('roletable');
    }

    public function editrole($id)
    {

        if(request()->ajax())
        {
            $data = Role::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    public function editafter($id)
    {

            $roledetail = Role::whereId($id)->select()->get();
            $role = Role::findById($id);
            $permissions = $role->permissions()->get();
            $permissionall = Permission::get();

            return view('dashboard.editrole',compact('role','permissionall','permissions','roledetail'));

    }

    public function createrole()
    {
        $permissions = Permission::get();
        return view('dashboard.createrole',compact('permissions'));
    }

    public function roleupdate(Request $request)
    {
        $role = Role::findById($request->hidden_id);
        $input = $request->permission;
        $role->syncPermissions($input);

        return redirect('roletable');
    }



}
