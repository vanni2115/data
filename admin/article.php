<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
        <!-- <meta http-equiv="refresh" content="5400" />  -->
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
        <!-- title -->                            
        <?php
            include("control/configure.php");

            $sql="SELECT * FROM article WHERE idarticle = '{$_GET['idarticle']}'";
            $result = mysqli_query($con, $sql);
            while($row=mysqli_fetch_array($result)){
                echo "<title>".$row['namearticle']."</title>";
            }
            mysqli_close($con);
        ?>
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
        ?>

        <?php 
            include("login.php");
        ?>

        <?php 
            include("register.php");
        ?>

		<article>
			<section class="content gallery pad1">
  				<div class="midle_main_idclass fix1200_cus1">
					<div class="products">
					  <div class="container_new container_child">
					    <div class="products-grids dm_tintuc_ds">
					      <div class="row">
					        <div class="col-md-9 products-grid-left">
						        <div class="product-one">
                                    <div id='noti-action'></div>
                                    <!--Bài viết-->
                                    <?php
                                    include("control/configure.php");
                                    include("simple_html_dom.php");
                                    // xu ly cat chuoi toan ven
                                    function words($str,$num)
                                    {
                                        $limit = $num - 1 ;
                                        $str_tmp = '';
                                         $str = str_replace(']]>', ']]&gt;', $str);
                                         $str = strip_tags($str);
                                        $arrstr = explode(" ", $str);
                                        if ( count($arrstr) <= $num ) { return $str; }
                                        if (!empty($arrstr))
                                        {
                                            for ( $j=0; $j< count($arrstr) ; $j++)    
                                            {
                                                $str_tmp .= " " . $arrstr[$j];
                                                if ($j == $limit) 
                                                {
                                                    break;
                                                }
                                            }
                                        }
                                        return $str_tmp."...";
                                    }
                                    $sql_check = "SELECT state FROM article WHERE idarticle='{$_GET['idarticle']}' AND (state='0')";
                                    $result_check = mysqli_query($con, $sql_check);
                                    while($row_check=mysqli_fetch_array($result_check)){
                                            echo "Bài đăng này chưa được <b>người quản trị</b> phê duyệt.";
                                    }
                                    $sql = "SELECT * FROM article, user, topic WHERE ((article.iduser = user.iduser) AND (article.idtopic = topic.idtopic) AND (idarticle='{$_GET['idarticle']}') AND (article.state='1'))";
                                    $result = mysqli_query($con, $sql);
                                    while($row=mysqli_fetch_array($result)){
                                        
                                        echo "<h3 style='color:black;'>".$row['namearticle']."</h3>
                                        <div class='btn-group' style='margin-right:20px;'>
                                            <a href='topic.php?idtopic={$row['idtopic']}' style='color:black;'><span class='glyphicon glyphicon-stop' style='color:{$row['color']};'></span> {$row['nametopic']}</a>
                                        </div>
                                        <div class='row'>
                                        <a class='col-md-2' href='#'>
                                        <img class='img-circle img-responsive' src='upload/{$row['avatar']}' style='width:100px;height:100px;margin:30px 0;' alt='/'></a>
                                                
                                        <div class='col-md-10'>
                                        <h4 class='media-heading' style='padding-bottom:15px;margin:30px 0;'>
                                        <a href='profile.php?iduser={$row['iduser']}' style='color:black;'>".$row['fullname']."</a> 
                                        <a href='profile.php?iduser={$row['iduser']}' class='name-art-me'>".$row['username']."</a>
                                        <div class='date-art-me'>".$row['datepost']."</div></h4>
                                                    
                                        <p>".$row['content']."</p></div></div>";
                                        // xu ly binh luan
                                        if (isset($_REQUEST['contentComment'])&&isset($_REQUEST['btnComment'])) {
                                            $content=$_REQUEST['contentComment'];
                                            $iduser=$_SESSION['iduser'];
                                            $idarticle=$_GET['idarticle'];
                                            $small = $content;
                                            $html = str_get_html($small)->plaintext;
                                            $rutgon = words($html, 10);
                                            $countfilter = 0;
                                            // $filter = 0;
                                            $content_noti = "Hoạt động bình luận trong <a href='article.php?idtopic=".$_GET['idtopic']."&idarticle=".$_GET['idarticle']."' style='color:black;'>".$row['namearticle']."</a>";
                                            // lay danh sach cac tu bi han che trong bang filterword
                                            $sql_filter = "SELECT word FROM filterword";
                                            $result_filter = mysqli_query($con, $sql_filter);
                                            // danh sach ket qua
                                            while($row_filter=mysqli_fetch_array($result_filter)){
                                                $str_filter = $row_filter['word'];
                                            // kiem tra noi dung cmt co chua tu bi han che khong
                                                $check_word = strpos($html, $str_filter);
                                                // neu ton tai tu han thi tang bien dem len 1
                                                if ($check_word !== false) {
                                                    $countfilter++;
                                                }
                                            }
                                            // neu bien dem tu han che khac 0 thi noi dung cmt khong hop le
                                            if ($countfilter !== 0) {
                                                ?>
                                            <script type="text/javascript">
                                                document.getElementById("noti-action").innerHTML = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Nội dung bình luận chứa từ ngữ bị hạn chế. Bình luận không thành công!</div>";
                                            </script>
                                            <?php
                                            // noi dung cmt hop le thi thuc hien tiep
                                              } else {
                                                // insert cmt vao db
                                                $sql2="INSERT INTO comment(iduser,idarticle,contentcomment) VALUES ('{$iduser}','{$idarticle}','{$content}')";
                                                // insert thanh cong thi thuc hien tiep
                                                if(mysqli_query($con,$sql2)) {
                                                    // insert noti vao db
                                                    $sql3="INSERT INTO noti(iduser,idarticle,content,action) VALUES ('{$iduser}','{$idarticle}','{$rutgon}','" . mysql_real_escape_string($content_noti) ."')";
                                                    mysqli_query($con,$sql3);
                                                    // lay du lieu cmt tu db
                                                    $sql4="SELECT countcomment FROM article WHERE idarticle = '{$_GET['idarticle']}'";
                                                    $result4 = mysqli_query($con, $sql4);
                                                    $j = 0;
                                                    // lay xong thi thuc hien
                                                    while($row4=mysqli_fetch_array($result4)){
                                                        // tang so countcmt len 1
                                                        $j=$row4['countcomment']+1;
                                                    }
                                                    // insert countcmt vao db
                                                    $sql5="UPDATE article SET countcomment = $j, datepost = datepost, countview = countview WHERE idarticle = '{$_GET['idarticle']}'";
                                                    mysqli_query($con, $sql5);
                                                ?>
                                                    <script type="text/javascript">
                                                        document.getElementById("noti-action").innerHTML = "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Đã bình luận thành công.</div>";
                                                    </script>
                                                    <?php
                                                
                                                }else {
                                                    ?>
                                                    <script type="text/javascript">
                                                        document.getElementById("noti-action").innerHTML = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Bình luận không thành công.</div>";
                                                    </script>
                                                    <?php
                                                }
                                            }
                                        }
                                    }
                                    
                                    
                                    // mysqli_close($con);
                                    ?>
                                    <hr style="border-bottom:dashed 1px #d2d2d2;margin:10px 0;">

                                    <!-- Binh luan -->
                                    <?php
                                    // include("control/configure.php");
                                    $sql1 = "SELECT * FROM comment, user WHERE ((comment.iduser = user.iduser) AND (idarticle='{$_GET['idarticle']}'))";
                                    $result1 = mysqli_query($con, $sql1);
                                    while($row1=mysqli_fetch_array($result1)){
                                        echo "<div class='row'>";
                                        echo "<a class='col-md-2'>";
                                        echo "<img class='img-circle img-responsive' src='upload/{$row1['avatar']}' style='width:100px;height:100px;margin:30px 0;' alt='/'></a>";
                                        echo "<div class='col-md-10'>";
                                        echo "<h4 class='media-heading' style='padding-bottom:15px;margin-top:30px;'>";
                                        echo "<a href='profile.php?iduser={$row1['iduser']}' style='color:black;'>".$row1['fullname']."</a> ";
                                        echo "<a href='profile.php?iduser={$row1['iduser']}' class='name-art-me'>".$row1['username']."</a>";
                                        echo "<div class='date-art-me'>".$row1['datecomment']."";

                                        

                                        echo "</div></h4>";
                                        if (isset($_SESSION['username']))  {
                                            if ($row1['iduser']==$_SESSION['iduser']) {
                                                echo "<div class='row'><div class='col-md-1 col-md-offset-11' style='float:right;'><a href='delete-comment.php?idcomment={$row1['idcomment']}' name='btnDel' value='del' class='trash' title='Xóa bình luận của bạn'><span class='glyphicon glyphicon-trash' style='color:rgb(209, 91, 71)'></span></a></div></div>";
                                            } else {
                                                echo "<div class='row'><div class='col-md-1 col-md-offset-11' style='float:right;'><a href='report.php?idcomment={$row1['idcomment']}' name='btnReport' value='report' class='trash' title='Báo cáo vi phạm'><span class='glyphicon glyphicon-exclamation-sign' style='color:rgb(209, 91, 71)'></span></a></div></div>";
                                                
                                            }
                                        }
                                        
                                                    
                                        echo "<p>".$row1['contentcomment']."</p></div></div>";
                                        echo "<hr style='border-bottom:dashed 1px #d2d2d2;margin:10px 0;'>";
                                    }
                                    // mysqli_close($con);
                                    ?>


									<div class="row">
										<div class="col-md-10 col-md-offset-2">

                                            <?php
                                                //tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
                                                if (isset($_SESSION['username'])) {
                                            ?>
											<h4 class="media-heading" style="padding-bottom:15px;">
												<a style='color:black;'>Bình luận</a>
											</h4>
                                            <form id="change" name="comment" action="article.php?idtopic=<?php echo $_GET['idtopic'] ?>&idarticle=<?php echo $_GET['idarticle'] ?>" method="POST" onSubmit="javascript:return check_comment();">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="contentComment" id="textarea_full" style="width:100%;"> </textarea>
                                                </div>
                                                <button type="submit" class="btn btn-pop center-block" value="postcomment" name="btnComment" id="btnComment"><b>Bình luận</b></button>
                                            </form>
                                            <?php
                                                }else{
                                                    echo "<a href='' class='media-heading' data-toggle='modal' data-target='#myModal-log' data-dismiss='modal' style='color:#d5963a;'><h4><u>Đăng nhập để bình luận</u></h4></a>";
                                                }
                                            ?>
										</div>
									</div>

                                    <!-- xu ly insert vao bang comment, noti -->
                                    <?php
                                        // include( "control/configure.php");
                                        
                                        mysqli_close($con);
                                    ?>

						        </div>
					        </div>
					        <div class="col-md-3 products-grid-right animated wow fadeInLeft animated" data-wow-duration="1000ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 500ms; animation-name: fadeInLeft;">
                                <div class="product">
                                    <div class="dv_content_leftsp">
                                        <h3>Bài viết xem nhiều</h3>
                                        <ul class="dv_list_dmsp">
                                            <!-- Bai viet xem nhieu -->
                                            <?php
                                                include( "control/configure.php");
                                                $sql="SELECT * FROM article WHERE (idarticle != '{$_GET['idarticle']}') ORDER BY countview DESC LIMIT 4";
                                                $sql1="SELECT * FROM article WHERE (idarticle != '{$_GET['idarticle']}') ORDER BY countview DESC LIMIT 4,1";
                                                $result=mysqli_query($con, $sql);
                                                $result1=mysqli_query($con, $sql1);
                                                while($row=mysqli_fetch_array($result)){
                                                    echo "<li><a href='article.php?idtopic={$row['idtopic']}&idarticle={$row['idarticle']}' style='border-bottom:1px dotted #c5c5c5;'>".$row['namearticle']. "</a></li>";
                                                }
                                                while($row1=mysqli_fetch_array($result1)){
                                                echo "<li><a href='article.php?idtopic={$row1['idtopic']}&idarticle={$row1['idarticle']}'>".$row1['namearticle']. "</a></li>";
                                                }
                                                mysqli_close($con);
                                            ?>
                                        </ul>
                                    </div>

                                    <!-- $num_rows = mysql_num_rows($result); echo “Có $num_rows bản ghi được tìm thấy\n”; -->

                                    <div class="dv_content_leftsp">
                                        <h3>BÀI VIẾT LIÊN QUAN</h3>
                                        <ul class="dv_list_dmsp">
                                        <!-- Bai viet lien quan -->
                                            <?php
                                                include( "control/configure.php");
                                                $sql="SELECT * FROM article WHERE ((idarticle != '{$_GET['idarticle']}') AND (idtopic = '{$_GET['idtopic']}')) ORDER BY countview DESC LIMIT 3";
                                                $sql1="SELECT * FROM article WHERE ((idarticle != '{$_GET['idarticle']}') AND (idtopic = '{$_GET['idtopic']}')) ORDER BY countview DESC LIMIT 3,1";
                                                $result=mysqli_query($con, $sql);
                                                $result1=mysqli_query($con, $sql1);
                                                while($row=mysqli_fetch_array($result)){
                                                    echo "<li><a href='article.php?idtopic={$row['idtopic']}&idarticle={$row['idarticle']}' style='border-bottom:1px dotted #c5c5c5;'>".$row['namearticle']. "</a></li>";
                                                }
                                                while($row1=mysqli_fetch_array($result1)){
                                                echo "<li><a href='article.php?idtopic={$row1['idtopic']}&idarticle={$row1['idarticle']}'>".$row1['namearticle']. "</a></li>";
                                                }
                                                mysqli_close($con);
                                            ?>
                                        </ul>
                                        <!-- <script type="text/javascript" src="/templates/300-up-111/js/jquery.marquee.min.js"></script>
                                        <script>
                                            $('.marqueew').marquee({
                                                duration: 19000,
                                                gap: 0,
                                                delayBeforeStart: 0,
                                                direction: 'up',
                                                duplicated: true,
                                                pauseOnHover: true,
                                                startVisible: true
                                            });
                                        </script> -->
                                    </div>
                                    

                                    <div class="dv_content_leftsp">
                                        <h3>BÀI VIẾT MỚI</h3>
                                        <ul class="dv_list_dmsp">
                                            <!-- Bai viet lien quan -->
                                            <?php
                                                include( "control/configure.php");
                                                $sql="SELECT * FROM article WHERE (idarticle != '{$_GET['idarticle']}') ORDER BY datepost DESC LIMIT 4";
                                                $sql1="SELECT * FROM article WHERE (idarticle != '{$_GET['idarticle']}') ORDER BY datepost DESC LIMIT 4,1";
                                                $result=mysqli_query($con, $sql);
                                                $result1=mysqli_query($con, $sql1);
                                                while($row=mysqli_fetch_array($result)){
                                                    echo "<li><a href='article.php?idtopic={$row['idtopic']}&idarticle={$row['idarticle']}' style='border-bottom:1px dotted #c5c5c5;'>".$row['namearticle']. "</a></li>";
                                                }
                                                while($row1=mysqli_fetch_array($result1)){
                                                echo "<li><a href='article.php?idtopic={$row1['idtopic']}&idarticle={$row1['idarticle']}'>".$row1['namearticle']. "</a></li>";
                                                }
                                                mysqli_close($con);
                                            ?>
                                        </ul>
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

	        <?php
            include("control/configure.php");

            $sql="SELECT countview FROM article WHERE idarticle = '{$_GET['idarticle']}'";
            $result = mysqli_query($con, $sql);
            $i = 0;
            while($row=mysqli_fetch_array($result)){
                $i=$row['countview']+1;
            }
            $sql1="UPDATE article SET countview = $i, datepost = datepost WHERE idarticle = '{$_GET['idarticle']}' AND state = 1";
            mysqli_query($con, $sql1);
            mysqli_close($con);
        ?>	
</body>
