<nav class="navbar-inverse navbar-fixed-top" role="navigation" style="font-size:16px;background:url('../images/bgtop.jpg');">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header navbar-left">
                <!-- <a class="navbar-brand text-ipphone">IPPhone</a> -->
                <button aria-controls="bs-navbar" aria-expanded="false" class="collapsed navbar-toggle" data-target="#menu-navbar" data-toggle="collapse" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling  style="float:left;"-->
            <div class="collapse navbar-collapse" id="menu-navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="animated wow fadeInLeftBig" data-wow-delay="900ms">
                        <form class="navbar-form navbar-left" style="margin-right:0;margin-left:0;margin-bottom:0;" action="../search.php" method="POST">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="email" class="letter-my" name="search" value="Nhập từ khóa..." onfocus="if (this.value == 'Nhập từ khóa...') {this.value = ''}" onblur="if (this.value == '') {this.value = 'Nhập từ khóa...';}">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-letter-my" name="btnTim" value="btnTim">Tìm kiếm</button>
                                    </span>
                                </div><!-- /input-group -->
                            </div>
                        </form>
                    </li>
                    <?php
                        //tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
                        if (isset($_SESSION['username'])) {
                    ?>
                    <li class="animated wow fadeInLeftBig" data-wow-duration="1200ms" data-wow-delay="800ms">
                        <?php
                            include("../control/configure.php");
                            $sql="SELECT * FROM user WHERE iduser = '{$_SESSION['iduser']}'";
                            $result = mysqli_query($con, $sql);
                            while($row=mysqli_fetch_array($result)){
                            ?>
                            <span class="navbar-brand"><?php echo $row['fullname'] ?></span>
                            <a class="navbar-brand avatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../upload/<?php echo $row['avatar'] ?>" class="avatar-img" alt="ava">
                            </a>
                            <?php
                            }
                            mysqli_close($con);
                        ?>
                        <ul class="dropdown-menu" id="ava-ul" style="background:url('../images/bgtop.jpg');">
                            <?php
                                if(($_SESSION['role']=="2")) {
                            ?>
                            <li><a href="./"><i class="glyphicon glyphicon-lock"></i> Trang quản trị</a></li>
                            <?php
                                }
                            ?>
                            <li><a href="../accout-setting.php"><i class="glyphicon glyphicon-cog"></i> Hồ sơ</a></li>
                            <li><a href="../my-dictionary.php"><i class="glyphicon glyphicon-pushpin"></i> Từ điển cá nhân</a></li>
                            <li><a href="../post-article.php"><i class="fa fa-edit fa-fw"></i>Bài đăng của tôi</a></li>
                            <!-- <li><a href="accout-setting.php"><i class="glyphicon glyphicon-cog"></i> Tùy chỉnh</a></li> -->
                            <li><a href="../logout.php"> <i class="glyphicon glyphicon-log-out"></i> Đăng xuất</a></li>
                        </ul>
                    </li>
                    <?php 
                        }
                    ?>
                </ul>
                <ul class="nav navbar-nav navbar-left">
                    <li class="animated wow fadeInLeftBig" data-wow-duration="1200ms" data-wow-delay="1000ms"><a href="../.././"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Trang chủ</a></li>
                    <li class="animated wow fadeInLeftBig" data-wow-duration="1200ms" data-wow-delay="1100ms"><a href=""><span class="fa fa-lg fa-info" aria-hidden="true"></span>&nbsp; Hướng dẫn</a></li>

                    <li class="dropdown animated wow fadeInLeftBig" data-wow-duration="1200ms" data-wow-delay="1200ms">
                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Chủ đề <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu my111">
                            <?php
                                include("../control/configure.php");
                                $sql = "SELECT * FROM topic WHERE ((idtopic != '1') AND (idtopic != '2') AND(idtopic != '3') AND (state='1'))";
                                $result = mysqli_query($con, $sql);
                                $num_rows = mysqli_num_rows($result);
                                while($row=mysqli_fetch_array($result)){
                                echo " <li style='margin:5px 15px;'><a href='../topic.php?idtopic={$row['idtopic']}'>".$row['nametopic']."</a></li>";
                                }
                                mysqli_close($con);
                            ?>
                        </ul>
                    </li>

                    <li class="animated wow fadeInLeftBig" data-wow-duration="1200ms" data-wow-delay="1300ms"><a href="../my-dictionary.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Từ điển cá nhân</a></li>

                    <li class="dropdown animated wow fadeInLeftBig" data-wow-duration="1200ms" data-wow-delay="1400ms">
                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-education fa-lg" aria-hidden="true"></span> Bài tập <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu my111">
                            <?php
                                include("../control/configure.php");
                                $sql = "SELECT * FROM exam";
                                $result = mysqli_query($con, $sql);
                                $num_rows = mysqli_num_rows($result);
                                while($row=mysqli_fetch_array($result)){
                                    echo " <li style='margin:5px 15px;'><a href='../exam.php?idexam={$row['idexam']}'>".$row['nameexam']."</a></li>";
                                }
                                mysqli_close($con);
                            ?>
                        </ul>
                    </li>

                    
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<div class="banner-figures">
    <div class="banner_child" style="background:url('../images/bgtop.jpg');">
        <div class="container container_new banner-drop">
            <div class="logo animated wow bounceInDown" data-wow-duration="1000ms" data-wow-delay="500ms" style="padding-top:100px;">
                <h2><a href=".././"><span>Trao đổi, học hỏi, chia sẻ</span>Diễn đàn tiếng Anh</a></h2>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
.btn-letter-my:hover, .btn-letter-my:focus{
    color:white;
    background:#F3AD45;
}
.my111 {
    background:url('../images/bgtop.jpg') !important;
}
.my111 li:hover, .my111 li a:hover {
    background: rgb(243, 173, 69) !important;
    padding-left: 10px;
    color:white !important;
}
.my111 li a {
    color: white !important;
    padding: 10px 20px !important;
    text-decoration: none;
}
#ava-ul li a:hover{
    background: rgb(243, 173, 69) !important;
    /*padding-left: 10px;*/
}
#ava-ul li:hover{
    padding-left: 10px;
}
.dropdown {
    cursor: pointer !important;
}
li .glyphicon,.fa-info,.fa,.glyphicon-pencil{
    color:#f3ad45;
}
.navbar-left li a,#ava-ul li a {
    color: white !important;
}
.fadeInLeftBig a:hover {
    color: #f3ad45 !important;
}
.avatar-img{
    border-radius:80px;
    width:40px !important;
    height:40px !important;
}
.avatar{
    float:right;
    padding-top:7px !important;
    padding-bottom:0 !important;
}
.col-md-1 a, #side-menu>li>a, .nav-second-level>li>a, td, th, td>a{
    color:black !important;
}
table{
    margin-top:10px;
}
#side-menu>li>a:hover, .nav-second-level>li>a:hover, td:focus, td>a:hover, .page-header{color: #f3ad45 !important}
.panel-body{
    margin:5px 10px;
}
.input-sm{width:200px;}
</style>