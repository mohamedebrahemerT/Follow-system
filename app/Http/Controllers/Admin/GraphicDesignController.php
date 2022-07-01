<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin;
 

use Hash;

class GraphicDesignController extends Controller
{

     public function __construct() {
           
     

          $this->middleware('AdminRole:GraphicDesign_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:GraphicDesign_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:GraphicDesign_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:GraphicDesign_delete', [
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
        $GraphicDesigns=admin::where('type','GraphicDesign')->get();
     return view('admin.GraphicDesign.index',compact('GraphicDesigns'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     return view('admin.GraphicDesign.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

      ///  return request();

         $data = $this->validate(\request(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:admins',
                'password' => 'required',

                 
            ]);
                       $data['password']=Hash::make($request->password);
          
            $data['group_id'] = 4;
            $data['type'] = 'GraphicDesign';
  
        $GraphicDesign=admin::create($data);
        session()->flash('success', trans('trans.createSuccess'));
        return   redirect('/GraphicDesign');
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

               return redirect('/GraphicDesign');
           }

     return view('admin.GraphicDesign.edit',compact('client'));

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

                   $client=admin::where('id',$request->id)->update($data);

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
        return   redirect('/GraphicDesign');
    }

        
 


}


 
