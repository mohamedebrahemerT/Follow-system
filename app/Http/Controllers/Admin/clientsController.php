<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\clientsAccountsManager;
use App\Models\clientsSocialMediaPlatforms;
use Hash;

class clientsController extends Controller
{

     public function __construct() {
           
     

          $this->middleware('AdminRole:clients_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:clients_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:clients_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:clients_delete', [
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
          if(admin()->user()->type == 'superadmin')
                        {
        $clients=admin::where('type','client')->get();

                        }
                        elseif (admin()->user()->type == 'AccountManager') 
                        { 
                             $clients=[];

              foreach (admin()->user()->myclientsasacountmanger as $key => $client) 
                  {
                       array_push($clients, $client->client);
                   }     
                        }
                        elseif (admin()->user()->type == 'client') 
                        {
        $clients=admin::where('id',admin()->user()->id)->get();

                        }

                          elseif (admin()->user()->type == 'GraphicDesign') 
                        {
              $clients=admin::where('type','client')->get();


                        }

                            
     return view('admin.clients.index',compact('clients'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     return view('admin.clients.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $data = $this->validate(\request(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:admins',
                'password' => 'required',

                 
            ]);
         if ($request->image) 
               {

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/images/clients'), $imageName);
            $data['image'] = 'images/clients/'.$imageName;
             }     
            $data['group_id'] = 2;
            $data['type'] = 'client';
                       $data['password']=Hash::make($request->password);
  
        $clients=admin::create($data);
    
         if ($request->AccountManager_id) {
             foreach ($request->AccountManager_id as $key => $AccountManager_id) {
                clientsAccountsManager::create([
        'client_id'=> $clients->id,
        'AccountManager_id'=>$AccountManager_id,
     ]);
             }
         }

         if ($request->SocialMediaPlatforms_id) {
             foreach ($request->SocialMediaPlatforms_id as $key => $SocialMediaPlatforms_id) {
                clientsSocialMediaPlatforms::create([
        'client_id'=> $clients->id,
        'SocialMediaPlatforms_id'=>$SocialMediaPlatforms_id,
     ]);
             }
         }
    


        session()->flash('success', trans('trans.createSuccess'));
        return   redirect('/clients');
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

       $client=admin::where('id',$id)->first();
         if ( !$client) 
         {
                          session()->flash('danger', trans('trans.productnotfound'));

               return redirect('/clients');
           }
     return view('admin.clients.edit',compact('client'));

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
                'email' => 'required|email',
                'password' => 'sometimes|nullable',
                 
            ]);


                       $data['password']=Hash::make($request->password);
     
   
                   $client=admin::where('id',$request->id)->first();

         if ($request->image) 
               {

                if ($client->image) 
         {
            if (file_exists($client->image)) 
            {
                   unlink($client->image);
            }    
                     
         }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/images/clients'), $imageName);
            $data['image'] = 'images/clients/'.$imageName;
              }

                   $client=admin::where('id',$request->id)->update($data);


                   $clients=admin::where('id',$request->id)->first();

                      if ($request->AccountManager_id) {
    $clientsAccountsManager=  clientsAccountsManager::where('client_id',$clients->id);
    $clientsAccountsManager->delete();

             foreach ($request->AccountManager_id as $key => $AccountManager_id) {
                clientsAccountsManager::create([
        'client_id'=> $clients->id,
        'AccountManager_id'=>$AccountManager_id,
     ]);
             }
         }

         if ($request->SocialMediaPlatforms_id) {
        $clientsSocialMediaPlatforms=  clientsSocialMediaPlatforms::where('client_id',$clients->id);
    $clientsSocialMediaPlatforms->delete();
             foreach ($request->SocialMediaPlatforms_id as $key => $SocialMediaPlatforms_id) {
                clientsSocialMediaPlatforms::create([
        'client_id'=> $clients->id,
        'SocialMediaPlatforms_id'=>$SocialMediaPlatforms_id,
     ]);
             }
         }

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
        $client=admin::where('id',$id)->first();
         if ($client->image) 
         {
            if (file_exists($client->image)) 
            {
                   unlink($client->image);
            }    
                     
         }
                  $client->delete();
              session()->flash('danger', trans('trans.deleteSuccess'));
        return   redirect('/clients');
    }

        
 


}


 
