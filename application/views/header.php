<!doctype html>
<html lang="en" class="fixed">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>SIV</title>
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url();?>favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url();?>favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url();?>favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url();?>favicon/favicon-16x16.png">
    <!--load progress bar-->
    <script src="<?= base_url();?>vendor/pace/pace.min.js"></script>
    <link href="<?= base_url();?>vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="<?= base_url();?>vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url();?>vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?= base_url();?>vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="<?= base_url();?>vendor/toastr/toastr.min.css">
    <!--Magnific popup-->
    <link rel="stylesheet" href="<?= base_url();?>vendor/magnific-popup/magnific-popup.css">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="<?= base_url();?>stylesheets/css/style.css">


</head>

<body>
<div class="wrap">
    <!-- page HEADER -->
    <!-- ========================================================= -->
    <div class="page-header">
        <!-- LEFTSIDE header -->
        <div class="leftside-header">
            <div class="logo">
                <a href="<?= base_url();?>" class="on-click">
                    <img alt="logo" src="<?= base_url();?>images/header-logo.png" />
                </a>
            </div>
            <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>
        <!-- RIGHTSIDE header -->
        <div class="rightside-header">
            <div class="header-middle"></div>

            <!--USER HEADERBOX -->
            <div class="header-section" id="user-headerbox">
                <div class="user-header-wrap">
                    <div class="user-photo">
                        <img alt="profile photo" src="<?= base_url();?>images/helsinki.jpg"/>
                    </div>
                    <div class="user-info">
                        <span class="user-name"><?= $this->session->userdata('name');?></span>
                        <span class="user-profile"><?= $this->session->userdata('role');?></span>
                    </div>
                    <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                    <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                </div>
                <div class="user-options dropdown-box">
                    <div class="drop-content basic">
                        <ul>
                            <li> <a href="<?= base_url('index.php/users/profile');?>"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                            <li> <a href="<?= base_url('index.php/users/changePassword');?>"><i class="fa fa-key" aria-hidden="true"></i> Change password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header-separator"></div>
            <!--Log out -->
            <div class="header-section">
                <a href="<?= base_url('index.php/logout');?>" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body">