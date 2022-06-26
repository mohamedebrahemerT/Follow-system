<!-- BEGIN CONTAINER -->
<div class="page-container">


    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- BEGIN SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-light " data-keep-expanded="false"
                data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <!-- END SIDEBAR TOGGLER BUTTON -->

                @if(Auth::guard('admin')->check())

                @if(admin()->user()->role("dashboard_show"))
                    <li class="nav-item {{  request()->routeIs('dashboard.*') ? 'active' : '' }}">
                        <a href="{{url('/')}}/dashboard" class="nav-link ">
                            <i class="icon-home"></i>
                            <span class="title">{{trans('trans.Dashboard')}}</span>
                        </a>
                    </li>
                     @endif
                   
                @if(admin()->user()->role("AdminNotifications_show"))

                     <li class="nav-item {{  request()->routeIs('AdminNotifications.*') ? 'active' : '' }}">
                        <a href="{{url('/')}}/AdminNotifications" class="nav-link ">
                            <i class="icon-paper-plane"></i>
                            <span class="title"> {{trans('trans.AdminNotifications')}}</span>
                        </a>
                    </li>
                     @endif



                   
                      
@if(admin()->user()->role("admins_show"))

                     <li class="nav-item {{  request()->routeIs('admins.*') ? 'active' : '' }}">
                        <a href="{{url('/')}}/admins" class="nav-link ">
                            <i class="icon-diamond"></i>
                            <span class="title"> {{trans('trans.admins')}}</span>
                        </a>
                    </li>
                @endif

@if(admin()->user()->role("AdminGroup_show"))

                     <li class="nav-item {{  request()->routeIs('AdminGroup.*') ? 'active' : '' }}">
                        <a href="{{url('/')}}/AdminGroup" class="nav-link ">
                            <i class="icon-diamond"></i>
                            <span class="title"> {{trans('trans.AdminGroup')}}</span>
                        </a>
                    </li>
                @endif
@if(admin()->user()->role("Settings_show"))
                    
                    <li class="nav-item {{  request()->routeIs('Settings.*') ? 'active' : '' }}">
                        <a href="{{url('/')}}/Settings/edit" class="nav-link ">
                            <i class="icon-settings"></i>
                            <span class="title"> {{trans('trans.Settings')}}</span>
                        </a>
                    </li>
                @endif
                    
 


                @endif


            </ul>
            <!-- END SIDEBAR MENU -->
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->


    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
         