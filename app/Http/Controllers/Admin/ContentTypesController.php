<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContentTypes;
 

use Hash;

class ContentTypesController extends Controller
{

     public function __construct() {
           
     

          $this->middleware('AdminRole:ContentTypes_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:ContentTypes_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:ContentTypes_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:ContentTypes_delete', [
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
        $ContentTypes=ContentTypes::
             orderBy('id','desc')->get();
     return view('admin.ContentTypes.index',compact('ContentTypes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     return view('admin.ContentTypes.create');

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
               

                 
            ]);
         if ($request->image) 
               {

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/images/ContentTypes'), $imageName);
            $data['image'] = 'images/ContentTypes/'.$imageName;
             }     
      
  
        $ContentTypes=ContentTypes::create($data);
        session()->flash('success', trans('trans.createSuccess'));
        return   redirect('/ContentTypes');
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
       $ContentTypes=ContentTypes::where('id',$id)->first();

       if ( !$ContentTypes) 
         {
                          session()->flash('danger', trans('trans.productnotfound'));

               return redirect('/ContentTypes');
           }

     return view('admin.ContentTypes.edit',compact('ContentTypes'));

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
               
                 
            ]);


     
   
                   $ContentTypes=ContentTypes::where('id',$request->id)->first();

         if ($request->image) 
               {

                if ($ContentTypes->image) 
         {
            if (file_exists($ContentTypes->image)) 
            {
                   unlink($ContentTypes->image);
            }    
                     
         }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/images/ContentTypes'), $imageName);
            $data['image'] = 'images/ContentTypes/'.$imageName;
              }

         $ContentTypes=ContentTypes::where('id',$request->id)->update($data);

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
        $ContentTypes=ContentTypes::where('id',$id)->first();
         if ($ContentTypes->image) 
         {
            if (file_exists($ContentTypes->image)) 
            {
                   unlink($ContentTypes->image);
            }    
                     
         }
                  $ContentTypes->delete();
              session()->flash('danger', trans('trans.deleteSuccess'));
        return   redirect('/ContentTypes');
    }

        
 


}


 
