<?php
session_start();
    if(!($_SESSION['username']=="admin")) {
        header("location:../.././");
    }
?>
<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thêm thành viên</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <link type="text/css" rel="stylesheet" href="css/dropdown.css" />
    <link href="css/home_1489197295.min.css" rel="stylesheet" type="text/css">
    <link href="css/style-pop.css" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            
<?php
            include("header.php");
            ?>
            <!-- /.navbar-header -->

            
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!-- <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            /input-group
                        </li> -->
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Bài viết<span class="fa arrow"></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="article.php">Danh sách các bài viết</a>
                                </li>
                                <li>
                                    <a href="article-add.php">Thêm mới</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-tags fa-fw"></i> Chủ đề<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="topics.php">Danh sách các chủ đề</a>
                                </li>
                                <li>
                                    <a href="topic-add.php">Thêm mới</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Thành viên<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="account.php">Danh sách thành viên</a>
                                </li>
                                <li>
                                    <a href="acount-add.php">Thêm mới</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-comment fa-fw"></i> Bình luận<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="comment.php">Tất cả bình luận</a>
                                </li>
                                <li>
                                    <a href="comment-add.php">Thêm mới</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-question-circle   fa-fw"></i> Câu hỏi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="question.php">Tất cả câu hỏi</a>
                                </li>
                                <li>
                                    <a href="question-add.php">Thêm mới</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Dạng đề thi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="type-question.php">Tất cả dạng đề thi</a>
                                </li>
                                <li>
                                    <a href="type-question-add.php">Thêm mới</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-suitcase fa-fw"></i> Phân quyền<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="role.php">Danh sách các quyền</a>
                                </li>
                                <!-- <li>
                                    <a href="role-add.php">Thêm mới</a>
                                </li> -->
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thành viên</h1><div id='noti-action'></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thêm thành viên
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-10 col-md-push-1">
                                    <form id="change" name="regis" method="POST" onSubmit="javascript:return validate();">
                                        <div class="form-group row">
                                            <label for="fullname" class="col-md-3 control-label">Họ và tên</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="fullname2" id="fullname2">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="username" class="col-md-3 control-label">Tên đăng nhập</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="username2" id="username2">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-3 control-label">Mật khẩu</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="password" name="password2" id="password2">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="gioitinh" class="col-md-3 control-label">Giới tính</label>
                                            <div class="col-md-9">
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender" id="gender1" value="1" checked> Nam
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender" id="gender2" value="0"> Nữ
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="ngaysinh" class="col-md-3 control-label">Ngày sinh</label>
                                            <div class="col-md-9">
                                                  <input class="form-control" type="date" name="ngaysinh" id="ngaysinh" min="1950-01-01">
                                                  <!-- <span class="input-group-addon"><i class="fa fa-calendar fa-lg" aria-hidden="true"></i></span> -->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="radio-inline">
                                                      <input type="radio" name="ngaysinh-opt" id="ngaysinh1" value="congkhai" checked> Công khai
                                                    </label>
                                                    <label class="radio-inline">
                                                      <input type="radio" name="ngaysinh-opt" id="ngaysinh2" value="onlyme"> Chỉ mình tôi
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="state" class="col-md-3 control-label">Trạng thái</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="state" id="state">
                                                    <option value="">--Chọn trạng thái cho tài khoản-- </option>
                                                    <option value="1">Hoạt động </option>
                                                    <option value="0">Chưa kích hoạt </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="role" class="col-md-3 control-label">Phân quyền</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="role" id="role">
                                                    <option value="">--Chọn quyền-- </option>
                                                    <option value="1">Thành viên </option>
                                                    <option value="2">Quản trị viên </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="address" class="col-md-3 control-label">Địa chỉ</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="address" id="address" size="1">
                                                    <option value="">--Chọn tỉnh của bạn-- </option>
                                                    <option value="An Giang">An Giang </option>
                                                    <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu </option>
                                                    <option value="Bắc Cạn">Bắc Cạn </option>
                                                    <option value="Bắc Giang">Bắc Giang </option>
                                                    <option value="Bắc Ninh">Bắc Ninh </option>
                                                    <option value="Bạc Liêu">Bạc Liêu </option>
                                                    <option value="Bến Tre">Bến Tre </option>
                                                    <option value="Bình Dương">Bình Dương </option>
                                                    <option value="Bình Phước">Bình Phước </option>
                                                    <option value="Bình Thuận">Bình Thuận </option>
                                                    <option value="Bình Định">Bình Định </option>
                                                    <option value="Cao Bằng">Cao Bằng </option>
                                                    <option value="Cà Mau">Cà Mau </option>                                    
                                                    <option value="Cần Thơ">Cần Thơ </option>                                    
                                                    <option value="Gia Lai">Gia Lai </option>                                    
                                                    <option value="Hà Giang">Hà Giang </option>                                    
                                                    <option value="Hà Nam">Hà Nam </option>                                    
                                                    <option value="Hà Nội">Hà Nội </option>                                    
                                                    <option value="Hà Tĩnh">Hà Tĩnh </option>                                    
                                                    <option value="Hải Dương">Hải Dương </option>                                    
                                                    <option value="Hải Phòng">Hải Phòng </option>                                    
                                                    <option value="Hậu Giang">Hậu Giang </option>                                    
                                                    <option value="Hòa Bình">Hòa Bình </option>                                    
                                                    <option value="Hưng Yên">Hưng Yên </option>                                    
                                                    <option value="Khánh Hòa">Khánh Hòa </option>                                    
                                                    <option value="Kiên Giang">Kiên Giang </option>                                    
                                                    <option value="Kon Tum">Kon Tum </option>                                    
                                                    <option value="Lai Châu">Lai Châu </option>                                    
                                                    <option value="Lâm Đồng">Lâm Đồng </option>                                    
                                                    <option value="Lào Cai">Lào Cai </option>                                    
                                                    <option value="Lạng Sơn">Lạng Sơn </option>                                    
                                                    <option value="Long An">Long An </option>                                    
                                                    <option value="Nam Định">Nam Định </option>                                    
                                                    <option value="Nghệ An">Nghệ An </option>                                    
                                                    <option value="Ninh Bình">Ninh Bình </option>                                    
                                                    <option value="Ninh Thuận">Ninh Thuận </option>                                    
                                                    <option value="Phú Thọ">Phú Thọ </option>                                    
                                                    <option value="Phú Yên">Phú Yên </option>                                    
                                                    <option value="Quảng Bình">Quảng Bình </option>                                    
                                                    <option value="Quảng Nam">Quảng Nam </option>                                    
                                                    <option value="Quảng Ngãi">Quảng Ngãi </option>                                    
                                                    <option value=">Quảng Ninh">Quảng Ninh </option>                                    
                                                    <option value="Quảng Trị">Quảng Trị </option>                                    
                                                    <option value="12051">Sơn La </option>                                    
                                                    <option value="12050">Sóc Trăng </option>                                    
                                                    <option value="12052">Tây Ninh </option>                                    
                                                    <option value="Thanh Hóa">Thanh Hóa </option>                                    
                                                    <option value="12053">Thái Bình </option>                                    
                                                    <option value="12054">Thái Nguyên </option>                                    
                                                    <option value="12056">Thừa Thiên Huế </option>                                    
                                                    <option value="12057">Tiền Giang </option>                                    
                                                    <option value="Tp. Hồ Chí Minh">Tp. Hồ Chí Minh </option>                                 
                                                    <option value="12059">Trà Vinh </option>                                    
                                                    <option value="12060">Tuyên Quang </option>                                    
                                                    <option value="12061">Vĩnh Long </option>                                    
                                                    <option value="12062">Vĩnh Phúc </option>                                    
                                                    <option value="12063">Yên Bái </option>                                    
                                                    <option value="12016">Đăk Lăk </option>                                    
                                                    <option value="12017">Đăk Nông </option>                                    
                                                    <option value="12015">Đà Nẵng </option>                                    
                                                    <option value="12018">Điện Biên </option>                                    
                                                    <option value="Đồng Nai">Đồng Nai </option>                                    
                                                    <option value="Đồng Tháp">Đồng Tháp </option>
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="radio-inline">
                                                      <input type="radio" name="address-opt" id="inlineRadio1" value="congkhai" checked> Công khai
                                                    </label>
                                                    <label class="radio-inline">
                                                      <input type="radio" name="address-opt" id="inlineRadio2" value="onlyme"> Chỉ mình tôi
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-3 control-label">Email</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="email" id="email">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="radio-inline">
                                                      <input type="radio" name="email-opt" id="email1" value="congkhai" checked> Công khai
                                                    </label>
                                                    <label class="radio-inline">
                                                      <input type="radio" name="email-opt" id="email2" value="onlyme"> Chỉ mình tôi
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="about" class="col-md-3 control-label">Giới thiệu về bản thân</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control pre-scrollable" name="about" id="about" style="resize:none;height:95px;"></textarea>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-pop center-block" value="add-user" name="btnAdd" id="btnAdd"><b>Thêm tài khoản</b></button>
                                    </form>
                                    <!-- fullname2 username2 password2 gender ngaysinh state role address email about btnAdd -->
                                    <?php
                                        include( "control/configure.php");
                                        if (isset($_REQUEST['btnAdd'])&&isset($_REQUEST['fullname2'])&&isset($_REQUEST['username2'])&&isset($_REQUEST['password2'])&&isset($_REQUEST['state'])&&isset($_REQUEST['role'])&&isset($_REQUEST['email'])) {
                                            $fullname=$_REQUEST['fullname2'];
                                            $username=$_REQUEST['username2'];
                                            $password=$_REQUEST['password2'];
                                            $gender=$_REQUEST['gender'];
                                            $ngaysinh=$_REQUEST['ngaysinh'];
                                            $state=$_REQUEST['state'];
                                            $role=$_REQUEST['role'];
                                            $address=$_REQUEST['address'];
                                            $email=$_REQUEST['email'];
                                            $about=$_REQUEST['about'];
                                            $avatar="avatar.jpg";
                                            $sql="INSERT INTO user(fullname,username,password,gender,dateofbirth,state,idrole,address,email,avatar,about) VALUES ('{$fullname}','{$username}',(md5('{$password}')),'{$gender}','{$ngaysinh}','{$state}','{$role}','{$address}','{$email}','{$avatar}','{$about}')";
                                            if(mysqli_query($con,$sql)) {
                                                ?>
                                                <script type="text/javascript">
                                                    document.getElementById("noti-action").innerHTML = "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Thêm thành viên mới thành công.</div>";
                                                </script>
                                                <?php
                                            }else {
                                                ?>
                                                <script type="text/javascript">
                                                    document.getElementById("noti-action").innerHTML = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Thêm thành viên mới không thành công.</div>";
                                                </script>
                                                <?php
                                                //echo mysqli_error($con);
                                            }
                                        }
                                        mysqli_close($con);
                                    ?>
                                </div>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php
    include("fix/libjs.php");
    ?>
</body>

</html>
