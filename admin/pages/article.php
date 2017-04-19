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

    <title>Quản lý bài viết</title>

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
                            <a href="#"><i class="fa fa-suitcase fa-fw"></i> Bộ lọc từ<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="filter-word.php">Danh sách các từ</a>
                                </li>
                                <li>
                                    <a href="filter-word-add.php">Thêm vào bộ lọc</a>
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
                    <h1 class="page-header">Quản lý bài viết</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tất cả bài viết
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <p id="demo"></p>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="mytable">
                                <thead>
                                    <tr>
                                        <th>Tên bài viết</th>
                                        <th>Tên người tạo</th>
                                        <th>Chủ đề</th>
                                        <th>Tùy chỉnh</th>
                                        <!-- <th>Engine version</th>
                                        <th>CSS grade</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include("control/configure.php");
                                        $sql = "SELECT * FROM article, user, topic WHERE ((article.iduser=user.iduser) AND (article.idtopic=topic.idtopic))";
                                        $result = mysqli_query($con, $sql);
                                        $num_rows = mysqli_num_rows($result);
                                        while($row=mysqli_fetch_array($result)){
                                            // $state = mysqli_query($con, 'SELECT state FROM article');
                                        echo "<tr class='odd gradeX'>
                                                <td><a href='../../article.php?idtopic={$row['idtopic']}&idarticle={$row['idarticle']}'>".$row['namearticle']."</a></td>
                                                <td>".$row['fullname']."</td>
                                                <td>".$row['nametopic']."</td>
                                                <td>
                                                    <div class='pull-right action-buttons'>
                                                        <a href='edit-article.php?idarticle={$row['idarticle']}' name='btnChange' value='change'><span class='glyphicon glyphicon-pencil'></span></a>
                                                        <a href='delete-article.php?idarticle={$row['idarticle']}' name='btnDel' value='del' class='trash'><span class='glyphicon glyphicon-trash' style='color:rgb(209, 91, 71)'></span></a>";
                                                        if($row['state']==1){
                                                            echo "<a href='edit-article.php?idarticle={$row['idarticle']}' class='flag'><span class='glyphicon glyphicon-flag' style='color:rgb(248, 148, 6);'></span></a>";
                                                        }else{
                                                            echo "<a href='edit-article.php?idarticle={$row['idarticle']}' class='flag'><span class='glyphicon glyphicon-flag'></span></a>";
                                                        }
                                            echo "</div>
                                                </td>
                                            </tr>";
                                        }
                                        mysqli_close($con);
                                    ?>
                                    
                                </tbody>
                            </table>
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
