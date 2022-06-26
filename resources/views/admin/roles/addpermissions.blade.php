 

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
                                    <a href="{{url('/')}}/roles">{{trans('trans.roles')}}</a>
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
                  <form role="form" action="{{url('/')}}/roles/addpermissions" method="POST" enctype="multipart/form-data">
                    @csrf
                   
 


                     <div class="form-group">
              <input type="text" placeholder="{{trans('trans.name')}}" class="form-control"    name="name"  value="{{$role->name}}" readonly /> 

                 <input type="hidden" name="role_id"  value="{{$role->id}}"  /> 
          </div>


          <div class="form-group">
              @foreach(App\Models\permission::get() as $permission)
 <input  type="checkbox" id="{{$permission->id}}" name="permission_id[]" value="{{$permission->id}}"               
  @foreach(App\Models\role_has_permission::get() as $role_has_permission)
                 @if($role_has_permission->role_id == $role->id and  $role_has_permission->permission_id ==$permission->id)
                 checked=""
                 @endif
    @endforeach

 >
<label for="{{$permission->id}}"> {{$permission->name}}</label><br>
              @endforeach
 
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

