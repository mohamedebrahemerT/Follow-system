

@extends('admin.index')

@section('content')

 


                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                <a href="{{url('/')}}">{{trans('trans.Home')}}</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>{{trans('trans.Dashboard')}}</span>
                                </li>
                            </ul>
                            
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">{{trans('trans.Dashboard')}}
                            <small>{{trans('trans.Dashboard')}} & {{trans('trans.statistics')}} </small>
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-green-sharp">
                                                <span data-counter="counterup" data-value="{{App\Models\User::count()}}">{{App\Models\User::count()}}</span>
                                              
                                            </h3>
                                            <small>{{trans('trans.users')}}</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-pie-chart"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                <span class="sr-only"> </span>
                                            </span>
                                        </div>
                                        <div class="status">
                                            <div class="status-title">   </div>
                                            <div class="status-number">   </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-red-haze">
                                                <span data-counter="counterup" data-value="0">0</span>
                                            </h3>
                                            <small>{{trans('trans.companies')}}</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-like"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
                                                <span class="sr-only"> </span>
                                            </span>
                                        </div>
                                        <div class="status">
                                            <div class="status-title">   </div>
                                            <div class="status-number">   </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-blue-sharp">
                  <span data-counter="counterup" data-value="0"></span>
                                            </h3>
                                            <small>{{trans('trans.Categories')}}</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-basket"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
                                                <span class="sr-only"> </span>
                                            </span>
                                        </div>
                                        <div class="status">
                                            <div class="status-title">   </div>
                                            <div class="status-number">   </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-purple-soft">
                                                <span data-counter="counterup" data-value="0"></span>
                                            </h3>
                                            <small>{{trans('trans.Services')}}</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-user"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
                                                <span class="sr-only"> </span>
                                            </span>
                                        </div>
                                        <div class="status">
                                            <div class="status-title">   </div>
                                            <div class="status-number">  </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h1 class="page-title">{{trans('trans.orders')}}
                            <small>آخر 10 طلبات  </small>
                        </h1>

                           <div class="row">
                            <div class="col-lg-12 col-md-12col-sm-12 col-xs-12">
 <table class="table table-striped table-bordered table-hover table-checkable order-column"  >
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                            <span></span>
                                                        </label>
                                                    </th>











 
                                                    <th> {{trans('trans.user_id')}}  </th>

                                                    <th>{{trans('trans.cod_fees')}} 
                                                    </th>

                                                     <th>{{trans('trans.order_date')}} 
                                                    </th>

                                                    <th>{{trans('trans.total_cost')}} 
                                                    </th>


                                                    <th>{{trans('trans.status')}} 
                                                    </th>

                                                      <th>{{trans('trans.payment_method')}} 
                                                    </th>
                                                    
                                                     

                                                
                                                </tr>
                                            </thead>
                                            <tbody>

                                               
                                                   
                                                <tr class="odd gradeX">
                                                    <td>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                                    </td>

                                    <td>
    <a href="1">
                                       name  <br>
                                      email<br>
                                      phone <br>
     </a>
                                      </td>
                                                    <td>
                                                        <a  > cod_fees</a>
                                                    </td>
                                                      <td> order_date  </td>
                                                      <td> total_cost   </td>
                                                      <td> 
                                                        pending
                                              


                                                            </td>
                                                 <td>
                                     cod
                                                
                                                    </td>

                                                     
                                                     
                                                   
                                                </tr>
                                              
                                                
                                            </tbody>
                                        </table>
                            </div>
                        </div>
                         
                        
                    </div>
                    <!-- END CONTENT BODY -->
               

  @endsection

  