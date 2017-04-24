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

        <meta name="keywords" content="Diễn đàn tiếng Anh"/>
        <meta name="description" content="Diễn đàn tiếng Anh"/>
        <meta name="robots" content="index, follow"  />
        <meta name="googlebot" content="index, follow">
        <meta name="revisit-after" content="1 days" />
        <meta name="generator" content="Diễn đàn tiếng Anh" />
        <meta name="rating" content="General">

        <meta property="og:url" content=""> <!--url-->
        <meta property="og:description" content="Diễn đàn tiếng Anh">
        <meta property="og:title" content="Diễn đàn tiếng Anh">
        <meta property="og:image" content=""> <!--link img-->
        <meta property="og:site_name" content=""> <!--url-->
        <meta property="og:type" content="product" />
        <meta property="og:locale" content="vi_VN" />
        <meta itemprop="image" content=""> <!--link img-->

        <meta property="article:section" content="Diễn đàn tiếng Anh" />
        <meta property="article:tag" content="Diễn đàn tiếng Anh" />

        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="" />
        <meta name="twitter:title" content="Diễn đàn tiếng Anh" />
        <meta name="twitter:description" content="Diễn đàn tiếng Anh" />
        <meta name="twitter:image" content="" /> <!--link img-->
        <meta name="twitter:url" content="" /> <!--url-->

        <title>Kết quả tìm kiếm</title>

        <link rel="shortcut icon" type="image/x-icon" href=""/> <!--icon-->

        
        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="dist/css/style.css" type="text/css" rel="stylesheet" />
        <link href="dist/css/style-pop.css" rel="stylesheet" type="text/css">
        <link href="dist/css/animate.min.css" rel="stylesheet" type="text/css">

        <!-- Custom Fonts -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel='stylesheet' id='gfont-style-css' href='http://fonts.googleapis.com/css?family=Roboto%3A100%2C300%2C300italic%2C400%2C400italic%2C500%2C700%2C900%7CRoboto+Slab%3A300%2C400%2C700%7CArapey%3A400%2C400italic%7CLobster%7CCinzel%7CPoiret+One%3A400%7CJosefin+Sans%3A400%7CDomine%3A400&#038;ver=4.4.5' type='text/css' media='all' />
        
        <!--css-->
    </head>

    <body class="cbp-spmenu-push">
        
        <?php 
            include("header.php");
            include("login.php");
            include("register.php");
            include("simple_html_dom.php");
        ?>
                    
    <article>
        <section class="content gallery pad1">
            <div class="midle_main_idclass fix1200_cus1">
                <div class="banner-bottom animated wow lightSpeedIn" data-wow-duration="1500ms" data-wow-delay="800ms">
                    <ul id="flexiselDemo1">
                        <!--Bài viết cua admin-->
                        <?php
                        include("control/configure.php");
                            $sql = "SELECT * FROM article WHERE ((idtopic = '1') AND (state = '1')) ORDER BY datepost DESC LIMIT 4";
                            $result = mysqli_query($con, $sql);
                            while($row=mysqli_fetch_array($result)){
                                $small = $row['content'];
                                $html = str_get_html($small)->plaintext;
                                $rutgon = substr($html, 0, 200);
                                ?>
                                <li>
                                    <div class="item item-sub1" style="background:url('upload/<?php echo $row['image'] ?>') no-repeat 0px 0px;">
                                        <div class="item1">
                                            <h3><?php echo $row['namearticle']; ?></h3> </div>
                                        <div class="p-mask">
                                            <h4><?php echo $row['namearticle']; ?></h4>
                                            <?php
                                                echo "<p>" .$rutgon. "...</p>
                                            <div class='more-slide'>
                                                <a href='article.php?idtopic={$row['idtopic']}&idarticle={$row['idarticle']}'>Xem thêm</a>
                                            </div>";
                                            ?>
                                        </div>
                                    </div>
                                </li>
                           <?php 
                        }
                        mysqli_close($con);
                        ?>
                        
                    </ul>
                </div>
<script type="text/javascript">
                        $(window).load(function() {
                            $("#flexiselDemo1").flexisel({
                                visibleItems: 4,
                                animationSpeed: 1000,
                                autoPlay: true,
                                autoPlaySpeed: 3000,
                                pauseOnHover: true,
                                enableResponsiveBreakpoints: true,
                                responsiveBreakpoints: {
                                    portrait: {
                                        changePoint: 480,
                                        visibleItems: 1
                                    },
                                    landscape: {
                                        changePoint: 640,
                                        visibleItems: 2
                                    },
                                    tablet: {
                                        changePoint: 768,
                                        visibleItems: 3
                                    }
                                }
                            });
                        });
                    </script>
                    
                <div class="midle_main_idclass">
                    <div class="products">
                        <div class="container_new container_child">
                            <div class="products-grids dm_tintuc_ds">
                            <div class="row">
                                <h4 style='font-size: 32px;color: #4a4a4a;margin: 0 auto 35px;text-align: center;text-transform: uppercase;font-weight: 500;'>KẾT QUẢ TÌM KIẾM</h4>
                                    <div class="product-one" style="box-shadow: 0 0 10px 5px #e0e0e0;"><br>
                                        <div ng-app="myApp">

                                    <!-- » -->
                                    
                                    <div ng-view></div>

                                        <div class="clearfix"> </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                
                    
                </div>
            </div> 
        </section>
    </article>
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
    <script src="tinymce/tinymce.min.js" type="text/javascript"></script>
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
    <script>
    var app = angular.module("myApp", ["ngRoute"]);
    app.config(function($routeProvider) {
        $routeProvider
        .when("/", {
            templateUrl : "orderdatepost.php"
        })
        .when("/orderview", {
            templateUrl : "orderview.php"
        })
        .when("/orderadmin", {
            templateUrl : "orderadmin.php"
        });
    });
    </script>
        
</body>




