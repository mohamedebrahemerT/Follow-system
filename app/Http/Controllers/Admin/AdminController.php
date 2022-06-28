<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
  use Auth;
use App\Models\admin;
use App\Models\Order;

use Hash;

class AdminController extends Controller
{

     public function __construct() {
           
        $this->middleware('AdminRole:dashboard_show', [
            'only' => ['dashboard'],
        ]);

          $this->middleware('AdminRole:admins_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:admins_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:admins_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:admins_delete', [
            'only' => ['destroy', 'multi_delete'],
        ]);
        
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins=admin::
        where('id','!=','1')->
        where('type','=','superadmin')
        ->get();
     return view('admin.admins.index',compact('admins'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     return view('admin.admins.create');

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

      ///  return request();

         $data = $this->validate(\request(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:admins',
                'password' => 'required',
                'phone' => 'required|unique:admins',
                'group_id' => 'required',

                 
            ]);

                       $data['password']=Hash::make($request->password);

        $admin=admin::create($data);

        session()->flash('success', trans('trans.createSuccess'));
        return   redirect('/admins');
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
       $admin=admin::where('id',$id)->first();

     return view('admin.admins.edit',compact('admin'));

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
           // return request();
         $data = $this->validate(\request(),
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'phone' => 'required',
                'group_id' => 'required',
                
                 
            ]);

                        $data['password']=Hash::make($request->password);
     
        $admin=admin::where('id',$request->id)->update($data);

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
          $admin=admin::where('id',$id)->first();
                  $admin->delete();
              session()->flash('danger', trans('trans.deleteSuccess'));
        return   redirect('/admins');
    }

        public function viwlogin ()
        {
          if (Auth::guard('admin')->check())
           { 
                

             return view('admin.dashboard');
              
          }
            
             $lang = 'ar';
        if(Session::has('lang')) {
            $lang = Session::get('lang');
        }
        app()->setLocale($lang);
        Session::put('lang', $lang);
             return view('admin.login.viwlogin');
        }

        public function admin_login( )
        { 
               $remeber=Request('Remember')==1? true:false ;
     
  if(Auth::guard('admin')->attempt( ['email'=>Request('username'),'password'=>Request('password') ],$remeber) )
     {   

        return redirect ('/dashboard');
     }
     
      
     
  
     else
     {
            session()->flash('danger',trans('trans.invald email or password '));
      return redirect('/admin_login');
     }
        }


        public function dashboard()
    {
                

             return view('admin.dashboard');
       
    }

    public function Admin_logout_fun()
            {
              auth('admin')->logout();
              return redirect('/admin_login');

                
                
            }



}


 
