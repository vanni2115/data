<?php
session_start();
    if(empty($_SESSION['username'])) {
        header("./");
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

    <title>Bài đăng của tôi</title>

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
                  <li class="active"><a href="#add" class="title-set" role="tab" data-toggle="tab">Thêm mới</a></li>
                  <li class="" id="saveScr"><a href="#saved" class="title-set" role="tab" data-toggle="tab">Danh sách</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <!-- Tab add -->
                  <div class="tab-pane fade active in" id="add">
                    <div id='noti-action'></div>
                    <div class="row" style="margin-top:30px;">
                        <div class="col-md-10 col-md-push-1">
                            <form id="change" name="regis" method="POST" onSubmit="javascript:return validate();">
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
                                                include("control/configure.php");
                                                $sql = "SELECT * FROM topic WHERE ((state='1') AND (idtopic !='1'))";
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
                                    <label for="about" class="col-md-3 control-label">Nội dung bài viết mới</label>
                                    <div class="col-md-9">
                                        <textarea name="content" id="textarea_full" style="width:100%;"> </textarea>
                                        
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-pop center-block" value="add-article" name="btnAdd" id="btnAdd"><b>Đăng bài</b></button>
                            </form>
                            <!-- Xu ly them bai viet -->
                            <?php
                                include( "control/configure.php");
                                include("simple_html_dom.php");
                                // xu ly cat chuoi toan ven
                                function words($str,$num)
                                {
                                    $limit = $num - 1 ;
                                    $str_tmp = '';
                                     $str = str_replace(']]>', ']]&gt;', $str);
                                     $str = strip_tags($str);
                                    $arrstr = explode(" ", $str);
                                    if ( count($arrstr) <= $num ) { return $str; }
                                    if (!empty($arrstr))
                                    {
                                        for ( $j=0; $j< count($arrstr) ; $j++)    
                                        {
                                            $str_tmp .= " " . $arrstr[$j];
                                            if ($j == $limit) 
                                            {
                                                break;
                                            }
                                        }
                                    }
                                    return $str_tmp."...";
                                }
                                if (isset($_REQUEST['btnAdd'])&&isset($_REQUEST['title-article'])&&isset($_REQUEST['topic'])) {
                                    $title=$_REQUEST['title-article'];
                                    $iduser=$_SESSION['iduser'];
                                    $idtopic=$_REQUEST['topic'];
                                    $state=0;
                                    $content=$_REQUEST['content'];
                                    $myself=1;
                                    $image="english2.jpg";
                                    $small = $content;
                                    $html = str_get_html($small)->plaintext;
                                    $rutgon = words($html, 10);
                                    $sql="INSERT INTO article(iduser,idtopic,state,namearticle,image,content) VALUES ('{$iduser}','{$idtopic}','{$state}','{$title}','{$image}','{$content}')";
                                    if(mysqli_query($con,$sql)) {
                                        $sql2 = "SELECT idarticle, namearticle FROM article WHERE namearticle='$title'";
                                        $result2 = mysqli_query($con, $sql2);
                                        while($row=mysqli_fetch_array($result2)){
                                            $content_noti = "Bạn đã thêm mới bài: <a href='article.php?idtopic=".$idtopic."&idarticle=".$row['idarticle']."' style='color:black;'>".$row['namearticle']."</a>";
                                            $sql3="INSERT INTO noti(iduser,idarticle,myself,content,action) VALUES ('{$iduser}','{$row['idarticle']}','{$myself}','{$rutgon}','" . mysql_real_escape_string($content_noti) ."')";
                                            mysqli_query($con,$sql3);
                                            
                                        }
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
                                mysqli_close($con);
                            ?>
                        </div>
                    </div>
                    
                  </div>

                  <!-- Tab danh sach -->
                  <div class="tab-pane fade" id="saved">
                  <div class="row" style="margin-top:30px;">
                  <div class="col-md-12 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list"></span> Danh sách các bài viết
                </div>
                <div class="panel-body">
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
                                $sql = "SELECT * FROM article, user, topic WHERE ((article.iduser=user.iduser) AND (article.idtopic=topic.idtopic) AND (article.iduser='{$_SESSION['iduser']}'))";
                                $result = mysqli_query($con, $sql);
                                $num_rows = mysqli_num_rows($result);
                                while($row=mysqli_fetch_array($result)){
                                echo "<tr class='odd gradeX'>
                                        <td><a href='article.php?idtopic={$row['idtopic']}&idarticle={$row['idarticle']}'>".$row['namearticle']."</a></td>
                                        <td>".$row['fullname']."</td>
                                        <td>".$row['nametopic']."</td>
                                        <td>
                                            <div class='pull-right action-buttons'>
                                                <a href='edit-article.php?idarticle={$row['idarticle']}' name='btnChange' value='change'><span class='glyphicon glyphicon-pencil'></span></a>
                                                <a href='delete-article.php?idarticle={$row['idarticle']}' name='btnDel' value='del' class='trash'><span class='glyphicon glyphicon-trash' style='color:rgb(209, 91, 71)'></span></a>
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
<!-- DataTables JavaScript -->
    <script src="datatable-plugin/jquery.dataTables.min.js"></script>
    <script src="datatable-plugin/dataTables.bootstrap.min.js"></script>
    <script src="datatable-plugin/dataTables.responsive.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
    $('#mytable').DataTable({
        responsive: true,
        "language": {
            "sProcessing":   "Đang xử lý...",
            "sLengthMenu":   "Xem _MENU_ bản ghi",
            "sZeroRecords":  "Không tìm thấy dữ liệu nào phù hợp",
            "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ bản ghi",
            "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 bản ghi",
            "sInfoFiltered": "(được lọc từ _MAX_ bản ghi)",
            "sInfoPostFix":  "",
            "sSearch":       "Tìm kiếm: ",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "Đầu tiên",
                "sPrevious": "Trước",
                "sNext":     "Sau",
                "sLast":     "Cuối cùng"
            },
            "oAria": {
              "sSortAscending": ": Sắp xếp tăng dần", "sSortDescending": ": Sắp xếp giảm dần"
            }
        }
    });
});
    </script>

</body>

</html>
