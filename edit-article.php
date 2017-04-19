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

        <title>Quản lý bài đăng</title>

        <link rel="shortcut icon" type="image/x-icon" href=""/> <!--icon-->

        <link type="text/css" rel="stylesheet" href="css/dropdown.css" />
        <link type="text/css" rel="stylesheet" href="css/style.css" />
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="css/animate.min.css" rel="stylesheet" type="text/css">
        <link href="css/style-pop.css" rel="stylesheet" type="text/css">
        <!--css-->
        <link rel='stylesheet' id='gfont-style-css'  href='http://fonts.googleapis.com/css?family=Roboto%3A100%2C300%2C300italic%2C400%2C400italic%2C500%2C700%2C900%7CRoboto+Slab%3A300%2C400%2C700%7CArapey%3A400%2C400italic%7CLobster%7CCinzel%7CPoiret+One%3A400%7CJosefin+Sans%3A400%7CDomine%3A400&#038;ver=4.4.5' type='text/css' media='all' />
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

        <div class="container" style="z-index:1 !important;">
	        <div class="content-set panel panel-default">
			    <ul id="myTab" class="nav nav-tabs" role="tablist">
			      <li class="active" id="editScr"><a href="#edit" class="title-set" role="tab" data-toggle="tab">Chỉnh sửa</a></li>
			    </ul>
			    <div id="myTabContent" class="tab-content">
			      <!-- Tab add -->
			      

                  <!-- Tab chinh sua -->
                  <div class="tab-pane fade active in" id="edit">

                      <!-- hien noi dung bai viet chinh sua-->
                        <?php
                        include("control/configure.php");
                        $sql = "SELECT * FROM article, user WHERE ((article.iduser=user.iduser) AND (idarticle = '{$_GET['idarticle']}'))";
                        $result = mysqli_query($con, $sql);
                        while($row=mysqli_fetch_array($result)){
                            echo "<div class='row' style='margin-top:30px;'>
                        <div class='col-md-10 col-md-push-1'>
                            <form id='change1' name='edit-article' method='POST' onSubmit='javascript:return validate();'>
                                <div class='form-group row'>
                                    <label for='title-article' class='col-md-3 control-label'>Tên bài viết</label>
                                    <div class='col-md-9'>
                                        <input class='form-control' type='text' name='title-article' value='{$row['namearticle']}' id='title-article'>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label for='title-article' class='col-md-3 control-label'>Người tạo bài viết</label>
                                    <div class='col-md-9'>
                                    <a class='form-control' href='profile.php?iduser={$row['iduser']}'>".$row['fullname']."</a>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label for='state' class='col-md-3 control-label'>Trạng thái của bài viết</label>
                                    <div class='col-md-9'>
                                        <select class='form-control' name='state' id='state'>";
                                        if($row['article.state']='1'){
                                            echo "<option value=''>--Chọn trạng thái cho bài viết-- </option>
                                                <option value='1' selected>Hiển thị </option>
                                                <option value='0'>Lưu trữ </option>";
                                        }else{
                                            echo "<option value=''>--Chọn trạng thái cho bài viết-- </option>
                                                <option value='1'>Hiển thị </option>
                                                <option value='0' selected>Lưu trữ </option>";
                                        }

                                    echo "</select>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label for='topic' class='col-md-3 control-label'>Chủ đề của bài viết</label>
                                    <div class='col-md-9'>
                                        <select class='form-control' name='topic' id='topic'>
                                            <option value=''>--Chọn chủ đề cho bài viết-- </option>";
                                            $sql1 = "SELECT * FROM topic";
                                            $result1 = mysqli_query($con, $sql1);
                                            $num_rows1 = mysqli_num_rows($result1);
                                            while($row1=mysqli_fetch_array($result1)){
                                            echo "<option value='".$row1['idtopic']."'>".$row1['nametopic']." </option>";
                                            }
                                            echo "</select>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label for='about' class='col-md-3 control-label'>Nội dung bài viết mới</label>
                                    <div class='col-md-9'>
                                        <textarea name='content' id='textarea_full' style='width:100%;'>{$row['content']} </textarea>
                                        
                                    </div>
                                </div>
                                <button type='submit' class='btn btn-pop center-block' value='edit-article' name='btnEdit' id='btnEdit'><b>Sửa bài</b></button>
                            </form>";
                            }
                             mysqli_close($con);
                        ?>
                <?php
                //Tạo kết nối đến CSDL
                include('control/configure.php');
                //Truy vấn đến CSDL
                if(isset($_REQUEST['title-article'])&&isset($_REQUEST['topic'])&&isset($_REQUEST['content'])&&isset($_REQUEST['btnEdit'])) {
                    if($_REQUEST['title-article']!=""){
                        $title=$_REQUEST['title-article'];
                        $topic=$_REQUEST['topic'];
                        $state=$_REQUEST['state'];
                        $content=$_REQUEST['content'];
                        $sql="UPDATE article SET namearticle='{$_REQUEST['title-article']}', idtopic='{$_REQUEST['topic']}', state='{$_REQUEST['state']}', content='{$_REQUEST['content']}' WHERE idarticle = '{$_GET['idarticle']}'";
                            if(mysqli_query($con,$sql)) {
                                // header("Location:admin-post-article.php");
                                    //header('Refresh: 1; url=edit-article.php');
                                    ?>
                                    <script language="javascript">
                                        alert("Đã sửa thành công Bài viết");
                                        window.location.href = "post-article.php";
                                    </script>
                                    <?php
                                
                            }else {
                                echo "<br><p>Sửa không thành công:</p> " .mysqli_error($con);
                            }
                    }else {
                        echo "<br><p>Không để trống <b>tên bài viết</b>";
                    }
                }
                //Đóng kết nối đến server
                mysqli_close($con);
                
            ?>
                                
                        </div>
                    </div>
                   
                  </div>
			    </div>
	        </div>
        </div>
      <?php 
        include("footer.php");
    ?>
<!-- <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script> -->
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type='text/javascript' src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/style.js"></script>
<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
<script src="js/dropdown.js"></script>
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!--javascript-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
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