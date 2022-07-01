<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMediaPlatforms;
 

use Hash;

class SocialMediaPlatformsController extends Controller
{

     public function __construct() {
           
     

          $this->middleware('AdminRole:SocialMediaPlatforms_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:SocialMediaPlatforms_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:SocialMediaPlatforms_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:SocialMediaPlatforms_delete', [
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
      $SocialMediaPlatforms=SocialMediaPlatforms::get();

                        }
                              if(admin()->user()->type == 'client')
                        {
                            $SocialMediaPlatforms=[];
                     foreach (admin()->user()->SocialMediaPlatforms as $key => $SocialMediaPlatform) 
                                {
                         array_push($SocialMediaPlatforms, $SocialMediaPlatform->Platforms);
                                }  
                             
                        }
        
     return view('admin.SocialMediaPlatforms.index',compact('SocialMediaPlatforms'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     return view('admin.SocialMediaPlatforms.create');

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
            $request->image->move(public_path('/images/SocialMediaPlatforms'), $imageName);
            $data['image'] = 'images/SocialMediaPlatforms/'.$imageName;
             }     
      
  
        $SocialMediaPlatforms=SocialMediaPlatforms::create($data);
        session()->flash('success', trans('trans.createSuccess'));
        return   redirect('/SocialMediaPlatforms');
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
       $SocialMediaPlatforms=SocialMediaPlatforms::where('id',$id)->first();

     
       if ( !$SocialMediaPlatforms) 
         {
                          session()->flash('danger', trans('trans.productnotfound'));

               return redirect('/SocialMediaPlatforms');
           }

     return view('admin.SocialMediaPlatforms.edit',compact('SocialMediaPlatforms'));

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


     
   
                   $SocialMediaPlatforms=SocialMediaPlatforms::where('id',$request->id)->first();

         if ($request->image) 
               {

                if ($SocialMediaPlatforms->image) 
         {
            if (file_exists($SocialMediaPlatforms->image)) 
            {
                   unlink($SocialMediaPlatforms->image);
            }    
                     
         }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/images/SocialMediaPlatforms'), $imageName);
            $data['image'] = 'images/SocialMediaPlatforms/'.$imageName;
              }

         $SocialMediaPlatforms=SocialMediaPlatforms::where('id',$request->id)->update($data);

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
        $SocialMediaPlatforms=SocialMediaPlatforms::where('id',$id)->first();
         if ($SocialMediaPlatforms->image) 
         {
            if (file_exists($SocialMediaPlatforms->image)) 
            {
                   unlink($SocialMediaPlatforms->image);
            }    
                     
         }
                  $SocialMediaPlatforms->delete();
              session()->flash('danger', trans('trans.deleteSuccess'));
        return   redirect('/SocialMediaPlatforms');
    }

        
 


}


 
