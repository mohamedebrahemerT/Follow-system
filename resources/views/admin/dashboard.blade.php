

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
                                                @foreach($clients as $admin)

                                          
                            <div class="col-lg-2 col-md-3 col-sm-2 col-xs-2">
                                <div class="dashboard-stat2 ">
                                    
                                    @if($admin->image)
                                    <a href="{{url('/')}}/clientplans/{{$admin->id}}">
                                                <img src="{{url('/')}}/{{$admin->image}}" style="width:100px;height: 100px;">
                                                @else
                                            لا يوجد 
                                                @endif
                                                </a>
                                </div>
                            </div>
                                               
                                                  @endforeach

                            </div>
                        @if(admin()->user()->type == 'superadmin')
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-green-sharp">
                                                <span data-counter="counterup" data-value="{{App\Models\admin::where('type','client')->count()}}">{{App\Models\admin::where('type','client')->count()}}</span>
                                              
                                            </h3>
                                            <small>
                                                <a href="{{url('/')}}/clients">
                                              {{trans('trans.clients')}}
                                              </a>
                                          </small>
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
                                                <span data-counter="counterup" data-value="{{App\Models\admin::where('type','AccountManager')->count()}}">{{App\Models\admin::where('type','AccountManager')->count()}}</span>
                                            </h3>
                                            <small> {{trans('trans.AccountManager')}}</small>
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
                  <span data-counter="counterup" data-value="{{App\Models\admin::where('type','GraphicDesign')->count()}}"></span>
                                            </h3>
                                            <small>{{trans('trans.GraphicDesign')}}</small>
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
                                                <span data-counter="counterup" data-value="{{App\Models\SocialMediaPlatforms::count()}}"></span>
                                            </h3>
                                            <small>{{trans('trans.SocialMediaPlatforms')}}</small>
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
                        @elseif(admin()->user()->type == 'client')
                          <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-green-sharp">
                                                <span data-counter="counterup" data-value="{{App\Models\clientplans::where('client_id',admin()->user()->id)->count()}}">{{App\Models\clientplans::where('client_id',admin()->user()->id)->count()}}</span>
                                              
                                            </h3>
                                            <small>
                                    <a href="{{url('/')}}/clientplans/{{admin()->user()->id}}">
                                              {{trans('trans.clientplans')}}
                                              </a>
                                               
                                          </small>
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
                                                <span data-counter="counterup" data-value="{{$content->count()}}">
                                                 
                                                    {{$content->count()}}
                                                   
                                                </span>
                                            </h3>
                                            <small>    <a href="{{url('/')}}/getcontent">{{trans('trans.content')}} </a></small>
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
                  <span data-counter="counterup" data-value="1"></span>
                                            </h3>
                                            <small>
                                                <a href="{{url('/')}}/admins/{{auth()->guard('admin')->user()->id}}/edit">
                                            {{trans('trans.myinfo')}}
                                            </a>
                                        </small>
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
                                                <span data-counter="counterup" 
                                                data-value="{{admin()->user()->SocialMediaPlatforms->count()}}"></span>
                                            </h3>
                                            <small>
                                                <a href="{{url('/')}}/SocialMediaPlatforms">
                                            {{trans('trans.SocialMediaPlatforms')}}
                                            </a>
                                        </small>
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
                          @elseif(admin()->user()->type == 'AccountManager')


                           <div class="row">
                            <div class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-green-sharp">
                                                <span data-counter="counterup" data-value="{{admin()->user()->myclientsasacountmanger->count()}}">
                            {{admin()->user()->myclientsasacountmanger->count()}}</span>
                                              
                                            </h3>
                                            <small>
                                    <a href="{{url('/')}}/clients">
                                              {{trans('trans.myclients')}}
                                              </a>
                                               
                                          </small>
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
                            <div class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-red-haze">
                                                <span data-counter="counterup" data-value="{{$content->count()}}">
                                                 
                                                    {{$content->count()}}
                                                   
                                                </span>
                                            </h3>
                                            <small>    <a href="{{url('/')}}/getcontent">{{trans('trans.content')}} </a></small>
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
                          
                          
                        </div>

                        @endif
                        <h1 class="page-title">{{trans('trans.orders')}}
                            <small>آخر 10 طلبات  </small>
                        </h1>

                           <div class="row">
                            <div class="col-lg-12 col-md-12col-sm-12 col-xs-12">
      <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                            <span></span>
                                                        </label>
                                                    </th>
                                                
                                                       <th> {{trans('trans.content')}}  </th>
                                        @if(admin()->user()->type !=='client')

                                                    <th> {{trans('trans.client_id')}}  </th>
                                                    @endif

                                    <th> {{trans('trans.departmet_id')}}  </th >

                                    <th> {{trans('trans.ContentType_id')}}  </th>
                                    <th> {{trans('trans.plan_id')}}  </th>
                                 
                                    <th> {{trans('trans.design')}}  </th>
                 <th> {{trans('trans.clientsnot')}}  </th>
                                       
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

                                                        {!! $admin->content !!} 
                                                    </a>
                                                    </td>
                                        @if(admin()->user()->type !=='client')

                                                    <td> {{$admin->client->name}} </td>
                                                    @endif
                                                   
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
                                                     <td>
                 @if($admin->clientsnot_id)
                  {{$admin->clientsnots->name}} 
               @endif
                                                     </td>
                                         
                                                </tr>
                                                  @endforeach
                                            </tbody>
                                        </table>
                            </div>
                        </div>
                         
                        
                    </div>
                    <!-- END CONTENT BODY -->
               

  @endsection

  