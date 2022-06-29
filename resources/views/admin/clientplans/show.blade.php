 

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
                                            <span class="caption-subject bold uppercase"> {{trans('trans.clientplans')}}</span>
                                        </div>
                                         
                                    </div>
                                   <div class="portlet-body">
                                                    <div class="tab-content">
                                                        <!-- PERSONAL INFO TAB -->
                                                        <div class="tab-pane active" id="tab_1_1">
                                                             @foreach($clientplans->client->SocialMediaPlatforms  as $SocialMediaPlatform)
    <div class="row">
                 
                  <div class="form-group col-md-2">
                  <label class="control-label">{{trans('trans.SocialMediaPlatform')}}</label>
              <input type="text" placeholder="{{trans('trans.name')}}" class="form-control"   
                value="{{$SocialMediaPlatform->Platforms->name}}"  readonly /> 
          </div>
           @foreach(App\Models\ContentTypes::get()  as $ContentType)
           <input type="hidden" name="SocialMediaPlatforms_id[]" value="{{$SocialMediaPlatform->SocialMediaPlatforms_id}}">
           <input type="hidden" name="ContentType_id[]" value="{{$ContentType->id}}">
 <div class="form-group col-md-2">
            <label class="control-label">{{$ContentType->name}}</label>
            @php
            $client_id=$clientplans->client_id;
            $SocialMediaPlatforms_id=$SocialMediaPlatform->SocialMediaPlatforms_id;
            $ContentType_id=$ContentType->id;
            $plan_id=$clientplans->id;

           if(App\Models\clientspostscount::
            where('client_id',$client_id)->
            where('SocialMediaPlatforms_id',$SocialMediaPlatforms_id)->
            where('ContentType_id',$ContentType_id)->
            where('plan_id',$plan_id)->first())
           {
 $count=App\Models\clientspostscount::
            where('client_id',$client_id)->
            where('SocialMediaPlatforms_id',$SocialMediaPlatforms_id)->
            where('ContentType_id',$ContentType_id)->
            where('plan_id',$plan_id)->first()->count;
           }
           else
           {
            $count=0;
           }

            @endphp
              <input type="text" placeholder="{{trans('trans.name')}}" class="form-control"   
               name="count[]" value="{{$count}}"   readonly /> 
          </div>

 @endforeach

          </div>
 @endforeach
               {!!$clientplans->content!!}
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

