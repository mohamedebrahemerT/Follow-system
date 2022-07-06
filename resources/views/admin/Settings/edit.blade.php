@extends('admin.index')

@section('content')

   @push('js')
       

            <script>

                // Replace the <textarea id="editor1"> with a CKEditor

                // instance, using default configuration.

                CKEDITOR.replace( 'about_desc' , {

        language: 'ar',

});

             
        
                CKEDITOR.replace( 'What_Makes_Us_unique_desc' , {

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
                <a href="{{url('/')}}/Settings">{{trans('trans.Settings')}}</a>
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
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="tab-content">
                        <!-- PERSONAL INFO TAB -->
                        <div class="tab-pane active" id="tab_1_1">
                            <form role="form" action="{{url('/')}}/Settings/update" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$Settings->id}}">
                                



 




  <div class="form-group">
                                    <label class="control-label">إسم الموقع</label>
                                    <input type="text" placeholder="{{trans('trans.name')}}" class="form-control"
                                           value="{{$Settings->name}}" name="name" required=""/>
                                </div>

                                

                                  <div class="form-group">
                               <label class="control-label">Fivacon</label>

<input type="file" placeholder="{{trans('trans.Fivacon')}}" class="form-control" name="Fivacon" /> 

                               <br>
              <img src="{{url('/')}}/{{$Settings->Fivacon}}"  style="width:200px;height:200px">
          </div>

                                  <div class="form-group">
                               <label class="control-label">لوجو الموقع العلوي</label>

<input type="file" placeholder="{{trans('trans.logo')}}" class="form-control" name="logo" /> 

                               <br>
              <img src="{{url('/')}}/{{$Settings->logo}}"  style="width:200px;height:200px">
          </div>

           


     <div class="form-group">
                                    <label class="control-label">{{trans('trans.phone')}}</label>
                                    <input type="number" placeholder="{{trans('trans.phone')}}" class="form-control"
                                           value="{{$Settings->phone}}" name="phone" required=""/>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">{{trans('trans.email')}}</label>
                                    <input type="email" placeholder="{{trans('trans.email')}}" class="form-control"
                                           value="{{$Settings->email}}" name="email" required=""/>
                                </div>

                                     <div class="form-group">
                                    <label class="control-label">{{trans('trans.address')}}</label>
                                    <input type="text" placeholder="{{trans('trans.address')}}" class="form-control"
                                           value="{{$Settings->address}}" name="address" required=""/>
                                </div>





                                 <div class="form-group">
                                    <label class="control-label">{{trans('trans.facebook_link')}}</label>
                                    <input type="text" placeholder="{{trans('trans.facebook_link')}}" class="form-control"
                                           value="{{$Settings->facebook_link}}" name="facebook_link" required=""/>
                                </div>

                                 <div class="form-group">
                                    <label class="control-label">{{trans('trans.twitter_link')}}</label>
                                    <input type="text" placeholder="{{trans('trans.twitter_link')}}" class="form-control"
                                           value="{{$Settings->twitter_link}}" name="twitter_link" required=""/>
                                </div>

                                    <div class="form-group">
                                    <label class="control-label">{{trans('trans.linkedin_link')}}</label>
                                    <input type="text" placeholder="{{trans('trans.linkedin_link')}}" class="form-control"
                                           value="{{$Settings->linkedin_link}}" name="linkedin_link" required=""/>
                                </div>

                                 

                                   
                                



                                 <div class="form-group">
                                    <label class="control-label">{{trans('trans.copy_right')}}</label>
                                    <input type="text" placeholder="{{trans('trans.copy_right')}}" class="form-control"
                                           value="{{$Settings->copy_right}}" name="copy_right" required=""/>
                                </div>

                                 <div class="form-group">
                                    <label class="control-label">{{trans('trans.about_title')}}</label>
                                    <input type="text" placeholder="{{trans('trans.about_title')}}" class="form-control"
                                           value="{{$Settings->about_title}}" name="about_title" required=""/>
                                </div>

                                 <div class="form-group">
                                    <label class="control-label">{{trans('trans.about_desc')}}</label>
  <textarea class="form-control" name="about_desc" class="form-control about_desc">
                   {{$Settings->about_desc}}
              </textarea>
                                </div>




    <div class="form-group">
                               <label class="control-label">{{trans('trans.about_img')}}</label>

<input type="file" placeholder="{{trans('trans.about_img')}}" class="form-control" name="about_img" /> 

                               <br>
              <img src="{{url('/')}}/{{$Settings->about_img}}"  style="width:200px;height:200px">
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

