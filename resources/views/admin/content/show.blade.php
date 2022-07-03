

@extends('admin.index')

@section('content')
  
@push('js')
<style type="text/css">
    .page-content
    {
        min-height: 1000000000px;
    }
</style>
@endpush
  
 


                        <!-- END THEME PANEL -->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                                 <a href="{{url('/')}}">{{trans('trans.Home')}}</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <a href="{{url('/')}}/content">{{trans('trans.content')}}</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                 
                            </ul>
                            
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                      <div class="col-md-12 col-sm-12">
                    <div class="portlet blue-hoki box"  >
                        <div class="portlet-title">
                            <div class="caption">
                             
 
   <h4>   <i class="fa fa-cogs"></i> 
 {{$content->client->name}}  / {{$content->plan->name}}  / {!! $content->name !!}

   
   @if($content->clientsnot_id)
    /
                  <h3>{{$content->clientsnots->name}}</h3>
               @endif

               @if($content->clientsnots->status == '1' and  $content->ContentMangerConfirm =='1' 
                     and $content->Contentclientconfirm =='1' 
                     and $content->acountmangerDesignConfirm =='1' and $content->clientDesignConfirm =='1')
                      {{trans('trans.time')}}:{{$content->time }}  /
               {{trans('trans.date')}}:{{$content->date }} 

               @endif
              

</h4>
                            </div>
                               
                                </div>
                                <div class="portlet-body" >
                                    <div class="row static-info" >
                                        
                                        <div class="col-md-12 value">

                                            <table class="table table-hover">
  <thead>
    <tr>
    
      <th scope="col">{{trans('trans.departmet_id')}}</th>
      <th scope="col">{{trans('trans.title')}}</th>
      <th scope="col">{{trans('trans.content')}}</th>
   
    @if(admin()->user()->type == 'superadmin' or admin()->user()->type == 'GraphicDesign'  or admin()->user()->type == 'AccountManager' )

                 @if($content->ContentMangerConfirm == '1' and $content->Contentclientconfirm == '1')
                    <th scope="col">{{trans('trans.design')}}</th>
                         @endif  

 @elseif(admin()->user()->type == 'client' or admin()->user()->type == 'Emp' )

                      @if($content->ContentMangerConfirm == '1' and $content->Contentclientconfirm == '1' and $content->acountmangerDesignConfirm == '1')               
                         <th scope="col">{{trans('trans.design')}}</th>
                             @endif



@endif  
     

             
           

    </tr>
  </thead>
  <tbody>
    <tr>
  
      <td>
            @if($content->departmet_id)
                  {{$content->Department->name}} 
               @endif
      </td>
      <td>
             {!! $content->name !!}
      </td>
      <td>
             {!! $content->content !!}
      </td>
         @include('admin.content.checkDesinStatus')

    </tr>
     
  </tbody>
</table>
  @if(admin()->user()->type == 'GraphicDesign' )
 @if($content->ContentMangerConfirm == '1' and $content->Contentclientconfirm == '1')
    
             <form role="form" action="{{url('/')}}/uploaddesign" method="POST" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" name="content_id" value="{{$content->id}}">
                <div class="row">
                      <div class="form-group  col-md-6">
                               <label class="control-label">{{trans('trans.uploaddesign')}}</label>
              <input type="file" placeholder="{{trans('trans.photo')}}" class="form-control"    name="image"     /> 
          </div>

                  <div class="form-group col-md-6">
                   <label class="control-label">{{trans('trans.save')}}</label>
                     <input type="submit"  value="{{trans('trans.save')}}" class="form-control">
           
          </div>
                </div>

            </form>

               @endif
               @endif

 
                                        </div>


     @if(admin()->user()->type == 'superadmin'  or  admin()->user()->type == 'client' or  admin()->user()->type == 'Emp'  )
                                         <div class="col-md-12 value">
<h3>{{trans('trans.Customer Comments and Amendments Table')}}</h3>
                                            <table class="table table-hover">
  <thead>
    <tr>
    
     
      <th scope="col">{{trans('trans.title')}}</th>
      <th scope="col">{{trans('trans.content')}}</th>
      <th scope="col">{{trans('trans.addby')}}</th>
    
      <th scope="col">{{trans('trans.not')}}</th>
      <th scope="col">{{trans('trans.Moreexplanation')}}</th>
      <th scope="col">{{trans('trans.date')}}</th>
    </tr>
  </thead>
  <tbody>
          @foreach($content->clientcomment as  $allcomm)

    <tr>
      <td>
             {!! $allcomm->name !!}
      </td>
      <td>
             {!! $allcomm->content !!}
      </td>
       <td>
          {{$allcomm->addby->name}}
      </td>
        

      <td>
            @if($allcomm->clientsnot_id)
                    
                        {{$allcomm->clientsnot->name}}
                    

                  
                        @endif
                  
      </td>
       <td>
          {{$allcomm->comment}}
      </td>

       <td>
              {{ $allcomm->created_at }}
      </td>
     
    </tr>
                    @endforeach
     
  </tbody>
</table>
 
                                        </div>

                                        @endif

                                <hr>
                                  <div class="col-md-12 value">
<h3  class="portlet-title">{{trans('trans.AccountManagercomment Comments and Amendments Table')}}</h3>
                                            <table class="table table-hover">
  <thead>
    <tr>
    
     
      <th scope="col">{{trans('trans.title')}}</th>
      <th scope="col">{{trans('trans.content')}}</th>
      <th scope="col">{{trans('trans.addby')}}</th>
 
      <th scope="col">{{trans('trans.not')}}</th>
      <th scope="col">{{trans('trans.Moreexplanation')}}</th>

      <th scope="col">{{trans('trans.date')}}</th>
    </tr>
  </thead>
  <tbody>
          @foreach($content->AccountManagercomment as  $allcomm)

