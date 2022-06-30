

@extends('admin.index')

@section('content')

    @push('style')
    

    @endpsu

 


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

                                 <li>
                                  {{$clientplan->client->name}}
                                    <i class="fa fa-circle"></i>
                                </li>

                                <li>
                                    <a href="{{url('/')}}/clientplans/{{$clientplan->client->id}}">{{$clientplan->name}}</a>
                                    <i class="fa fa-circle"></i>
                                </li>

                                 

                                <li>
                                    {{trans('trans.content')}}
                                    
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
{{trans('trans.Home')}} - {{trans('trans.clients')}}  - {{$clientplan->client->name}} - {{$clientplan->name}}  -  {{trans('trans.content')}}

                                        </span>
                                        </div>
                                         
                                    </div>
                                    <div class="portlet-body">
                                      @if(admin()->user()->type == 'AccountManager')
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="btn-group">
                                                        <a href="{{url('/')}}/content/create/{{$clientplan_id}}" id="sample_editable_1_new" class="btn sbold green"> {{trans('trans.Add New')}}
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        @endif
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                            <span></span>
                                                        </label>
                                                    </th>
                                                
                                                       <th> {{trans('trans.title')}}  </th>
                                                       <th> {{trans('trans.content')}}  </th>
                                                    <th> {{trans('trans.client_id')}}  </th>
                                    <th> {{trans('trans.departmet_id')}}  </th>
                                    <th> {{trans('trans.ContentType_id')}}  </th>
                                    <th> {{trans('trans.plan_id')}}  </th>
                                 
                                    <th> {{trans('trans.design')}}  </th>
                                                    
                                                 




  
                                        @if(admin()->user()->type  =='superadmin'  or admin()->user()->type  =='AccountManager')
                                                   
                                                    <th>{{trans('trans.Actions')}}  </th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>

                                            	@foreach($content as $admin)
                                                <tr class="odd gradeX">
                                                    <td>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                                    </td>
        <td> 
                                               <a href="{{url('/')}}/content/{{$admin->id}}"> 
                                                        {!! $admin->name !!}
                                                        </a>
                                                         </td>
                                                 
                                                    <td> 
                                               <a href="{{url('/')}}/content/{{$admin->id}}"> 
                                                        {!! $admin->content !!}
                                                        </a>
                                                         </td>
                                                    <td> {{$admin->client->name}} </td>
                                                    <td>
                                                        @if($admin->departmet_id)
                                                     {{$admin->Department->name}} 
                                                     @endif
                                                 </td >
                                                    <td> {{$admin->ContentType->name}} </td>
                                                    <td> {{$admin->plan->name}} </td>
                                                    <td> 
 @if($admin->image)
                                                <img src="{{url('/')}}/{{$admin->image}}" style="width:50px;height: 50px;">
                                                @else
                                            لا يوجد 
                                                @endif
                                                     </td>
                                                    
                                
                                        @if(admin()->user()->type  =='superadmin'  or admin()->user()->type  =='AccountManager')
                                                  
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> {{trans('trans.Actions')}}
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-left" role="menu">
                                                                <li>
                         <a href="{{url('/')}}/content/{{$admin->id}}">
                                     <i class="icon-docs"></i>{{trans('trans.show')}} </a>
                                                                </li>
                                                                <li>
                                                 <a href="{{url('/')}}/content/{{$admin->id}}/edit">
                                     <i class="icon-docs"></i>{{trans('trans.edit')}} </a>
                                                                </li>

                                                                 <li>
                                                 <a href="{{url('/')}}/content/{{$admin->id}}/destroy ">
                                     <i class="icon-docs"></i>{{trans('trans.delete')}} </a>
                                                                </li>
                                                                
                                                                
                                                               
                                                                 
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    @endif
                                                </tr>
                                                  @endforeach
                                            </tbody>
                                        </table>
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

  