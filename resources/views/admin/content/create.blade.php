 

@extends('admin.index')

@section('content')

  
    @push('js')
       

            <!--script>

                // Replace the <textarea id="editor1"> with a CKEditor

                // instance, using default configuration.

                CKEDITOR.replace( 'content' , {

        language: 'ar',

});
 
            </script -->
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
                                            <span class="caption-subject bold uppercase"> 
                                               {{$clientplan->client->name}} / {{$clientplan->name}} /   {{trans('trans.create')}}  / {{trans('trans.content')}}

                                            </span>
                                        </div>
                                         
                                    </div>
                                   <div class="portlet-body">
                                                    <div class="tab-content">
                                                        <!-- PERSONAL INFO TAB -->
                                                        <div class="tab-pane active" id="tab_1_1">
                  <form role="form" action="{{url('/')}}/content" method="POST" enctype="multipart/form-data">
                    @csrf
                   
                 <div class="row">
                     <input type="hidden" name="plan_id" value="{{$clientplan->id}}">
                     <input type="hidden" name="client_id" value="{{$clientplan->client_id}}">
                  
                    <!--div class="form-group col-md-6">
              <label class="control-label">{{trans('trans.SocialMediaPlatforms_id')}}</label>
    
                <select name="SocialMediaPlatforms_id" class="form-control select2"  >
                    @foreach( $clientplan->client->SocialMediaPlatforms as $SocialMediaPlatform)
                    <option 
 
  @if (old('SocialMediaPlatforms_id') == $SocialMediaPlatform->SocialMediaPlatforms_id)
              selected
              @endif
                    value="{{$SocialMediaPlatform->SocialMediaPlatforms_id}}">
                      
                               {{$SocialMediaPlatform->Platforms->name}} 
                               
                                 
                    </option>


                    @endforeach
                    
                </select>
          </div -->

          <div class="form-group col-md-4">
              <label class="control-label">{{trans('trans.departmet_id')}}</label>

                <select name="departmet_id" class="form-control select2"  >
                    @foreach(App\Models\Department::get() as $departmet)
                    <option 
 
  @if (old('departmet_id') == $departmet->id)
              selected
              @endif
                    value="{{$departmet->id}}">
                      
                               {{$departmet->name}} 
                               
                                 
                    </option>


                    @endforeach
                    
                </select>
          </div>

           <div class="form-group col-md-4">
                               <label class="control-label">{{trans('trans.title')}}</label>
              <input type="text" placeholder="{{trans('trans.name')}}" class="form-control"    name="name"  required=""/> 
          </div>

           

            <div class="form-group col-md-4">
              <label class="control-label">{{trans('trans.ContentType_id')}}</label>

                <select name="ContentType_id" class="form-control select2"  >
                    @foreach(App\Models\ContentTypes::get() as $ContentTypes)
                    <option 
 
  @if (old('ContentType_id') == $ContentTypes->id)
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
                   {{old('content')}}
              </textarea>
          </div>

              </div>   

          <div class="form-group">
            <button type="submit" class="btn green-meadow">{{trans('trans.save')}}</button>
          </div>
 
           
                                                                
                                                                
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

