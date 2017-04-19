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

    <title>Sửa chủ đề</title>

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
                    <h1 class="page-header">Chủ đề</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sửa chủ đề
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- hien noi dung bai viet chinh sua-->
                        <?php
                            include("control/configure.php");
                            $sql = "SELECT * FROM topic WHERE (idtopic = '{$_GET['idtopic']}')";
                            $result = mysqli_query($con, $sql);
                            while($row=mysqli_fetch_array($result)){
                                echo "<div class='row'>
                            <div class='col-md-10 col-md-push-1'>
                                <form id='change1' name='edit-topic' method='POST' onSubmit='javascript:return validate();'>
                                    <div class='form-group row'>
                                        <label for='nametopic' class='col-md-3 control-label'>Tên chủ dề</label>
                                        <div class='col-md-9'>
                                            <input class='form-control' type='text' name='nametopic' value='{$row['nametopic']}' id='nametopic'>
                                        </div>
                                    </div>
                                    <div class='form-group row'>
                                            <label for='title-topic' class='col-md-3 control-label'>Màu sắc cho chủ đề</label>
                                            <div class='col-md-9'>
                                                <input type='color' name='color' value='{$row['color']}'>
                                            </div>
                                        </div>
                                    <div class='form-group row'>
                                        <label for='state' class='col-md-3 control-label'>Trạng thái của chủ dề</label>
                                        <div class='col-md-9'>
                                            ";
                                                if($row['state']==0){
                                                    echo "<select class='form-control' name='state' id='state'>
                                                    <option value=''>--Chọn trạng thái cho chủ đề-- </option>
                                                        <option value='1'>Hiển thị </option>
                                                        <option value='0' selected>Lưu trữ </option>
                                                        </select>";
                                                }else{
                                                    echo "<select class='form-control' name='state' id='state'>
                                                    <option value=''>--Chọn trạng thái cho chủ đề-- </option>
                                                        <option value='1' selected>Hiển thị </option>
                                                        <option value='0'>Lưu trữ </option>
                                                        </select>";
                                                }

                                            echo "
                                        </div>
                                    </div>
                                    <button type='submit' class='btn btn-pop center-block' value='edittopic' name='btnEdit' id='btnEdit'><b>Sửa chủ đề</b></button>
                                </form>";
                                }
                                 mysqli_close($con);
                            ?>
                    <?php
                    //Tạo kết nối đến CSDL
                    include('control/configure.php');
                    //Truy vấn đến CSDL
                    if(isset($_REQUEST['nametopic'])&&isset($_REQUEST['state'])&&isset($_REQUEST['btnEdit'])) {
                        if($_REQUEST['nametopic']!=""){
                            $nametopic=$_REQUEST['nametopic'];
                            $state=$_REQUEST['state'];
                            $color=$_REQUEST['color'];
                            $sql="UPDATE topic SET nametopic='{$_REQUEST['nametopic']}', state='{$_REQUEST['state']}', color='{$_REQUEST['color']}' WHERE idtopic = '{$_GET['idtopic']}'";
                                if(mysqli_query($con,$sql)) {
                                    ?>
                                        <script language="javascript">
                                            alert("Đã sửa thành công chủ đề");
                                            window.location.href = "topics.php";
                                        </script>
                                        <?php
                                //header("Location:admin-post-article.php");
                                
                            }else {
                                echo "<br><p>Sửa không thành công:</p> " .mysqli_error($con);
                            }
                        }else {
                            echo "<br><p>Không để trống <b>tên chủ dề</b>";
                        }
                    }
                    //Đóng kết nối đến server
                    mysqli_close($con);
                    
                ?>
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