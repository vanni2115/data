<!-- <script>
  // Ham FB.getLoginStatus() tra ve ket qua.
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);

    // obj phan hoi voi truong status de cho biet trang thai login cua user
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else {
      // The person is not logged into your app or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

 window.fbAsyncInit = function() {
    FB.init({
      appId      : '137484120122691',
      cookie     : true,  // cho phep sd cookies de thuc hien 
      xfbml      : true, // cho phep phan tich cu phap plugin
      version    : 'v2.9'
    });
   // FB.AppEvents.logPageView();
   FB.getLoginStatus(function(response){
    if (response.status === 'connected') {
            document.getElementById('status').innerHTML = "we are connected";
        } else if (response.status === 'not_authorized') {
            document.getElementById('status').innerHTML = "We are not logged in";
        } else {
            document.getElementById('status').innerHTML = "we are not logged into facebook";
        }
   }); 
  };

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously


(function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

function login() {
    FB.login(function(response){
        if (response.status === 'connected') {
            document.getElementById('status').innerHTML = "we are connected";
        } else if (response.status === 'not_authorized') {
            document.getElementById('status').innerHTML = "We are not logged in";
        } else {
            document.getElementById('status').innerHTML = "we are not logged into facebook";
        }
    }, {scrope: 'email'});
};
// get info user
function getInfo() {
    FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id,picture.width(150).height(150)'}, function(response) {
        document.getElementById('status').innerHTML = response.id;
        document.getElementById('status').innerHTML = console.log(response);
        document.getElementById('status').innerHTML = response.picture.data.url;
    });
};

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
</script> -->

<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->

<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>

