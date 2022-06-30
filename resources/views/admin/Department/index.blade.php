

@extends('admin.index')

@section('content')

    @push('style')
    
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
                                    <a href="{{url('/')}}/Departments">{{trans('trans.Department')}}</a>
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
                                            <span class="caption-subject bold uppercase"> {{trans('trans.Department')}}</span>
                                        </div>
                                         
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="btn-group">
                 <a id="sample_editable_1_new" class="btn sbold green" href="{{url('/')}}/Departments/create"> {{trans('trans.Add New')}}
                                                            <i class="fa fa-plus"></i>
                                                        </a>
 
                  
                                                    </div>
                                                     <a   class="btn sbold green" href="{{url('/')}}/Departments?Departments=Tree"> {{trans('trans.How Tree')}}
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                </div>
                                                
                                            </div>
                                        </div >
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th> {{trans('trans.id')}}  </th>
                                                    
                                                    <th> {{trans('trans.name')}}  </th>

                                                    <th> {{trans('trans.photo')}}  </th>
                                                   
                                                     
                                                     
                                                     

                                                    <th>{{trans('trans.Actions')}}  </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            	@foreach($Department as $Dep)
                                                <tr class="odd gradeX">
                                                     <td>
                                                          {{$Dep->id}} 
                                                      
                                                       </td>
                                                     
                                                    <td>
                                                          {{$Dep->name}} 
                                                      
                                                       </td>

                                                       <td>
                                                @if($Dep->photo)
                                                <img src="{{url('/')}}/{{$Dep->photo}}" style="width:50px;height: 50px;">
                                                @else
                                            لا يوجد 
                                                @endif
                                    
                                                      
                                                       </td>
  
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> {{trans('trans.Actions')}}
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-left" role="menu">

                                                                  
                                                                <li>
                     <a href="{{url('/')}}/Departments/{{$Dep->id}}/edit">
                                                                        <i class="icon-docs"></i> 
                                                    {{trans('trans.edit')}}
                                                                </a>
                                                                </li>

                                                                  <li>
                     <a href="{{url('/')}}/Departments/{{$Dep->id}}">
                                                                        <i class="icon-docs"></i> 
                                                    {{trans('trans.show')}}
                                                                </a>
                                                                </li>
                                                                <li>
                                              <a href="{{url('/')}}/Departments/{{$Dep->id}}/destroy">
                                                                        <i class="icon-tag"></i>
                                     {{trans('trans.delete')}}
                                                                         </a>
                                                                </li>
                                                                
                                                               
                                                                
                                                            </ul>
                                                        </div>
                                                    </td>
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

  