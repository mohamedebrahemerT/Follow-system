 

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
                                    <a href="{{url('/')}}/admins">{{trans('trans.admins')}}</a>
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
                 <form role="form" action="{{url('/')}}/admins/{{$admin->id}}" method="POST" enctype="multipart/form-data">
 					@csrf
 					{{ method_field('PATCH') }}
                   
                   <input type="hidden" name="id" value="{{$admin->id}}">
 


                     <div class="form-group">
                               <label class="control-label">{{trans('trans.name')}}</label>
              <input type="text" placeholder="{{trans('trans.name')}}" class="form-control"    name="name"  required="" value="{{$admin->name}}" /> 
          </div>


 <div class="form-group">
                               <label class="control-label">{{trans('trans.email')}}</label>
              <input type="email" placeholder="{{trans('trans.email')}}" class="form-control"    name="email"  required="" value="{{$admin->email}}"/> 
          </div>


 <div class="form-group">
                               <label class="control-label">{{trans('trans.password')}}</label>
              <input type="password" placeholder="{{trans('trans.password')}}" class="form-control"    name="password"  required="" /> 
          </div>

           <div class="form-group">
                               <label class="control-label">{{trans('trans.phone')}}</label>
              <input type="phone" placeholder="{{trans('trans.phone')}}" class="form-control"    name="phone"  required=""  value="{{$admin->phone}}"/> 
          </div>



           
                <div class="form-group">
                               <label class="control-label">{{trans('trans.role')}}</label>

                <select name="group_id" class="form-control">
                    @foreach(App\Models\AdminGroup::get() as $AdminGroup)
                    <option value="{{$AdminGroup->id}}"   @if($AdminGroup->id == $admin->group_id) selected="" @endif >
                      
                               {{$AdminGroup->group_name}} 
                                 
                    </option>
                    @endforeach
                    
                </select>
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