<div id="status"></div>

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

        <title>Từ điển cá nhân</title>

        <link rel="shortcut icon" type="image/x-icon" href=""/> <!--icon-->

        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="dist/css/style.css" type="text/css" rel="stylesheet" />
        <link href="dist/css/style-pop.css" rel="stylesheet" type="text/css">
        <link href="dist/css/animate.min.css" rel="stylesheet" type="text/css">

        <!-- DataTables CSS -->
        <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

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
        ?>

        <div class="container" style="z-index:1 !important;">
	        <div class="content-set panel panel-default">
			    <ul id="myTab" class="nav nav-tabs" role="tablist">
			      <li class="active"><a href="#add" class="title-set" role="tab" data-toggle="tab">Thêm mới</a></li>
                  <li class="" id="saveScr"><a href="#saved" class="title-set" role="tab" data-toggle="tab">Danh sách</a></li>
			    </ul>
			    <div id="myTabContent" class="tab-content">
			      <!-- Tab them -->
                  <div class="tab-pane fade active in" id="add">
                  <div id='noti-action'></div>
                    <div class="row" style="margin-top:30px;">
                        <div class="col-md-10 col-md-push-1">
                            <form id="change" name="change" method="POST" onSubmit="javascript:return validate();">
                                <div class="form-group row">
                                    <label for="mark" class="col-md-3 control-label">Đánh dấu mới</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="mark" id="mark" onblur="return check_mark()";>
                                        <div id="mark_response" style="display:none;"></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="type-word" class="col-md-3 control-label">Loại từ</label>
                                    <div class="col-md-4">
                                        <select id="type-word" class="form-control" name="type-word" size="1">
                                            <option value="">--Chọn loại từ--</option>
                                            <option value="None">None</option>
                                            <option value="Danh từ">Danh từ (Noun)</option>
                                            <option value="Đại từ">Đại từ (Pronoun)</option>
                                            <option value="Động từ">Động từ (Verb)</option>
                                            <option value="Giới từ">Giới từ (Preposition)</option>
                                            <option value="Liên từ">Liên từ (Conjunction)</option>
                                            <option value="Phó từ">Phó từ</option>
                                            <option value="Thán từ">Thán từ (Interjection)</option>
                                            <option value="Tân ngữ">Tân ngữ</option>
                                            <option value="Tính từ">Tính từ (Adjective) </option>
                                            <option value="Trạng từ">Trạng từ (Adverb)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5" style="padding-top:5px;">
                                        <i>Không phải từ loại chọn 'none'.</i>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="mean" class="col-md-3 control-label">Nghĩa (nếu là từ vựng)</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="mean" id="mean" onblur="return check_mark()";>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="note" class="col-md-3 control-label">Ghi chú</label>
                                    <div class="col-md-9">
                                        <textarea name="note" id="textarea_full" style="width:100%;">Cách sử dụng, lưu ý, các từ đồng nghĩa, trái nghĩa...</textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-pop center-block" value="btnAdd" name="btnAdd" id="btnAdd"><b>Thêm</b></button>
                            </form>
                            <!-- mark type-word mean note -->
                            <?php
                                include( "control/configure.php");
                                if (isset($_REQUEST['btnAdd'])&&isset($_REQUEST['mark'])) {
                                    $mark=$_REQUEST['mark'];
                                    $type=$_REQUEST['type-word'];
                                    $mean=$_REQUEST['mean'];
                                    $note=$_REQUEST['note'];
                                    $iduser=$_SESSION['iduser'];
                                    $sql_check = "SELECT header FROM dictionary WHERE header='{$mark}'";
                                    $result_check = mysqli_query($con,$sql_check);
                                    $num_rows = mysqli_num_rows($result_check);
                                    if ($num_rows!= 0) {
                                        ?>
                                            <script type="text/javascript">
                                                document.getElementById("noti-action").innerHTML = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Thêm từ điển mới không thành công. Từ điển này đã tồn tại.</div>";
                                            </script>
                                        <?php
                                    }else{
                                        $sql = "INSERT INTO dictionary(header,type,mean,content,iduser)
                                                SELECT * FROM (SELECT '{$mark}','{$type}','{$mean}','{$note}','{$iduser}') AS tmp
                                                WHERE NOT EXISTS (
                                                    SELECT header FROM dictionary WHERE header='{$mark}'
                                                ) LIMIT 1;";
                                        if(mysqli_query($con,$sql)) {
                                            ?>
                                            <script type="text/javascript">
                                                document.getElementById("noti-action").innerHTML = "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Thêm từ điển mới thành công.</div>";
                                            </script>
                                            <?php
                                        }else {
                                            ?>
                                            <script type="text/javascript">
                                                document.getElementById("noti-action").innerHTML = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Thêm từ điển mới không thành công.</div>";
                                            </script>
                                            <?php
                                        }
                                    }
                                }
                                mysqli_close($con);
                            ?>
                        </div>
                    </div>
                  </div>


                <!-- Tab danh sach -->
                  <div class="tab-pane fade" id="saved">
                  <div class="row" style="margin-top:30px;">
                  <div class="">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list"></span> Danh sách các ghi chú
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="mytable">
                        <thead>
                            <tr>
                                <th>Tên từ điển</th>
                                <th>Nghĩa</th>
                                <th>Tùy chỉnh</th>
                                <!-- <th>Engine version</th>
                                <th>CSS grade</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include("control/configure.php");
                                $sql = "SELECT * FROM dictionary WHERE iduser = '{$_SESSION['iduser']}'";
                                $result = mysqli_query($con, $sql);
                                $num_rows = mysqli_num_rows($result);
                                while($row=mysqli_fetch_array($result)){
                                echo "<tr class='odd gradeX'>
                                        <td>".$row['header']."</td>
                                        <td>".$row['mean']."</td>
                                        <td>
                                            <div class='pull-right action-buttons'>
                                                <a href='edit-dictionary.php?iddictionary={$row['iddictionary']}' name='btnChange' value='change'><span class='glyphicon glyphicon-pencil'></span></a>
                                                <a href='delete-dictionary.php?iddictionary={$row['iddictionary']}' name='btnDel' value='del' class='trash'><span class='glyphicon glyphicon-trash' style='color:rgb(209, 91, 71)'></span></a>
                                            </div>
                                        </td>
                                    </tr>";
                                }
                                mysqli_close($con);
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
                </div>
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

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/style.js"></script>
    <script src="dist/js/mytable.js"></script>
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