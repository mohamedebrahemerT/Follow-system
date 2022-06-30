 

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
                                    <a href="{{url('/')}}/clientplans">{{trans('trans.clientplans')}}</a>
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
                                            <span class="caption-subject bold uppercase"> {{trans('trans.create')}}</span>
                                        </div>
                                         
                                    </div>
                                   <div class="portlet-body">
                                                    <div class="tab-content">
                                                        <!-- PERSONAL INFO TAB -->
                                                        <div class="tab-pane active" id="tab_1_1">
                  <form role="form" action="{{url('/')}}/clientplans" method="POST" enctype="multipart/form-data">
                    @csrf


                 <div class="row">
                     <input type="hidden" name="client_id" value="{{$client->id}}">
                  <div class="form-group col-md-6">
                               <label class="control-label">{{trans('trans.name')}}</label>
              <input type="text" placeholder="{{trans('trans.name')}}" class="form-control"    name="name"  required=""/> 
          </div>

           <div class="form-group col-md-6">
                               <label class="control-label">{{trans('trans.date')}}</label>
              <input type="date" placeholder="{{trans('trans.date')}}" class="form-control"    name="date"  required=""/> 
          </div>

          </div>

          {{--  @foreach($client->SocialMediaPlatforms  as $SocialMediaPlatform)--}}

                 
             {{--  <div class="form-group col-md-2">
                  <label class="control-label">{{trans('trans.SocialMediaPlatform')}}</label>
              <input type="hidden" placeholder="{{trans('trans.name')}}" class="form-control"   
                value="{{$SocialMediaPlatform->Platforms->name}}"  readonly /> 
          </div>--}}

              <div class="row">
           @foreach(App\Models\ContentTypes::get()  as $ContentType)
          {{-- <input type="hidden" name="SocialMediaPlatforms_id[]" value="{{$SocialMediaPlatform->SocialMediaPlatforms_id}}">--}}
           <input type="hidden" name="ContentType_id[]" value="{{$ContentType->id}}">
 <div class="form-group col-md-2">
            <label class="control-label">{{$ContentType->name}}</label>
              <input type="text" placeholder="{{trans('trans.name')}}" class="form-control"   
               name="count[]" value="0"    /> 
          </div>

 @endforeach

          </div>
  {{--@endforeach--}}
<div>
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

