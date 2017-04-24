<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="refresh" content="5400" />
        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />

        <meta http-equiv="Pragma" content="no-cache"/>
        <meta http-equiv="Expires" content="-1"/>
        <meta http-equiv="Cache-Control" content="no-cache"/>

        <meta name="keywords" content="Topics"/>
        <meta name="description" content="Topics"/>
        <meta name="robots" content="index, follow"  />
        <meta name="googlebot" content="index, follow">
        <meta name="revisit-after" content="1 days" />
        <meta name="generator" content="Topics" />
        <meta name="rating" content="General">

        <meta property="og:url" content=""> <!--url-->
        <meta property="og:description" content="Topics">
        <meta property="og:title" content="Topics">
        <meta property="og:image" content=""> <!--link img-->
        <meta property="og:site_name" content=""> <!--url-->
        <meta property="og:type" content="product" />
        <meta property="og:locale" content="vi_VN" />
        <meta itemprop="image" content=""> <!--link img-->

        <meta property="article:section" content="Topics" />
        <meta property="article:tag" content="Topics" />

        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="" />
        <meta name="twitter:title" content="Topics" />
        <meta name="twitter:description" content="Topics" />
        <meta name="twitter:image" content="" /> <!--link img-->
        <meta name="twitter:url" content="" /> <!--url-->

        <title>Xác nhận tài khoản</title>

        <link rel="shortcut icon" type="image/x-icon" href=""/> <!--icon-->

        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="dist/css/style.css" type="text/css" rel="stylesheet" />
        <link href="dist/css/style-pop.css" rel="stylesheet" type="text/css">
        <link href="dist/css/animate.min.css" rel="stylesheet" type="text/css">

        <!-- Custom Fonts -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel='stylesheet' id='gfont-style-css'  href='http://fonts.googleapis.com/css?family=Roboto%3A100%2C300%2C300italic%2C400%2C400italic%2C500%2C700%2C900%7CRoboto+Slab%3A300%2C400%2C700%7CArapey%3A400%2C400italic%7CLobster%7CCinzel%7CPoiret+One%3A400%7CJosefin+Sans%3A400%7CDomine%3A400&#038;ver=4.4.5' type='text/css' media='all' />
        
        <!--css-->
    </head>

	<body class="cbp-spmenu-push">
         <?php 
            include("header.php");
            include("login.php");
            include("register.php");
        ?>

        <div class="container" style="z-index:1 !important;">
            <div class="row" style="display:flex;margin:50px 0;">
                <div class="col-md-7" style="margin:auto;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">Xác nhận tài khoản</div>
                        </div>
                        <div class="panel-body">
                                <?php
                                    include('control/configure.php'); 
                                    $msg='';
                                    if(!empty($_GET['code']) && isset($_GET['code'])){
                                        $code=mysql_real_escape_string($_GET['code']);
                                        $c=mysqli_query($con,"SELECT iduser FROM user WHERE activation='$code'");
                                        if(mysqli_num_rows($c) > 0){
                                            $count=mysqli_query($con,"SELECT iduser FROM user WHERE activation='$code' and state='0'");
                                            if(mysqli_num_rows($count) == 1){
                                                mysqli_query($con,"UPDATE user SET state='1' WHERE activation='$code'");
                                                $msg="Tài khoản của bạn đã được kích hoạt!";
                                            }else{
                                                $msg ="Tài khoản của bạn đã kích hoạt rồi, không cần xác nhận lại.";
                                            }
                                        }else{
                                            $msg ="Mã xác nhận không đúng.";
                                        }
                                    }
                                ?>
                                <div class="noti-repwd-me"><br><br><i><?php echo $msg; ?></i></div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php 
        include("footer.php");
    ?>

<!-- jQuery -->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="dist/js/jquery-3.1.1.min.js"></script>
    <!-- <script src="dist/js/jquery-1.8.2.min.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Angular -->
    <script src="dist/js/angular.min.js"></script>
    <script src="dist/js/angular-route.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/style.js"></script>
    <script src="dist/js/wow.min.js"></script>
    <script src="dist/js/move-top.js"></script>
    <script src="dist/js/easing.js"></script>

    <!-- tinymce -->
    <!-- <script src="tinymce/tinymce.min.js" type="text/javascript"></script> -->
    <script>
     new WOW().init();
    </script>
    <!--javascript-->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){     
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>

    <script type="text/javascript">
      $(document).ready(function() {      
        $().UItoTop({ easingType: 'easeOutQuart' });
                  
        });
    </script>

    </body>