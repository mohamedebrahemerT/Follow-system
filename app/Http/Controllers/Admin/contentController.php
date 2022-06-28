<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\content;
use App\Models\clientplans;
use App\Models\comment;
use App\Models\clientsnots;
 

use Hash;

class contentController extends Controller
{

     public function __construct() {
           
     

          $this->middleware('AdminRole:content_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:content_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:content_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:content_delete', [
            'only' => ['destroy', 'multi_delete'],
        ]);
        
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function getcontent ( )
    {
        if (admin()->user()->type == 'superadmin') 
        {
           $content=content::get(); 
        }
        elseif(admin()->user()->type == 'AccountManager')
        {
             
           $content=content::where('addby_id',admin()->user()->id )->get(); 

        }

        elseif(admin()->user()->type == 'client')
        {
             
            $content=content::where('client_id',admin()->user()->id )->get(); 

        }
         elseif(admin()->user()->type == 'GraphicDesign')
        {
           $clientsnots = clientsnots::where('status','1')->first();
             
             $content=content::where('clientsnot_id',$clientsnots->id )->get(); 

        }
     return view('admin.content.getcontent',compact('content'));

    }
    public function index($clientplan_id)
    {
         $clientplan=clientplans::where('id',$clientplan_id)->first();
        $content=content::where('client_id', $clientplan->client_id)->get();
     return view('admin.content.index',compact('content','clientplan_id'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($clientplan_id)
    {
        //
         $clientplan=clientplans::where('id',$clientplan_id)->first();
     return view('admin.content.create',compact('clientplan'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

      //return request();

         $data = $this->validate(\request(),
            [
                'plan_id' => 'required',
                'client_id' => 'required',
                'SocialMediaPlatforms_id' => 'required',
                'ContentType_id' => 'required',
                'content' => 'required',
                 
                 
            ]);
       $data['addby_id']=admin()->user()->id;
  
        $content=content::create($data);
        session()->flash('success', trans('trans.createSuccess'));
        return   redirect('/content/index/'.$request->plan_id);
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
           $content=content::where('id',$id)->first();

     return view('admin.content.show',compact('content'));
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
        $content=content::where('id',$id)->first();
        

     return view('admin.content.edit',compact('content'));

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
                'plan_id' => 'required',
                'client_id' => 'required',
                'SocialMediaPlatforms_id' => 'required',
                'ContentType_id' => 'required',
                'content' => 'required',
                 
                 
            ]);
       $data['addby_id']=admin()->user()->id;

         $content=content::where('id',$request->id)->first( );


         if ($request->image) 
               {

                if ($content->image) 
         {
            if (file_exists($content->image)) 
            {
                   unlink($content->image);
            }    
                     
         }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/images/content'), $imageName);
            $data['image'] = 'images/content/'.$imageName;
              }
 

         $content=content::where('id',$request->id)->update($data);

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
        $content=content::where('id',$id)->first();
          
                  $content->delete();
              session()->flash('danger', trans('trans.deleteSuccess'));
        return   redirect('/content');
    }

        public function comment(Request $request)
        {
              
             
            $data = $this->validate(\request(),
            [
                'clientsnot_id' => 'sometimes|nullable',
                'content_id' => 'required',
                'comment' => 'sometimes|nullable',
                 
            ]);
       $data['addby_id']=admin()->user()->id;
         
       $content=content::where('id',$request->content_id)->first();
      $content->clientsnot_id=$request->clientsnot_id;
       $content->save();
            
        $comment=comment::create($data);

        session()->flash('success', trans('trans.createSuccess'));

             return back();
        }
 


}


 
