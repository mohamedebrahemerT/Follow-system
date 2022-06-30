<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\clientplans;
use App\Models\admin;
use App\Models\clientspostscount;
 

use Hash;

class clientplansController extends Controller
{

     public function __construct() {
           
     

          $this->middleware('AdminRole:clientplans_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:clientplans_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:clientplans_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:clientplans_delete', [
            'only' => ['destroy', 'multi_delete'],
        ]);
        
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($client_id)
    {
        $clientplans=clientplans::where('client_id',$client_id)->get();
        $client=admin::where('id',$client_id)->first();

     return view('admin.clientplans.index',compact('clientplans','client_id','client'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($client_id)
    {
        //
        $client= admin::where('id',$client_id)->first();
          $SocialMediaPlatforms= $client->SocialMediaPlatforms;

     return view('admin.clientplans.create',compact('client'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

       // return request();

         $data = $this->validate(\request(),
            [
                'name' => 'required',
                'date' => 'required',
                'content' => 'required',
                'client_id' => 'required',
               

                 
            ]);
          $data['addby_id']=admin()->user()->id;
       $clientplans=clientplans::create($data);
  
               if ($request->SocialMediaPlatforms_id) {
                   foreach ($request->SocialMediaPlatforms_id as $key => $value) 
                   {
                       
          clientspostscount::create([
         'SocialMediaPlatforms_id'=>$value,
         'ContentType_id'=>$request->ContentType_id[$key],
          'count'=>$request->count[$key],
         'plan_id'=>$clientplans->id,
         'client_id'=>$request->client_id,
         'addby_id'=>admin()->user()->id,

          ]);
                   }
               }

 
        session()->flash('success', trans('trans.createSuccess'));
        return   redirect('/clientplans/'.$request->client_id);
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
         $clientplans=clientplans::where('id',$id)->first();

     return view('admin.clientplans.show',compact('clientplans'));
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
       $clientplans=clientplans::where('id',$id)->first();

     return view('admin.clientplans.edit',compact('clientplans'));

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
       $data = $this->validate(\request(),
            [
                'name' => 'required',
                'date' => 'required',
                'content' => 'required',
               
                 
            ]);
            

         $clientplans=clientplans::where('id',$request->id)->update($data);
           $clientplans=clientplans::where('id',$request->id)->first();

            if ($request->SocialMediaPlatforms_id) {
                $clientspostscount=clientspostscount::
                where('plan_id',$clientplans->id);
                $clientspostscount->delete();
                   foreach ($request->SocialMediaPlatforms_id as $key => $value) 
                   {
                       
          clientspostscount::create([
         'SocialMediaPlatforms_id'=>$value,
         'ContentType_id'=>$request->ContentType_id[$key],
          'count'=>$request->count[$key],
         'plan_id'=>$clientplans->id,
         'client_id'=>$clientplans->client_id,
         'addby_id'=>admin()->user()->id,

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
        $clientplans=clientplans::where('id',$id)->first();
         if ($clientplans->image) 
         {
            if (file_exists($clientplans->image)) 
            {
                   unlink($clientplans->image);
            }    
                     
         }
                  $clientplans->delete();
              session()->flash('danger', trans('trans.deleteSuccess'));
        return   redirect('/clientplans/'.$clientplans->client_id);
    }

        
 


}


 
