<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Padai Vadai</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets_main/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets_main/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets_main/bower_components/Ionicons/css/ionicons.min.css">
        <!-- jvectormap -->

        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets_main/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets_main/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets_main/dist/css/skins/_all-skins.min.css">
         <script src="<?php echo base_url(); ?>assets_main/dist/js/angular.min.js"></script>

   

        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <?php
        $session_data = $this->session->userdata('logged_in');

        if (empty($session_data)) {
//            redirect('LoginAndLogout', 'refresh');
        }
        ?>
        <div class="wrapper" ng-app="HASALE">

             <script>
            var HASALE = angular.module('HASALE', []).config(function ($interpolateProvider, $httpProvider) {
                $interpolateProvider.startSymbol('{$');
                $interpolateProvider.endSymbol('$}');
                 $httpProvider.defaults.headers.common = {};
            $httpProvider.defaults.headers.post = {};

            });</script>
            <header class="main-header">

                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>Padai</b>Vadai</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Padhai</b>Vadhai</span>
                </a>

                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                          
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url(); ?>assets_main/image/icon.png" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo $session_data['first_name']; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url(); ?>assets_main/image/icon.png" class="img-circle" alt="User Image">

                                        <p>
                                            <?php echo $session_data['first_name']; ?> 
                                            <small></small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
<!--                                    <li class="user-body">
                                        <div class="row">
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Followers</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Sales</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Friends</a>
                                            </div>
                                        </div>
                                         /.row 
                                    </li>-->
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
<!--                                        <div class="pull-left">
                                            
                                            <a href="<?php echo base_url(); ?>index.php/UserRecordManagement/profile_update_info" class="btn btn-default btn-flat">Profile</a>
                                        </div>-->
                                        <div class="">
                                            <center> <a href="<?php echo base_url('index.php/LoginAndLogout/logout'); ?>" class="btn btn-default btn-flat">Sign out</a></center>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                          
                        </ul>
                    </div>

                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <?php
            $user = $session_data['user_type'];
            $this->load->view('layout/leftMenuAdmin');
            ?>
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
<!--                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Version 2.0</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>-->