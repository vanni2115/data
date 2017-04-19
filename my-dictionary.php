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

        <title>Từ điển cá nhân</title>

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
                                        <textarea class="form-control pre-scrollable" placeholder="Cách sử dụng, lưu ý, các từ đồng nghĩa, trái nghĩa..." name="note" id="note" style="resize:none;height:95px;"></textarea>
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
                  <div class="col-md-12 content">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list"></span> Danh sách các ghi chú
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="mytable">
                        <thead>
                            <tr>
                                <th>Tên từ điển</th>
                                <th>Loại từ</th>
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
                                        <td>".$row['type']."</td>
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