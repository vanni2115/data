<?php
session_start();

    if(!($_SESSION['username']=="admin")) {
        header("location:.././");
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

    <title>Thêm bài viết</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../dist/css/style.css" type="text/css" rel="stylesheet" />
    <link href="../dist/css/style-pop.css" type="text/css" rel="stylesheet" />
    <!-- <link href="css/home_1489197295.min.css" rel="stylesheet" type="text/css"> -->

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
            include_once("header.php");
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
                            <a href="#"><i class="fa fa-question-circle fa-fw"></i> Câu hỏi<span class="fa arrow"></span></a>
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
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Dạng bài tập<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="exam.php">Tất cả dạng bài tập</a>
                                </li>
                                <li>
                                    <a href="exam-add.php">Thêm mới</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-filter fa-fw"></i> Bộ lọc từ<span class="fa arrow"></span></a>
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
                            <a href="#"><i class="fa fa-exclamation-circle fa-fw"></i> Báo cáo vi phạm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="report.php">Danh sách báo cáo</a>
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
                    <h1 class="page-header">Bài viết</h1><div id='noti-action'></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thêm bài viết
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-10 col-md-push-1">
                                    <form id="change" name="regis" method="POST" onSubmit="javascript:return validate();" enctype="multipart/form-data">

                                        <!-- anh cho article -->
                                        <div class="row">
                                          <div class="col-md-5 col-sm-8 col-xs-8 col-md-push-4 col-ms-push-2 col-xs-push-2">
                                              <i style="text-align:center" class="center-block">Dung lượng ảnh nhỏ hơn 200Kb.</i>
                                              <div id="img-upload-form" class="thumbnail" onmouseover="mouseOver()" onmouseout="mouseOut()">
                                                <img id="logo-img" onclick="document.getElementById('add-new-logo').click();" src="../upload/english2.jpg" style="height: 200px; width: 400px;" />
                                                <div id="hover-ava" style="z-index:1;position:relative;display:none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; Cập nhật ảnh đại diện<input type="file" id="add-new-logo" style="opacity:0;z-index:2;margin-top:-18px;position:relative;cursor:pointer;" class="center-block" name="avatar" accept="image/*" onchange="addNewLogo(this)"/></div>
                                              </div>
                                          </div>
                                        </div>

                                         <script type="text/javascript">
                                            // change ava UI
                                            function mouseOver() {
                                                document.getElementById("hover-ava").className="up-ava";
                                                document.getElementById("hover-ava").style.display="";
                                            }

                                            function mouseOut() {
                                                document.getElementById("hover-ava").className="none";
                                                document.getElementById("hover-ava").style.display="none";
                                            }
                                            var addNewLogo = function(input){
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function (e) {
                                                        //Hiển thị ảnh vừa mới upload lên
                                                        $('#logo-img').attr('src', e.target.result);
                                                    }
                                                    reader.readAsDataURL(input.files[0]);
                                                    //submit form để upload ảnh
                                                    // $('#img-upload-form').submit();
                                                }
                                            }
                                        </script>



                                        <div class="form-group row">
                                            <label for="title-article" class="col-md-3 control-label">Tiêu đề bài viết mới</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="title-article" id="title-article">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="topic" class="col-md-3 control-label">Chủ đề của bài viết</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="topic" id="topic" size="1">
                                                    <option value="">--Chọn chủ đề cho bài viết-- </option>
                                                    <?php
                                                        include("../control/configure.php");
                                                        $sql = "SELECT * FROM topic";
                                                        $result = mysqli_query($con, $sql);
                                                        $num_rows = mysqli_num_rows($result);
                                                        while($row=mysqli_fetch_array($result)){
                                                        echo "<option value='".$row['idtopic']."'>".$row['nametopic']." </option>";
                                                        }
                                                        mysqli_close($con);
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="state" class="col-md-3 control-label">Trạng thái</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="state" id="state">
                                                    <option value="">--Chọn trạng thái cho chủ đề-- </option>
                                                    <option value="1">Hiển thị </option>
                                                    <option value="0">Lưu trữ </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="about" class="col-md-3 control-label">Nội dung bài viết mới</label>
                                            <div class="col-md-9">
                                                <textarea name="content" id="textarea_full" style="width:100%;"> </textarea>
                                                
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-pop center-block" value="add-article" name="btnAdd" id="btnAdd"><b>Đăng bài</b></button>
                                    </form>
                                    <!-- Xu ly them bai viet -->
                                    <?php
                                        include( "../control/configure.php");
                                        if (isset($_REQUEST['btnAdd'])&&isset($_REQUEST['title-article'])&&isset($_REQUEST['topic'])) {

                                            if (isset($_FILES['avatar']['name'])){
                                                $title=$_REQUEST['title-article'];
                                                $iduser=$_SESSION['iduser'];
                                                $idtopic=$_REQUEST['topic'];
                                                $state=$_REQUEST['state'];
                                                $content=$_REQUEST['content'];
                                                // Nếu file upload không bị lỗi,
                                                // Tức là thuộc tính error > 0
                                                $varFileName=$_FILES['avatar']['name'];
                                                $varRename=$varFileName.time();
                                                $varSize=$_FILES['avatar']['size'];
                                                $varTemp=$_FILES['avatar']['tmp_name'];
                                                $varType=$_FILES['avatar']['type'];
                                                $varExt=$FILES['avatar']['Extend'];
                                                $varUploadDir=".././upload/";
                                                $varUploadFile=$varUploadDir.$varFileName;
                                                if ($varSize < 200000) {
                                                    $sql="INSERT INTO article(iduser,idtopic,state,namearticle,image,content) VALUES ('{$iduser}','{$idtopic}','{$state}','{$title}','{$varRename}','{$content}')";
                                                    if(mysqli_query($con,$sql)) {
                                                    // header("Location:admin-post-article.php");
                                                        //header('Refresh: 1; url=edit-article.php');
                                                        ?>
                                                        <script type="text/javascript">
                                                            document.getElementById("noti-action").innerHTML = "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Thêm bài viết mới thành công.</div>";
                                                        </script>
                                                        <?php
                                                    
                                                    }else {
                                                        ?>
                                                        <script type="text/javascript">
                                                            document.getElementById("noti-action").innerHTML = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Thêm bài viết mới không thành công.</div>";
                                                        </script>
                                                        <?php
                                                    }
                                                    if ($_FILES['avatar']['error'] > 0)
                                                    {
                                                        echo 'File Upload Bị Lỗi';
                                                    }else{
                                                        // Upload file
                                                        move_uploaded_file($_FILES['avatar']['tmp_name'], '.././upload/'.$_FILES['avatar']['name']);
                                                        // echo 'File Uploaded';
                                                    }
                                                }else{
                                                    ?>
                                                    <script type="text/javascript">
                                                        document.getElementById("noti-action").innerHTML = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Không thành công! Dung lượng ảnh lớn hơn mức quy định.</div>";
                                                    </script>
                                                    <?php
                                                }
                                                
                                            }else{
                                                $title=$_REQUEST['title-article'];
                                                $iduser=$_SESSION['iduser'];
                                                $idtopic=$_REQUEST['topic'];
                                                $state=$_REQUEST['state'];
                                                $content=$_REQUEST['content'];
                                                $image="english2.jpg";
                                                $sql="INSERT INTO article(iduser,idtopic,state,namearticle,image,content) VALUES ('{$iduser}','{$idtopic}','{$state}','{$title}','{$image}','{$content}')";
                                                if(mysqli_query($con,$sql)) {
                                                    ?>
                                                    <script type="text/javascript">
                                                        document.getElementById("noti-action").innerHTML = "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Thêm bài viết mới thành công.</div>";
                                                    </script>
                                                    <?php
                                                }else {
                                                    ?>
                                                    <script type="text/javascript">
                                                        document.getElementById("noti-action").innerHTML = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Thêm bài viết mới không thành công.</div>";
                                                    </script>
                                                    <?php
                                                }
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
    include_once("libjs.php");
    include_once("footer.php");
    ?>
</body>

</html>
