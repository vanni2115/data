<?php
session_start();
if(empty($_SESSION['username'])) {
    header("location:login-noti.php");
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- <meta http-equiv="refresh" content="5400" /> -->
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

        <title>Làm bài tập</title>

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
                <div class="midle_main_idclass fix1200_cus1">
                            <div class="products">
                                <div class="container_new container_child">
                                    <div class="products-grids dm_tintuc_ds">
                                        <div class="row">
                                        <h4 style='font-size: 32px;color: #4a4a4a;margin: 0 auto 35px;text-align: center;text-transform: uppercase;font-weight: 500;'>Bài tập mức độ dễ</h4>
                                            <!-- » -->
                                            <div class="product-one" style="box-shadow: 0 0 10px 5px #e0e0e0;margin:auto 50px;"><br>
                                            <?php
                                                include("control/configure.php");
                                                
                                                if (empty($_POST["submit"])) {
                                                    $i=0;
                                                    $sql11 = "SET @idquestion = FLOOR(RAND( )* 40) + 1";
                                                    mysqli_query($con, $sql11);
                                                    $sql = "SELECT * FROM question WHERE idquestion >= @idquestion LIMIT 40";
                                                    // $sql = "SELECT * FROM question WHERE (idexam = '{$_GET['idexam']}') ORDER BY RAND() LIMIT 40";
                                                    $result = mysqli_query($con, $sql);
                                                    ?>
                                                    <form method="POST" action="" >
                                                    <?php
                                                    while($row = mysqli_fetch_array($result)){
                                                        $i++;
                                                        $daa = $row['daa'];
                                                        $dab = $row['dab'];
                                                        $dac = $row['dac'];
                                                        $dad = $row['dad'];
                                                        $idquestion = $row['idquestion'];
                                                        $content = $row['content'];
                                                        $correct = $row['correct'];
                                                        echo "
                                                        <div class='form-group' style='margin-left:80px;'>
                                                        <label>Câu " . $i . ". " . $row['content']."</label><br>";
                                                        echo "<input type='radio' name='cau$i' value='$daa'>$daa<br>"; // Các lựa chọn sẽ có cùng tên là cau$i
                                                        echo "<input type='radio' name='cau$i' value='$dab'>$dab<br>";
                                                        // echo $cau$i;
                                                        echo "<input type='radio' name='cau$i' value='$dac'>$dac<br>";
                                                        echo "<input type='radio' name='cau$i' value='$dad'>$dad<br>";
                                                        echo "<input type='hidden' name='idquestion$i' value='$idquestion'><br></div>"; // Cái này cho bíêt câu trả lời cho câu nào
                                                    }
                                                // <!-- <div class="clearfix"> </div> -->
                                                   echo "<input type='hidden' name='socau' value='$i'>
                                                    <button type='submit' class='btn btn-pop center-block' value='HoanThanh' name='submit'><b>Chấm điểm</b></button><br>
                                                </form>";
                                                }
                                                mysqli_close($con);
                                            ?>
                                                        
                                                <?php
                                                    include("control/configure.php");
                                                    if (isset($_POST["submit"])) {
                                                        $socau = $_REQUEST['socau'];
                                                        $dung = 0;
                                                        $j=0;
                                                        $i=0;
                                                        $x=0;
                                                        $z=0;
                                                        // dem so cau dung
                                                        for ($k = 0 ;$k < $socau; $k++) {
                                                            $j++;
                                                            $idquestion= $_REQUEST["idquestion$j"];
                                                            if(!isset($_POST["cau$j"])){
                                                                // echo "<h5 align='center'>Câu $j: chưa trả lời.</h5>";
                                                                continue;
                                                            }
                                                            $traloi = $_POST["cau$j"];
                                                            
                                                            $sql = "SELECT * FROM question WHERE ((idquestion='$idquestion') AND (correct='$traloi'))";
                                                            $result = mysqli_query($con, $sql);
                                                            $total = mysqli_num_rows($result);
                                                            if ($total >0){ $dung++; }
                                                        }
                                                        // Tính ra diểm cho số câu đúng
                                                        $score = ($dung/$socau)*10;
                                                        // sau đó phân loại cơ bản
                                                        if ($score == 10) $row= "Tuyệt Vời. Hoàn Hảo 100%";
                                                            elseif ($score >= 5 && $score <= 8) $row = " Không Tệ Lắm, Rất Tốt";
                                                            elseif ($score > 8) $row= " Tuyệt lắm";
                                                            elseif ($score < 5) $row = " Cần luyện tập thêm nhiều"; 
                                                        Echo "<h2 align='center'> <font size=5 color=#ff0000 >Kết Quả: $row</h2></font><p align='center'><font size=4 color=#33cc00>Số câu đúng Là $dung / $socau . Đạt $score điểm</font></p>"; // Xuất kết quả ra.
                                                        // Lưu kết quả vào db
                                                        $sql1 = "INSERT INTO result(iduser,score,idexam) VALUES ('{$_SESSION['iduser']}','{$score}','{$_GET['idexam']}')";
                                                        mysqli_query($con, $sql1);
                                                        // hien thi cau hoi co dap an
                                                        for ($k = 0 ;$k < 40; $k++) {
                                                            $x++;
                                                            $idquestion= $_REQUEST["idquestion$x"];
                                                            $sql1 = "SELECT * FROM question WHERE (idquestion='$idquestion')";
                                                            $result1 = mysqli_query($con, $sql1);
                                                            while($row1 = mysqli_fetch_array($result1)){
                                                                $i++;
                                                                $daa = $row1['daa'];
                                                                $dab = $row1['dab'];
                                                                $dac = $row1['dac'];
                                                                $dad = $row1['dad'];
                                                                $idquestion1 = $row1['idquestion'];
                                                                $content1 = $row1['content'];
                                                                $correct1 = $row1['correct'];
                                                                echo "
                                                                <div class='form-group' style='margin-left:80px;'>
                                                                <label>Câu " . $i . ". " . $row1['content']."</label><br>";
                                                                echo "<input type='radio' name='cau$i' value='$daa'> $daa<br>"; // Các lựa chọn sẽ có cùng tên là cau$i
                                                                echo "<input type='radio' name='cau$i' value='$dab'> $dab<br>";
                                                                // echo $cau$i;
                                                                echo "<input type='radio' name='cau$i' value='$dac'> $dac<br>";
                                                                echo "<input type='radio' name='cau$i' value='$dad'> $dad<br>";
                                                                echo "<input type='hidden' name='idquestion$i' value='$idquestion1'><br>"; // Cái này cho bíêt câu trả lời cho câu nào
                                                                if(isset($_POST["cau$i"])){
                                                                    $traloi = $_POST["cau$i"];
                                                                    echo "Câu trả lời của bạn là: <b>".$traloi."</b>.<br>";
                                                                }
                                                                echo "<div class='col-md-11 alert alert-success alert-dismissable' style='font-size:16px;'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> Đáp án đúng: <b>" . $correct1 . "</b>.</div><br></div>";
                                                            }
                                                        }
                                                    }
                                                    mysqli_close($con);

                                                ?>
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

        
</body>




