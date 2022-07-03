<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
  use Auth;
use App\Models\admin;
use App\Models\Order;
use App\Models\content;
use App\Models\clientsnots;
use App\Models\AdminGroup;

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
        if (admin()->user()->type == 'superadmin') 
        {
           $admins=admin::
        where('id','!=','1')->
        where('type','=','superadmin')->
        Orwhere('type','=','CompanyManger')->
        where('addby',admin()->user()->id)
        ->orderBy('id','desc') 
        ->get();
        }
        else
        {
         $admins=admin::
                where('addby',admin()->user()->id)
                  ->orderBy('id','desc') 
                ->get();
        }
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
         if (admin()->user()->type == 'superadmin') 
        {
            $AdminGroups= AdminGroup::whereNotIn('id',[1,2,3,4,6,7])->get();
          
        }
        else
        {
           $AdminGroups= AdminGroup::whereIn('id',[6,7])->get();
 
          
        }
     return view('admin.admins.create',compact('AdminGroups'));

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

      //  return request();

         $data = $this->validate(\request(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:admins',
                'password' => 'required',
                'phone' => 'required|unique:admins',
                'group_id' => 'required',

                 
            ]);

    $data['password']=Hash::make($request->password);
    $data['addby']=admin()->user()->id;

       if (admin()->user()->type == 'client') 
       {
    $data['type']='Emp';
           
       }
        elseif (admin()->user()->type == 'superadmin') 
        {
            if ($request->group_id == 8) 
            {
           $data['type']='CompanyManger';
               
            }
            else
            {
           $data['group_id']=$request->group_id;

            }

        }
        
       

           if ($request->image) 
               {

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/images/users'), $imageName);
             $data['image'] = 'images/users/'.$imageName;
               } 

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

        if ( !$admin) 
         {
                          session()->flash('danger', trans('trans.productnotfound'));

               return redirect('/admins');
           }

            if (admin()->user()->type == 'superadmin') 
        {
            $AdminGroups= AdminGroup::whereNotIn('id',[1,2,3,4,6,7])->get();
          
        }
        else
        {
           $AdminGroups= AdminGroup::whereIn('id',[6,7])->get();
 
          
        }

     return view('admin.admins.edit',compact('admin','AdminGroups'));

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
                'group_id' => 'sometimes|nullable',
                
                 
            ]);

                        $data['password']=Hash::make($request->password);
        $admin=admin::where('id',$request->id)->first( );

                         if ($request->image) 
               {


                if ($admin->image) 
         {
            if (file_exists($admin->image)) 
            {
                   unlink($admin->image);
            }    
                     
         }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/images/users'), $imageName);
            $data['image'] = 'images/users/'.$imageName;
              }
     
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

            $data=  $this->contentAndclients();
                $content=  $data['content'];
                $clients= $data['clients'];
             return view('admin.dashboard',compact('content','clients'));
              
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
 
               $data=  $this->contentAndclients();
                $content=  $data['content'];
                $clients= $data['clients'];

             return view('admin.dashboard',compact('content','clients'));
       
    }

    public function contentAndclients($value='')
    {
       
 
        if (admin()->user()->type == 'superadmin') 
        {
           $content=content::orderBy('id','desc')->get(); 
               $clients=admin::where('type','client')->orderBy('id','desc')->get();
        }
        elseif(admin()->user()->type == 'AccountManager')
        {
             
           $clients_ids=[];

              foreach (admin()->user()->myclientsasacountmanger as $key => $client) 
                  {
                       array_push($clients_ids, $client->client->id);
                   } 
                 
           $clientsnots = clientsnots::where('status','1')->first();
              $content=content::
             whereIn('client_id',$clients_ids)
             ->orderBy('id','desc')
             ->get(); 

              $clients=[];

              foreach (admin()->user()->myclientsasacountmanger as $key => $client) 
                  {
                       array_push($clients, $client->client);
                   }  



        }

        elseif(admin()->user()->type == 'client')
        {
             
            $content=content::
            where('client_id',admin()->user()->id )->
              where('ContentMangerConfirm','1')
            ->orderBy('id','desc')->get(); 
               $clients=admin::where('id',admin()->user()->id)->orderBy('id','desc')->get();

        }
         elseif(admin()->user()->type == 'GraphicDesign')
        {
            $clients_ids=[];

              foreach (admin()->user()->myclientGraphicDesigners as $key => $client) 
                  {
                       array_push($clients_ids, $client->client->id);
                   } 
                 
           $clientsnots = clientsnots::where('status','1')->first();
             $content=content::
             where('clientsnot_id',$clientsnots->id )
             ->whereIn('client_id',$clients_ids)
             ->orderBy('id','desc')
             ->get(); 

               $clients=[];

              foreach (admin()->user()->myclientGraphicDesigners as $key => $client) 
                  {
                       array_push($clients, $client->client);
                   } 

        }
           elseif(admin()->user()->type == 'Emp')
        {
               $client_id= admin()->user()->addby;
             $content=content::where('ContentMangerConfirm','1')->where('client_id',$client_id )->orderBy('id','desc')->get(); 
              $clients=admin::where('id',$client_id)->orderBy('id','desc')->get();
        }
         elseif(admin()->user()->type == 'CompanyManger')
         {
              $content=content::
              where('ContentMangerConfirm','0')
              ->orderBy('id','desc')->get(); 
               $clients=admin::where('type','client')->orderBy('id','desc')->get();
         }

           $data=[];
         $data= [
            'content'=>$content,
            'clients'=>$clients
        ];
         return $data;

        
    }

    public function Admin_logout_fun()
            {
              auth('admin')->logout();
              return redirect('/admin_login');

                
                
            }



}


 
