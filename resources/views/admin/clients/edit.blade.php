 

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
                 <form role="form" action="{{url('/')}}/clients/{{$client->id}}" method="POST" enctype="multipart/form-data">
 					@csrf
 					{{ method_field('PATCH') }}
                   
                   <input type="hidden" name="id" value="{{$client->id}}">
 


            <div class="row">
                         <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.name')}}</label>
              <input type="text" placeholder="{{trans('trans.name')}}" class="form-control"    name="name"  required="" value="{{$client->name}}" /> 
          </div>


 <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.email')}}</label>
              <input type="email" placeholder="{{trans('trans.email')}}" class="form-control"    name="email"  required="" value="{{$client->email}}"/> 
          </div>


 <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.password')}}</label>
              <input type="password" placeholder="{{trans('trans.password')}}" class="form-control"    name="password"  required="" /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.logo')}}</label>
  <input type="file" placeholder="{{trans('trans.photo')}}" class="form-control"    name="image"  
   /> 
               
          </div>


           <div class="form-group col-md-4">
              <label class="control-label">{{trans('trans.AccountManagerrsp')}}</label>

                <select name="AccountManager_id[]" class="form-control select2" multiple>
                   @foreach(App\Models\admin::where('type','AccountManager')->get() as $admin)
                   
                    <option   

                      @foreach($client->AccountsManagers  as $AccountsManager )    
                 @if($AccountsManager->AccountManager_id == $admin->id)
                 selected
                 @endif
                    @endforeach
                    value="{{$admin->id}}">
                      
                               {{$admin->name}}        
                    </option>


                    @endforeach
                    
                </select>
          </div>

          <div class="form-group col-md-4">
              <label class="control-label">{{trans('trans.GraphicDesign')}}</label>

                <select name="GraphicDesign_id[]" class="form-control select2" multiple>
                   @foreach(App\Models\admin::where('type','GraphicDesign')->get() as $admin)
                   
                    <option   

                      @foreach($client->GraphicDesigners  as $GraphicDesigner )    
                 @if($GraphicDesigner->GraphicDesign_id == $admin->id)
                 selected
                 @endif
                    @endforeach
                    value="{{$admin->id}}">
                      
                               {{$admin->name}}        
                    </option>


                    @endforeach
                    
                </select>
          </div>

           <div class="form-group col-md-4">
              <label class="control-label">{{trans('trans.SocialMediaPlatforms')}}</label>

                <select name="SocialMediaPlatforms_id[]" class="form-control select2" multiple>
                    @foreach(App\Models\SocialMediaPlatforms::get() as $SocialMediaPlatform)
                    <option 
 
 @foreach($client->SocialMediaPlatforms  as $SocialMediaPlatforms )    
                 @if($SocialMediaPlatforms->SocialMediaPlatforms_id == $SocialMediaPlatform->id)
                 selected
                 @endif
                    @endforeach
                    
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
          

   
                               <br>
        

               @if($client->image)
                                             <img src="{{url('/')}}/{{$client->image}}"  style="width:200px;height:200px">
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

