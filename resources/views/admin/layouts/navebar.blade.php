  <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo" style="text-align: center;">
                        <span style="margin-top: 10px;color: white;text-align: center; font-size: 15px; font-weight: bolder;">  {{setting()->name}}</span>
{{--                        <div class="menu-toggler sidebar-toggler">--}}
{{--                            <span></span>--}}
{{--                        </div>--}}
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">

                            <!-- END TODO DROPDOWN -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="{{url('/')}}/assets/layouts/layout/img/avatar3_small.jpg" />
                                    <span class="username username-hide-on-mobile">

                                     @if(auth()->guard('admin')->user())
                                     {{ auth()->guard('admin')->user()->name }}
                                     @endif

                                    </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                         <li>
                                          @if(Auth::guard('admin')->check())
                                         
         <a href="{{url('/')}}/admins/{{auth()->guard('admin')->user()->id}}/edit">
                                            <i class="icon-user"></i>
                                            {{trans('trans.Edit profile')}} 

                                         </a>
                                            @else

                    <a href="{{url('/')}}/companiesadmins/{{auth()->guard('companies')->user()->id}}/edit">
                                            <i class="icon-user"></i>
                                            {{trans('trans.Edit profile')}} 

                                         </a>
                 
                                            @endif
                                            
                                    </li>


                                    <li class="divider"> </li>

                                    <li>
                                          @if(Auth::guard('admin')->check())
                                        <a href="{{url('/')}}/Admin_logout">
                                            <i class="icon-key"></i>{{trans('trans.Log Out')}}  </a>
                                            @else
                                             <a href="{{url('/')}}/companies_logout">
                                            <i class="icon-key"></i>{{trans('trans.Log Out')}}  </a>

                                            @endif
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <!--li class="dropdown dropdown-quick-sidebar-toggler">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <i class="icon-logout"></i>
                                </a>
                            </li -->
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->


            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
