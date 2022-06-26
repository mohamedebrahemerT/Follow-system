<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\role;
use App\Models\role_has_permission;
  use Auth;

class rolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $roles=role::get();
     return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     return view('admin.roles.create');

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


         //return Request();

        $data = $this->validate(\request(),
            [
                'name' => 'required',
                
            ]);

        if(Auth::guard('admin')->check())
                 {
                    $guard_name="admin";
                }
    elseif(Auth::guard('companies')->check())
        {
           $guard_name="companies";
        }
               
               $data['guard_name']=$guard_name;
        $role=role::create($data);

        session()->flash('success', trans('trans.createSuccess'));
        return   redirect('/roles');
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
         $role=role::where('id',$id)->first();

     return view('admin.roles.edit',compact('role'));
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

          $data = $this->validate(\request(),
            [
                'name' => 'required',
               
                
                 
            ]);

        

        $role=role::where('id',$request->id)->update($data);

        session()->flash('success', trans('trans.updatSuccess'));
        return   back();
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
        
                 $role=role::where('id',$id)->first();
                  $role->delete();
              session()->flash('danger', trans('trans.deleteSuccess'));
        return   redirect('/roles');
    }

       public function addpermissions($Role_id)
       {
           # code...
          $role=role::where('id',$Role_id)->first();
               
        return view('admin.roles.addpermissions',compact('Role_id','role'));

       }

       public function addpermissionsPOST(Request $request)
       {

                     $data = $this->validate(\request(),
            [
                'role_id' => 'required',
                'permission_id' => 'required',
                
            ]);
            $role_has_permission=role_has_permission::where('role_id',$request->role_id);
                    $role_has_permission->delete();
                   foreach ($request->permission_id as $key => $value) 
                   {

          $add=new role_has_permission;
            $add->role_id=$request->role_id;
            $add->permission_id=$request->permission_id[$key];
            $add->save();


                    }

                   session()->flash('success', trans('trans.Success'));
        return   redirect('/roles');

              
       }
}
