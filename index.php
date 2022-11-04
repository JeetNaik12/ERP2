<?php 
// include("config/connection.php");
include("language/language.php");
?>
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Purchase Module</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/monsteradmin/" />
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">

</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(assets/images/background/login-register.jpg) no-repeat center center; background-size: cover;">
            <div class="auth-box on-sidebar p-4 bg-white m-0">
                <div id="loginform">
                    <div class="logo text-center">
                        <span class="db"><img src="assets/images/logo-icon.png" alt="logo" /><br />
                            <img src="assets/images/logo-text.png" alt="Home" /></span>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                          <!-- login_db.php -->
                            <form id="myForm" class="form-horizontal mt-3 form-material" method="POST" action="home.php">
                                <div class="form-group mb-3">
                                    <div class="col-xs-12">
                                        <input class="form-control" name="email_id" type="email" required="" placeholder="Email Id">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="col-xs-12">
                                        <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <div class="d-flex">
                                        <div class="checkbox checkbox-info float-left pt-0">
                                            <input id="checkbox-signup" type="checkbox" class="material-inputs chk-col-indigo">
                                            <label for="checkbox-signup"> Remember me </label>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="form-group text-center mt-3">
                                    <div class="col-xs-12">
                                        <button id="btn_login" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">
                                            <span id="loading" style="display:none"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                Loading...</span>
                                            <span id="login">Log In</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
                                        <?php if (isset($_SESSION['error'])) { ?>
                                            <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <?php echo $client_lang[$_SESSION['error']]; ?>
                                            </div>
                                        <?php
                                            unset($_SESSION['error']);
                                        } ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        // javascript to disable button while submitting form 
        $(document).ready(function() {
            $('#myForm').on('submit', function(e) {
                e.preventDefault();
                $("#loading").show();
                $("#login").hide();
                $(':input[type="submit"]').prop('disabled', true);
                this.submit();
            });
        });
        //javascript disable button while submitting form ends


        $('[data-toggle="tooltip"]').tooltip();
        $(".preloader").fadeOut();
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
</body>

</html>