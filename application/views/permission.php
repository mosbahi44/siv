<!doctype html>
<html lang="en" class="error-500">

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
    <div class="page-body">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--ERROR 500-->
        <div class="row animated bounce">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel mt-xlg">
                    <div class="panel-content">
                        <h1 class="error-number">500</h1>
                        <h2 class="error-name">Internal server error</h2>
                        <p class="error-text">Sorry, something went wrong.
                            <br/>Please wait a moment and try again or use one of the options below</p>
                        <div class="row mt-xlg">
                            <div class="col-sm-6  col-sm-offset-3">
                                <button class="btn btn-sm btn-darker-2 btn-block" onclick="history.back();">Previous page</button>
                                <a href="<?= base_url('index.php/dashboard');?>" class="btn btn-sm btn-primary btn-block">Dashboard</a>
                            </div>
                        </div>
                    </div>
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
