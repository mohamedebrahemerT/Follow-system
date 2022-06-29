

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
                                            {!! $content->content !!}
                                        </div>
                                            @if($content->image)
                                             <img src="{{url('/')}}/{{$content->image}}"  style="width:400px;height:400px">
                                              @else
                                          
                                                @endif
                                    </div>

@if(admin()->user()->type !== 'GraphicDesign')
 <form role="form" action="{{url('/')}}/comment" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="content_id" value="{{$content->id}}">
                                    <div class="row static-info">
                                        <div class="form-group col-md-2">
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

            <div class="form-group col-md-8">
                 <label class="control-label">{{trans('trans.Moreexplanation')}}</label>
              <input type="text" placeholder="{{trans('trans.Moreexplanation')}}" class="form-control"    name="comment"   /> 

              
          </div>

            <div class="form-group col-md-2">
                 <label class="control-label">{{trans('trans.save')}}</label>
                 <br>
             <button type="submit" class="btn green-meadow">{{trans('trans.save')}}</button>

              
          </div>


  
           
                                                                
                                                                
                                                            </form>

                                         
                                    </div>
                                    @endif

                                    <div class="container">
  <div class="row">
    <div class="col-md-8">
      <h2 class="page-header">  تعليقات</h2>
        <section class="comment-list">

             
                                                @foreach($content->comment as  $com)

          <!-- First Comment -->
          <article class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail">
                <img class="img-responsive" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />
                <figcaption class="text-center">{{$com->addby->name}}</figcaption>
              </figure>
            </div>
            <div class="col-md-10 col-sm-10">
              <div class="panel panel-default arrow left">
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user"></i> {{$com->addby->name}}</div>
                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> {{$com->created_at}}</time>
                  </header>
                  <div class="comment-post">
                    @if($com->clientsnot_id)
                     <p>
                           {{trans('trans.clientsnots')}}: {{$com->clientsnot->name}}
                    </p>

                    <p>
                        @endif
                  {{$com->comment}}
              
                    </p>
                   
                  </div>
                  <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> {{$com->addby->name}}</a></p>
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
            
 
 
                @endpush

  @endsection

