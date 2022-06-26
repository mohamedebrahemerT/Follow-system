 
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
                                            <span class="caption-subject bold uppercase"> {{trans('trans.Settings')}}</span>
                                        </div>
                                         
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="btn-group">
                                                        <button id="sample_editable_1_new" class="btn sbold green"> {{trans('trans.Add New')}}
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                            <span></span>
                                                        </label>
                                                    </th>
                                                    <th> {{trans('trans.about_ar')}}  </th>

                                                    

													 <th>{{trans('trans.terms_ar')}} 
													</th>

                                                  
                                                    <th>{{trans('trans.privacy_ar')}} 
                                                    </th>
                                                       
                                                      
                                                     

                                                    <th>{{trans('trans.Actions')}}  </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            	@foreach($Settings as $Coupon)
                                                <tr class="odd gradeX">
                                                    <td>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                  
                                                    
                                                    <td>
                                                         {!! $Coupon->about_ar !!} 
                                                    </td>

                                                     <td>
                                                         {!! $Coupon->terms_ar !!} 
                                                    </td>

                                                    <td>
                                                         {!! $Coupon->privacy_ar !!} 
                                                    </td>

                                                     
                                                      



                                                     
                                                     
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> {{trans('trans.Actions')}}
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-left" role="menu">

                                                                 <li>
                                                                    <a href="javascript:;">
                                                                        <i class="icon-tag"></i>
                                    {{trans('trans.show details')}}
                                                                         </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="icon-docs"></i> 
                                                    {{trans('trans.edit')}}
                                                                </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
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

  