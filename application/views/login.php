<!doctype html>
<html lang="en" class="fixed accounts sign-in">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>SIV</title>
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url();?>favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url();?>favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url();?>favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url();?>favicon/favicon-16x16.png">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="<?= base_url();?>vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url();?>vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?= base_url();?>vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="<?= base_url();?>stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <img alt="logo" src="<?= base_url();?>images/logo-dark.png" />
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">

                    <?php echo validation_errors('<div class="alert alert-warning fade in"><a href="#" class="close" data-dismiss="alert">×</a>','</div>'); ?>
                    <?php
                    if(isset($message) && $message != '')
                        echo '<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">×</a>'.$message.'</div>';
                    ?>
                    <?php
                    echo form_open();
                    ?>

                    <form>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                                <i class="fa fa-key"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <?= form_submit('submit', 'Sign in', array('class'=>'btn btn-primary btn-block'));?>

                        </div>
                        <div class="form-group text-center">
                            <a href="pages_forgot-password.html">Forgot password?</a>
                        </div>
                        <?php
                        echo form_close();
                        ?>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="<?= base_url();?>vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="<?= base_url();?>vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url();?>vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="<?= base_url();?>javascripts/template-script.min.js"></script>
<script src="<?= base_url();?>javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>

</html>
