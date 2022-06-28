 

@extends('admin.index')

@section('content')

  
 


                        <!-- END THEME PANEL -->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                                 <a href="{{url('/')}}">{{trans('trans.Home')}}</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <a href="{{url('/')}}/clients">{{trans('trans.clients')}}</a>
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
                  <form role="form" action="{{url('/')}}/clients" method="POST" enctype="multipart/form-data">
                    @csrf
                   
                 <div class="row">
                     
                  <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.name')}}</label>
              <input type="text" placeholder="{{trans('trans.name')}}" class="form-control"    name="name"  required=""/> 
          </div>

  <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.email')}}</label>
              <input type="email" placeholder="{{trans('trans.email')}}" class="form-control"    name="email"  required=""/> 
          </div>


 <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.password')}}</label>
              <input type="password" placeholder="{{trans('trans.password')}}" class="form-control"    name="password"  required=""/> 
          </div>

          
 
           
              <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.logo')}}</label>
  <input type="file" placeholder="{{trans('trans.photo')}}" class="form-control"    name="image"  
   /> 
               
          </div>

            <div class="form-group col-md-6">
              <label class="control-label">{{trans('trans.AccountManagerrsp')}}</label>

                <select name="AccountManager_id[]" class="form-control select2" multiple>
                    @foreach(App\Models\admin::where('type','AccountManager')->get() as $admin)
                    <option 
 
  @if (old('AccountManager_id') == $admin->id)
              selected
              @endif
                    value="{{$admin->id}}">
                      
                               {{$admin->name}} 
                               
                                 
                    </option>


                    @endforeach
                    
                </select>
          </div>

           <div class="form-group col-md-6">
              <label class="control-label">{{trans('trans.SocialMediaPlatforms')}}</label>

                <select name="SocialMediaPlatforms_id[]" class="form-control select2" multiple>
                    @foreach(App\Models\SocialMediaPlatforms::get() as $SocialMediaPlatform)
                    <option 
 
  @if (old('SocialMediaPlatforms_id') == $SocialMediaPlatform->id)
              selected
              @endif
                    value="{{$SocialMediaPlatform->id}}">
                      
                               {{$SocialMediaPlatform->name}} 
                               
                                 
                    </option>


                    @endforeach
                    
                </select>
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

