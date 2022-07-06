<!DOCTYPE html>

<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8"/>
    <title>{{setting()->name}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('/')}}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('/')}}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('/')}}/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('/')}}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{url('/')}}/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('/')}}/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{url('/')}}/assets/global/css/components-md-rtl.min.css" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="{{url('/')}}/assets/global/css/plugins-md-rtl.min.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{url('/')}}/assets/layouts/layout/css/layout-rtl.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/assets/layouts/layout/css/themes/blue-rtl.min.css" rel="stylesheet" type="text/css"
          id="style_color"/>
    <link href="{{url('/')}}/assets/layouts/layout/css/custom-rtl.min.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME LAYOUT STYLES -->

    <!-- Favicon -->
   <link rel="shortcut icon" href="{{url('/')}}/{{setting()->Fivacon}}" type="image/x-icon" />
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{url('/')}}/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css"
          rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{url('/')}}/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet"
          type="text/css"/>

           <link rel="stylesheet" href="{{url('/')}}/assets/jstree/dist/themes/default/style.min.css">
    <!-- END PAGE LEVEL PLUGINS -->
    @stack('style')


    <link href="{{ asset('/assets/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">


    <style type="text/css">

        /* Switch
           ========================================================================== */
        .switch,
        .switch * {
            -webkit-user-select: none;
            -moz-user-select: none;
            -khtml-user-select: none;
            -ms-user-select: none;
        }

        .switch label {
            cursor: pointer;
        }

        .switch label input[type=checkbox] {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .switch label input[type=checkbox]:checked + .lever {
            background-color: #84c7c1;
        }

        .switch label input[type=checkbox]:checked + .lever:after {
            background-color: #26a69a;
            left: 24px;
        }

        .switch label .lever {
            content: "";
            display: inline-block;
            position: relative;
            width: 40px;
            height: 15px;
            background-color: #818181;
            border-radius: 15px;
            margin-right: 10px;
            -webkit-transition: background 0.3s ease;
            -o-transition: background 0.3s ease;
            transition: background 0.3s ease;
            vertical-align: middle;
            margin: 0 16px;
        }

        .switch label .lever:after {
            content: "";
            position: absolute;
            display: inline-block;
            width: 21px;
            height: 21px;
            background-color: #F1F1F1;
            border-radius: 21px;
            -webkit-box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4);
            box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4);
            left: -5px;
            top: -3px;
            -webkit-transition: left 0.3s ease, background .3s ease, -webkit-box-shadow 0.1s ease;
            transition: left 0.3s ease, background .3s ease, -webkit-box-shadow 0.1s ease;
            -o-transition: left 0.3s ease, background .3s ease, box-shadow 0.1s ease;
            transition: left 0.3s ease, background .3s ease, box-shadow 0.1s ease;
            transition: left 0.3s ease, background .3s ease, box-shadow 0.1s ease, -webkit-box-shadow 0.1s ease;
        }

        input[type=checkbox]:checked:not(:disabled) ~ .lever:active::after,
        input[type=checkbox]:checked:not(:disabled).tabbed:focus ~ .lever::after {
            -webkit-box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(38, 166, 154, 0.1);
            box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(38, 166, 154, 0.1);
        }

        input[type=checkbox]:not(:disabled) ~ .lever:active:after,
        input[type=checkbox]:not(:disabled).tabbed:focus ~ .lever::after {
            -webkit-box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(0, 0, 0, 0.08);
            box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(0, 0, 0, 0.08);
        }

        .switch input[type=checkbox][disabled] + .lever {
            cursor: default;
        }

        .switch label input[type=checkbox][disabled] + .lever:after,
        .switch label input[type=checkbox][disabled]:checked + .lever:after {
            background-color: #BDBDBD;
        }
        .page-header.navbar {
            background-color: #252B28;
        }
        .page-sidebar .page-sidebar-menu, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu {
            background-color: #252B28;
        }
        body{
            background-color: #252B28;
        }
        .page-sidebar .page-sidebar-menu.page-sidebar-menu-light>li .sub-menu, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu.page-sidebar-menu-light>li .sub-menu {
            background-color: #252B28;
        }

        .page-sidebar .page-sidebar-menu > li > a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu > li > a {
  color: #FFF;
}
    </style>


<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-md">
<div class="page-wrapper">
   <div class="portlet-body">