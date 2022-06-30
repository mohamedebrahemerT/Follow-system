<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\clientsnots;
 

use Hash;

class clientsnotsController extends Controller
{

     public function __construct() {
           
     

          $this->middleware('AdminRole:clientsnots_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:clientsnots_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:clientsnots_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:clientsnots_delete', [
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
        $clientsnots=clientsnots::
             orderBy('id','desc')->get();
     return view('admin.clientsnots.index',compact('clientsnots'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     return view('admin.clientsnots.create');

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
                'color' => 'required',
                'status' => 'required',
               

                 
            ]);
       
  
        $clientsnots=clientsnots::create($data);
        session()->flash('success', trans('trans.createSuccess'));
        return   redirect('/clientsnots');
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
       $clientsnots=clientsnots::where('id',$id)->first();

     return view('admin.clientsnots.edit',compact('clientsnots'));

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
                'color' => 'required',
                'status' => 'required',
               
                 
            ]);


     
   
                   $clientsnots=clientsnots::where('id',$request->id)->first();

       

         $clientsnots=clientsnots::where('id',$request->id)->update($data);

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
        $clientsnots=clientsnots::where('id',$id)->first();
          
                  $clientsnots->delete();
              session()->flash('danger', trans('trans.deleteSuccess'));
        return   redirect('/clientsnots');
    }

        
 


}


 
