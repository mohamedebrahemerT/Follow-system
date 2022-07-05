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
           $content=content::orderBy('id','desc')->get(); 
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
             whereIn('client_id',$clients_ids)->
             orderBy('id','desc')
             ->get(); 

        }

        elseif(admin()->user()->type == 'client')
        {
             
 $content=content::where('ContentMangerConfirm','1')->where('client_id',admin()->user()->id )->
             orderBy('id','desc')->get(); 

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
             ->
             orderBy('id','desc')
             ->get(); 

        }

              elseif(admin()->user()->type == 'Emp')
        {
               $client_id= admin()->user()->addby;
             $content=content::where('ContentMangerConfirm','1')->where('client_id',$client_id )->
             orderBy('id','desc')->get(); 
              
        }
        elseif(admin()->user()->type == 'CompanyManger')
         {
              $content=content::
              orderBy('id','desc')->get(); 
               
         }
     return view('admin.content.getcontent',compact('content'));

    }
    public function index($clientplan_id)
    {
         $clientplan=clientplans::where('id',$clientplan_id)->first();

             

             if (admin()->user()->type == 'superadmin') 
        {
      $content=content::where('client_id',$clientplan->client_id)->orderBy('id','desc')->get(); 
        }
        elseif(admin()->user()->type == 'AccountManager')
        {
           
             $content=content::
          where('client_id',$clientplan->client_id)->
             orderBy('id','desc')
             ->get(); 

        }

        elseif(admin()->user()->type == 'client')
        {
             
            $content=content::
            where('ContentMangerConfirm','1')->
            where('client_id',admin()->user()->id )->
             orderBy('id','desc')->get(); 

        }
         elseif(admin()->user()->type == 'GraphicDesign')
        {
            
                 
           $clientsnots = clientsnots::where('status','1')->first();
             $content=content::
             where('clientsnot_id',$clientsnots->id )->
           where('client_id',$clientplan->client_id)
             ->
             orderBy('id','desc')
             ->get(); 

        }

              elseif(admin()->user()->type == 'Emp')
        {
               $client_id= admin()->user()->addby;
             $content=content::
             where('client_id',$clientplan->client_id)->
             where('ContentMangerConfirm','1' )->
             orderBy('id','desc')->get(); 
              
        }
         elseif(admin()->user()->type == 'CompanyManger')
         {
              $content=content::
              where('ContentMangerConfirm','0')
              ->orderBy('id','desc')->get(); 
               
         }


     return view('admin.content.index',compact('content','clientplan_id','clientplan'));

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
                'name' => 'required',
                'departmet_id' => 'required',
                'plan_id' => 'required',
                'client_id' => 'required',
                'SocialMediaPlatforms_id' => 'sometimes|nullable',
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
            
           

            if (admin()->user()->type == 'superadmin') 
        {
            $content=content::where('id',$id)->first();
              
              
        }
        elseif(admin()->user()->type == 'AccountManager')
        {
              $content=content::where('id',$id)->first();
        }

        elseif(admin()->user()->type == 'client')
        {
              $content=content::
              where('ContentMangerConfirm','1')->
              where('id',$id)
              ->first();
             
            
        }
         elseif(admin()->user()->type == 'GraphicDesign')
        {
              $content=content::
              where('ContentMangerConfirm','1')->
              where('id',$id)
              ->first();
             
          

        }

              elseif(admin()->user()->type == 'CompanyManger')
          {
              $content=content::
              where('id',$id)
              ->first();
          }

            if (admin()->user()->type == 'Emp') 
        {
           $content=content::
              where('ContentMangerConfirm','1')->
              where('id',$id)
              ->first();   
        }

       if ( !$content) 
         {
                          session()->flash('danger', trans('trans.productnotfound'));

               return redirect('/getcontent');
           }

             if(admin()->user()->type == 'AccountManager')
        {
       $comments=$content->AccountManagercomment;
        }


        else
        {
            $comments=$content->comment;  
        }


     return view('admin.content.show',compact('content','comments'));
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
        
    if ( !$content) 
         {
                          session()->flash('danger', trans('trans.productnotfound'));

               return redirect('/getcontent');
           }
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
                'name' => 'required',
                'departmet_id' => 'required',
                'client_id' => 'required',
                'SocialMediaPlatforms_id' => 'sometimes|nullable',
                'ContentType_id' => 'required',
                'content' => 'required',
                'date' => 'sometimes|nullable',
                'time' => 'sometimes|nullable',

                 
                 
            ]);
       $data['addby_id']=admin()->user()->id;

         $content=content::where('id',$request->id)->first( );


         if ($request->image) 
               {

                if ($content->image) 
        

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
              
           //  return request();
            $data = $this->validate(\request(),
            [
                'clientsnot_id' => 'sometimes|nullable',
                'content_id' => 'required',
                'name' => 'required',
                'content' => 'required',
                'typeofsend' => 'required',
                'comment' => 'sometimes|nullable',
                 
            ]);
        
            if ($request->typeofsend == 'ارسل الي مدير الحساب'  or $request->typeofsend =='ارسال') {
 
               $data['typeofsend']='AccountManager';
            }
            elseif( $request->typeofsend =='ارسال الي المصمم') 
            {
                
               $data['typeofsend']='sendtoDesiner';

            }
            else
            {
               $data['typeofsend']='client';

            }
                 
            

       $data['comment']=$request->Moreexplanation;
       $data['addby_id']=admin()->user()->id;
      // return $data;
         
        if(admin()->user()->type == 'client' or admin()->user()->type == 'Emp')
         {
       $content=content::where('id',$request->content_id)->first();
      $content->clientsnot_id=$request->clientsnot_id;
       $content->save();

      $clientsnot= clientsnots::where('id',$request->clientsnot_id)->first();

            if ($clientsnot) 
            {

                   if ($clientsnot->status == '1'  
                    and $content->ContentMangerConfirm =='1' 
                     and $content->Contentclientconfirm =='0' 
                     and $content->acountmangerDesignConfirm =='0' 
                     and $content->clientDesignConfirm =='0' 
                 ) 
                   {
                   
                   $content->Contentclientconfirm='1';
                   $content->save();
                   }
                  elseif($clientsnot->status == '1' 
                    and $content->ContentMangerConfirm =='1' 
                     and $content->Contentclientconfirm =='1' 
                     and $content->acountmangerDesignConfirm =='1' )
                   {
                      
                     $content->clientDesignConfirm='1';
                    $content->save();

                   }
            }
         }


     
            
        $comment=comment::create($data);

        session()->flash('success', trans('trans.createSuccess'));

             return back();
        }

           public function comment_delete($id)
    {
        $comment=comment::where('id',$id)->first();
          
                  $comment->delete();
              session()->flash('danger', trans('trans.deleteSuccess'));
        return   back();
    }

     public function ContentMangerConfirm(Request $request)
{

        if ($request->ContentMangerConfirm == '1') 
        {
    $data['ContentMangerConfirm'] ='1';
           $stat='1';
        }
        else
        {
    $data['ContentMangerConfirm'] ='0';
           $stat='0';

        }
    content::where('id', $request->id)->update($data);
   
     return $stat;
 }

      public function acountmangerDesignConfirm(Request $request)
{

        if ($request->acountmangerDesignConfirm == '1') 
        {
    $data['acountmangerDesignConfirm'] ='1';
           $stat='1';
        }
        else
        {
    $data['acountmangerDesignConfirm'] ='0';
           $stat='0';

        }
    content::where('id', $request->id)->update($data);
   
     return $stat;
 }
 
  public function uploaddesign(Request $request)
  {

      //  return request();
            $data = $this->validate(\request(),
            [
                 
                'content_id' => 'required',
                'image' => 'required',
               
                 
            ]);

       
       $data['addby_id']=admin()->user()->id;
       $data['content_id']=$request->content_id;
         $content=content::where('id',$request->content_id)->first( );


         if ($request->image) 
               {

                
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/images/content'), $imageName);
            $data['image'] = 'images/content/'.$imageName;
          

         $content=content::where('id',$request->content_id)->update([
            'image'=>$data['image']
         ]);
         }
               $data['typeofsend']='Design';

        $comment=comment::create($data);

        session()->flash('success', trans('trans.createSuccess'));

        return back();
  }

}


 