@if($allcomm->typeofsend == 'Design')

                        @if(admin()->user()->type == 'superadmin' or  admin()->user()->type == 'GraphicDesign'  or admin()->user()->type == 'AccountManager' )

                 @if($allcomm->showcontent->ContentMangerConfirm == '1' and $allcomm->showcontent->Contentclientconfirm == '1')
         @include('admin.content.AccountManagercomments')
                         @endif  

 @elseif(admin()->user()->type == 'client' or admin()->user()->type == 'Emp' )

                      @if($allcomm->showcontent->ContentMangerConfirm == '1' and $allcomm->showcontent->Contentclientconfirm == '1' and $allcomm->showcontent->acountmangerDesignConfirm == '1')               
                          @include('admin.content.AccountManagercomments')
                             @endif



@endif 
                       

                       @else
                           @include('admin.content.AccountManagercomments')
                       @endif 
    
                    @endforeach
     
  </tbody>
</table>
 
                                        </div>
                                           
                                    </div>
@if(admin()->user()->type !== 'GraphicDesign')

  @if($content->ContentMangerConfirm == '1')
 <button  class="@if($content->clientsnots->status == '1' and $content->ContentMangerConfirm =='1' 
                     and $content->Contentclientconfirm =='1' 
                     and $content->acountmangerDesignConfirm =='1' and $content->clientDesignConfirm =='1'  ) hidden @endif"  onclick="myFunction()" id="off">{{trans('trans.addcomment')}}</button>
                                                @endif
                                                @endif


@if(admin()->user()->type !== 'GraphicDesign')
 <form role="form" action="{{url('/')}}/comment" method="POST" enctype="multipart/form-data" style="display: none;"   id="on">
                    @csrf

                    <input type="hidden" name="content_id" value="{{$content->id}}">
                                    <div class="row static-info">
                             
             <div class="form-group col-md-12">
                               <label class="control-label">{{trans('trans.title')}}</label>
              <input type="text" placeholder="{{trans('trans.name')}}" class="form-control"    name="name"  value="{{$content->name }}" required=""/> 
          </div>
 

                <div class="form-group col-md-12">
              <label class="control-label">{{trans('trans.content')}}</label>
             <textarea class="form-control" name="content" class="form-control content">
                   {{$content->content }}
              </textarea>
          </div>

     @if(admin()->user()->type == 'client')
                     <div class="form-group col-md-12">
              <label class="control-label">{{trans('trans.clientsnots')}}</label>

                <select name="clientsnot_id" class="form-control select2"  >
                       <option></option>
                    @foreach(App\Models\clientsnots::get() as $clientsnot)

                    <option 
 
  @if (old('clientsnot_id') == $clientsnot->id)
              selected
              @endif
                    value="{{$clientsnot->id}}">
                      
                               {{$clientsnot->name}} 
                               
                                 
                    </option>


                    @endforeach
                    
                </select>
          </div>
@endif

    

            <div class="form-group col-md-12">
                 <label class="control-label">{{trans('trans.Moreexplanation')}}</label>

               <textarea class="form-control" placeholder="{{trans('trans.Moreexplanation')}}" name="Moreexplanation" class="form-control Moreexplanation">
                   {{old('Moreexplanation')}}
              </textarea>
              
          </div>
 @if(admin()->user()->type == 'client' or admin()->user()->type == 'Emp')
            <div class="form-group col-md-6">
                  
        <input type="submit" name="typeofsend" value="{{trans('trans.sendtoteam')}} {{$content->client->name}} " class="btn green-meadow"> 
          </div>
@endif

            <div class="form-group col-md-6">
                  
                    <input type="submit" name="typeofsend" value="
                     @if(admin()->user()->type == 'client' or admin()->user()->type == 'Emp'){{trans('trans.sendtoacountmanger')}}@else{{trans('trans.send')}}@endif" class="btn green-meadow">
             

              
          </div>


  
           
                                                                
                                                                
                                                            </form>

                                         
                                    </div>
                                    @endif

                                    <div class="container">
  <div class="row">
    <div class="col-md-8">
      <h4 class="page-header">  تعليقات</h4>
        <section class="comment-list">


             
                                                @foreach($comments as  $com)
                       @if($com->typeofsend == 'Design')

                        @if(admin()->user()->type == 'superadmin' or  admin()->user()->type == 'GraphicDesign'  or admin()->user()->type == 'AccountManager' )

                 @if($com->showcontent->ContentMangerConfirm == '1' and $com->showcontent->Contentclientconfirm == '1')
         @include('admin.content.Comments')
                         @endif  

 @elseif(admin()->user()->type == 'client' or admin()->user()->type == 'Emp' )

                      @if($com->showcontent->ContentMangerConfirm == '1' and $com->showcontent->Contentclientconfirm == '1' and $com->showcontent->acountmangerDesignConfirm == '1')               
                          @include('admin.content.Comments')
                             @endif



@endif 
                       

                       @else
                           @include('admin.content.Comments')
                       @endif   
          @endforeach
 
            
  
        
           
 
          </div>
         
         
        </section>
    </div>
  </div>
</div>



                                     
                                     
                                     
                                                                
                                                                </div>

                                                                


                                                            </div>
                                                        </div>
 
                        
                    </div>
                    <!-- END CONTENT BODY -->
                @push('js')
            
   <script type="text/javascript">
    function myFunction() {
  var x = document.getElementById("on");
   var y = document.getElementById("off");
    
  if (x.style.display === "none") 
  {
    x.style.display = "block";
        y.style.display = "none";
  } 
  
}
       
   </script>
 
                @endpush

  @endsection

