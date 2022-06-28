 

@extends('admin.index')

@section('content')

  
   @push('js')
       

            <script>

                // Replace the <textarea id="editor1"> with a CKEditor

                // instance, using default configuration.

                CKEDITOR.replace( 'content' , {

        language: 'ar',

});
 
            </script>
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
                        
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase"> {{trans('trans.edit')}}</span>
               @if($content->clientsnot_id)
                  <h3>{{$content->clientsnots->name}}</h3>
               @endif
                                         
                                        </div>
                                         
                                    </div>
                                   <div class="portlet-body">
                                                    <div class="tab-content">
                                                        <!-- PERSONAL INFO TAB -->
                                                        <div class="tab-pane active" id="tab_1_1">
                 <form role="form" action="{{url('/')}}/content/{{$content->id}}" method="POST" enctype="multipart/form-data">
 					@csrf
 					{{ method_field('PATCH') }}
                   
                   <input type="hidden" name="id" value="{{$content->id}}">
 
     

          <div class="row">
                     <input type="hidden" name="plan_id" value="{{$content->plan_id}}">
                     <input type="hidden" name="client_id" value="{{$content->client_id}}">

                     <div class="form-group col-md-4">
                               <label class="control-label">{{trans('trans.design')}}</label>
  <input type="file" placeholder="{{trans('trans.photo')}}" class="form-control"    name="image"  
   /> 
               
          </div>
                  
                    <div class="form-group col-md-4">
              <label class="control-label">{{trans('trans.SocialMediaPlatforms_id')}}</label>
    
                <select name="SocialMediaPlatforms_id" class="form-control select2"  >
                    @foreach($content->plan->client->SocialMediaPlatforms as $SocialMediaPlatform)
                    <option 
 
  @if ($content->SocialMediaPlatforms_id == $SocialMediaPlatform->SocialMediaPlatforms_id)
              selected
              @endif
                    value="{{$SocialMediaPlatform->SocialMediaPlatforms_id}}">
                      
                               {{$SocialMediaPlatform->Platforms->name}} 
                               
                                 
                    </option>


                    @endforeach
                    
                </select>
          </div>

            <div class="form-group col-md-4">
              <label class="control-label">{{trans('trans.ContentType_id')}}</label>

                <select name="ContentType_id" class="form-control select2"  >
                    @foreach(App\Models\ContentTypes::get() as $ContentTypes)
                    <option 
 
  @if ($content->ContentType_id  == $ContentTypes->id)
              selected
              @endif
                    value="{{$ContentTypes->id}}">
                      
                               {{$ContentTypes->name}} 
                               
                                 
                    </option>


                    @endforeach
                    
                </select>
          </div>

                   <div class="form-group col-md-12">
              <label class="control-label">{{trans('trans.content')}}</label>
             <textarea class="form-control" name="content" class="form-control content">
                   {{$content->content }}
              </textarea>
          </div>

              </div>   


          <div class="form-group">
            <button type="submit" class="btn green-meadow">{{trans('trans.save')}}</button>
          </div>
          

   
                              
        

               @if($content->image)
                                             <img src="{{url('/')}}/{{$content->image}}"  style="width:200px;height:200px">
                                              @else
                                          
                                                @endif
 
           
                                                                
                                                                
                                                            </form>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                       
                        
                    </div>
                    <!-- END CONTENT BODY -->
                @push('js')
            
 
 
                @endpush

  @endsection

