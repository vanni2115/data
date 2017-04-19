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

    <title>Thêm câu hỏi</title>

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
                    <h1 class="page-header">Câu hỏi</h1><div id='noti-action'></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thêm câu hỏi
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-10 col-md-push-1">
                                    <form id="change" name="change" method="POST" onSubmit="javascript:return validate();">
                                        <div class="form-group row">
                                            <label for="type" class="col-md-3 control-label">Loại câu hỏi</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="type" id="type" size="1">
                                                    <option value="">--Chọn mức độ-- </option>
                                                    <?php
                                                        include("control/configure.php");
                                                        $sql = "SELECT * FROM typequestion";
                                                        $result = mysqli_query($con, $sql);
                                                        $num_rows = mysqli_num_rows($result);
                                                        while($row=mysqli_fetch_array($result)){
                                                        echo "<option value='".$row['idtypequestion']."'>".$row['nametype']." </option>";
                                                        }
                                                        mysqli_close($con);
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="question" class="col-md-3 control-label">Nội dung câu hỏi</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="question" id="question">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="daa" class="col-md-3 control-label">Đáp án A</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="daa" id="daa">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="dab" class="col-md-3 control-label">Đáp án B</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="dab" id="dab">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="dac" class="col-md-3 control-label">Đáp án C</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="dac" id="dac">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="dad" class="col-md-3 control-label">Đáp án D</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="dad" id="dad">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="correct" class="col-md-3 control-label">Đáp án đúng</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="correct" id="correct">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-pop center-block" value="btnAdd" name="btnAdd" id="btnAdd"><b>Thêm</b></button>
                                    </form>
                                    <!-- mark type-word mean note -->
                                    <?php
                                        include( "control/configure.php");
                                        if (isset($_REQUEST['btnAdd'])&&isset($_REQUEST['type'])&&isset($_REQUEST['question'])&&isset($_REQUEST['daa'])&&isset($_REQUEST['dab'])&&isset($_REQUEST['dac'])&&isset($_REQUEST['dad'])&&isset($_REQUEST['correct'])) {
                                            $type=$_REQUEST['type'];
                                            $question=$_REQUEST['question'];
                                            $daa=$_REQUEST['daa'];
                                            $dab=$_REQUEST['dab'];
                                            $dac=$_REQUEST['dac'];
                                            $dad=$_REQUEST['dad'];
                                            $correct=$_REQUEST['correct'];
                                            $sql="INSERT INTO question(idtype,content,daa,dab,dac,dad,correct) VALUES ('{$type}','{$question}','{$daa}','{$dab}','{$dac}','{$dad}','{$correct}')";
                                            if(mysqli_query($con,$sql)) {
                                                ?>
                                                <script type="text/javascript">
                                                    document.getElementById("noti-action").innerHTML = "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Thêm câu hỏi mới thành công.</div>";
                                                </script>
                                                <?php
                                            }else {
                                                ?>
                                                <script type="text/javascript">
                                                    document.getElementById("noti-action").innerHTML = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Thêm câu hỏi mới không thành công.</div>";
                                                </script>
                                                <?php
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
