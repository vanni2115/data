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

    <title>Sửa bài viết</title>

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
                    <h1 class="page-header">Bài viết</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sửa bài viết
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- hien noi dung bai viet chinh sua-->
                        <?php
                            include("control/configure.php");
                            $sql = "SELECT * FROM article, user WHERE ((article.iduser=user.iduser) AND (idarticle = '{$_GET['idarticle']}'))";
                            $result = mysqli_query($con, $sql);
                            while($row=mysqli_fetch_array($result)){
                                echo "<div class='row'>
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
                                            <a class='form-control' href='../../profile.php?iduser={$row['iduser']}'>".$row['fullname']."</a>
                                            </div>
                                        </div>
                                        <div class='form-group row'>
                                            <label for='state' class='col-md-3 control-label'>Trạng thái của bài viết</label>
                                            <div class='col-md-9'>
                                                <select class='form-control' name='state' id='state'>";
                                                if($row['state']==1){
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
                                            window.location.href = "article.php";
                                        </script>
                                        <?php
                                    
                                }else {
                                    echo "<br><p>Sửa không thành công:</p> " .mysqli_error($con);
                                }
                            }else {
                                echo "<br><p>Không để trống <b>tên bài viết</b>";
                            }
                        }
                        if(isset($_REQUEST['state-flag'])){
                            $state1=$_REQUEST['state-flag'];
                            $sql1="UPDATE article SET state='{$_REQUEST['state-flag']}' WHERE idarticle = '{$_GET['idarticle']}'";
                            if(mysqli_query($con,$sql1)) {
                                    // header("Location:admin-post-article.php");
                                        //header('Refresh: 1; url=edit-article.php');
                                        ?>
                                        <script language="javascript">
                                            alert("Đã đăng/lưu trữ bài viết.");
                                            window.location.href = "article.php";
                                        </script>
                                        <?php
                                    
                                }else {
                                    echo "<br><p>Đăng/Lưu trữ không thành công:</p> " .mysqli_error($con);
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
