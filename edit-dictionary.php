<?php
session_start();
    if(empty($_SESSION['username'])) {
        header("location:./");
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

        <title>Chỉnh sửa từ điển cá nhân</title>

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
                  <li class="active" id="editScr"><a class="title-set" role="tab" data-toggle="tab">Chỉnh sửa</a></li>
			    </ul>
			    <div id="myTabContent" class="tab-content">
			      <!-- Tab add -->
			      

                  <!-- Tab chinh sua -->
                  <div class="tab-pane fade active in">
                    <div id='noti-action'></div>
                      <!-- hien noi dung ghi chu chinh sua-->
                        <?php
                        include("control/configure.php");
                        $sql = "SELECT * FROM dictionary WHERE (iddictionary = '{$_GET['iddictionary']}') AND iduser = '{$_SESSION['iduser']}'";
                        $result = mysqli_query($con, $sql);
                        while($row=mysqli_fetch_array($result)){
                            echo "<div id='noti-action'></div><div class='row' style='margin-top:30px;'>
                        <div class='col-md-10 col-md-push-1'>
                            <form id='change' name='change' method='POST' onSubmit='javascript:return validate();'>
                                <div class='form-group row'>
                                    <label for='mark' class='col-md-3 control-label'>Tên đánh dấu</label>
                                    <div class='col-md-9'>
                                        <input class='form-control' type='text' value='{$row['header']}' name='mark' id='mark' onblur='return check_mark()';>
                                        <div id='mark_response' style='display:none;'></div>
                                    </div>
                                </div>

                                <div class='form-group row'>
                                    <label for='type-word' class='col-md-3 control-label'>Loại từ</label>
                                    <div class='col-md-4'>
                                        <select id='type-word' class='form-control' name='type-word' size='1'>
                                            <option value=''>--Chọn loại từ--</option>
                                            <option value='None'>None</option>
                                            <option value='Danh từ'>Danh từ (Noun)</option>
                                            <option value='Đại từ'>Đại từ (Pronoun)</option>
                                            <option value='Động từ'>Động từ (Verb)</option>
                                            <option value='Giới từ'>Giới từ (Preposition)</option>
                                            <option value='Liên từ'>Liên từ (Conjunction)</option>
                                            <option value='Phó từ'>Phó từ</option>
                                            <option value='Thán từ'>Thán từ (Interjection)</option>
                                            <option value='Tân ngữ'>Tân ngữ</option>
                                            <option value='Tính từ'>Tính từ (Adjective) </option>
                                            <option value='Trạng từ'>Trạng từ (Adverb)</option>
                                        </select>
                                    </div>
                                    <div class='col-md-5' style='padding-top:5px;'>
                                        <i>Không phải từ loại chọn 'none'.</i>
                                    </div>
                                </div>

                                <div class='form-group row'>
                                    <label for='mean' class='col-md-3 control-label'>Nghĩa (nếu là từ vựng)</label>
                                    <div class='col-md-9'>
                                        <input class='form-control' value='{$row['mean']}' type='text' name='mean' id='mean' onblur='return check_mark()';>
                                    </div>
                                </div>

                                <div class='form-group row'>
                                    <label for='note' class='col-md-3 control-label'>Ghi chú</label>
                                    <div class='col-md-9'>
                                        <textarea class='form-control pre-scrollable' name='note' id='note' style='resize:none;height:95px;'>{$row['content']}</textarea>
                                    </div>
                                </div>

                                <button type='submit' class='btn btn-pop center-block' value='btnEdit' name='btnEdit' id='btnEdit'><b>Sửa</b></button>
                            </form>";
                            }
                             mysqli_close($con);
                        ?>
                        <!-- mark type-word mean note -->
                <?php
                //Tạo kết nối đến CSDL
                include('control/configure.php');
                //Truy vấn đến CSDL
                if(isset($_REQUEST['mark'])&&isset($_REQUEST['note'])&&isset($_REQUEST['btnEdit'])) {
                    if($_REQUEST['mark']!=""){
                        $mark=$_REQUEST['mark'];
                        $type=$_REQUEST['type-word'];
                        $mean=$_REQUEST['mean'];
                        $note=$_REQUEST['note'];
                        $sql_check = "SELECT header FROM dictionary WHERE header='{$mark}'";
                        $result_check = mysqli_query($con,$sql_check);
                        $num_rows = mysqli_num_rows($result_check);
                        if ($num_rows!= 0) {
                            ?>
                                <script type="text/javascript">
                                    document.getElementById("noti-action").innerHTML = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Sửa từ điển không thành công. Từ điển này đã tồn tại.</div>";
                                </script>
                            <?php
                        }else{
                            $sql="UPDATE dictionary SET header='{$_REQUEST['mark']}', type='{$_REQUEST['type-word']}', mean='{$_REQUEST['mean']}', content='{$_REQUEST['note']}', iduser='{$_SESSION['iduser']}' WHERE iddictionary = '{$_GET['iddictionary']}'";
                                if(mysqli_query($con,$sql)) {
                                ?>
                                    <script type="text/javascript">
                                        document.getElementById("noti-action").innerHTML = "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Sửa từ điển thành công.</div>";
                                    </script>
                                <?php
                                }else {
                                ?>
                                    <script type="text/javascript">
                                        document.getElementById("noti-action").innerHTML = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Sửa từ điển không thành công.</div>";
                                    </script>
                                <?php
                            }
                        }
                    }else {
                        ?>
                            <script type="text/javascript">
                                document.getElementById("noti-action").innerHTML = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Không để trống thông tin.</div>";
                            </script>
                        <?php
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