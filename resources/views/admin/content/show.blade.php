

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
                             
 
   <h4>   <i class="fa fa-cogs"></i> {{trans('trans.content')}}:
   @if($content->clientsnot_id)
                  <h3>{{$content->clientsnots->name}}</h3>
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
    </tr>
     
  </tbody>
</table>
 
                                        </div>


     @if(admin()->user()->type !== 'AccountManager')
                                         <div class="col-md-12 value">
<h3>{{trans('trans.Customer Comments and Amendments Table')}}</h3>
                                            <table class="table table-hover">
  <thead>
    <tr>
    
     
      <th scope="col">{{trans('trans.title')}}</th>
      <th scope="col">{{trans('trans.content')}}</th>
      <th scope="col">{{trans('trans.addby')}}</th>
    
      <th scope="col">{{trans('trans.not')}}</th>
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
      <th scope="col">{{trans('trans.date')}}</th>
    </tr>
  </thead>
  <tbody>
          @foreach($content->AccountManagercomment as  $allcomm)

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
              {{ $allcomm->created_at }}
      </td>
     
    </tr>
                    @endforeach
     
  </tbody>
</table>
 
                                        </div>
                                            @if($content->image)
                                             <img src="{{url('/')}}/{{$content->image}}"  style="width:400px;height:400px">
                                              @else
                                          
                                                @endif
                                    </div>
 <button onclick="myFunction()" id="off">{{trans('trans.addcomment')}}</button>
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



            <div class="form-group col-md-12">
                 <label class="control-label">{{trans('trans.Moreexplanation')}}</label>

               <textarea class="form-control" placeholder="{{trans('trans.Moreexplanation')}}" name="Moreexplanation" class="form-control Moreexplanation">
                   {{old('Moreexplanation')}}
              </textarea>
              
          </div>

            <div class="form-group col-md-6">
                  
        <input type="submit" name="typeofsend" value="{{trans('trans.sendtoteam')}} {{$content->client->name}} " class="btn green-meadow"> 
          </div>

            <div class="form-group col-md-6">
                  
                    <input type="submit" name="typeofsend" value="{{trans('trans.sendtoacountmanger')}}" class="btn green-meadow">
             

              
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

          <!-- First Comment -->
          <article class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail">
                <img class="img-responsive" 
                src="

                        @if($com->addby->image ==null ) 
http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png
                                     @else 
                                     {{url('/')}}/{{ $com->addby->image }}
                                     @endif
                " />
                <figcaption class="text-center">{{$com->addby->name}}</figcaption>
              </figure>

            </div>
            <div class="col-md-10 col-sm-10">

              <div class="panel panel-default arrow left">
                <div class="panel-body">
                      <header class="text-right">
                        @if($com->addby->id == admin()->user()->id)
                        <a href="{{url('/')}}/comment_delete/{{$com->id}}">
                             <i class="fa fa-trash" style="color:red;font-size: 20px;"></i>
                        </a>
                        @endif
                  </header>

                  <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user"></i> {{$com->addby->name}}</div>
                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> {{$com->created_at}}</time>

                      <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> 
                    {{trans('trans.typeofsend')}}:
                   @if($com->typeofsend == 'client')
                    {{trans('trans.toteam')}}
                    @else
                    {{trans('trans.toacountmager')}}

                   @endif
                </a></p>
                  </header>

                  <div class="comment-post">
                    @if($com->clientsnot_id)
                    
                           {{trans('trans.not')}}: {{$com->clientsnot->name}}
                    

                  
                        @endif
                  {{$com->comment}}
              
                    </p>

                   
                  </div>
                


                     <table class="table table-hover">
  <thead>
    <tr>
    
   
      <th scope="col">{{trans('trans.title')}}</th>
      <th scope="col">{{trans('trans.content')}}</th>
    </tr>
  </thead>
  <tbody>
    <tr>
  
      
      <td>
             {!! $com->name !!}
      </td>
      <td>
             {!! $com->content !!}
      </td>
    </tr>
     
  </tbody>
</table>


                </div>
              </div>
            </div>
          </article>
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

