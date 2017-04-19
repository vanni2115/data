
<div class="head_top header_admin">
            <div class="bg_top">
                <script>
                    function jsupdate(k,idclass,jscolor) {
                        if(k==0)        $("."+idclass).css("background-color","#"+jscolor);
                        else if (k==1)  $("."+idclass).css("color","#"+jscolor);
                    }
                </script>
            </div>
        </div>
<div class="banner-figures">
    <div class="banner_child" style="background:url('images/bgtop.jpg') no-repeat 0px 0px;">
        <div class="container container_new banner-drop">
            <div class="header navbar-fixed-top" style="background:url('images/bgtop.jpg') no-repeat 0px 0px;">
                <div class="dv-lang">
                    <!-- <button aria-controls="bs-navbar" aria-expanded="false" class="collapsed navbar-toggle" data-target="#menu-navbar" data-toggle="collapse" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>  collapse navbar-collapse" id="menu-navbar"../.././  ../../  ../../topic.php   ../.././-->
                </div>
                <div class="header-left">
                    <ul>
                        <li class="animated wow fadeInLeftBig" data-wow-duration="1200ms" data-wow-delay="800ms"><span class="glyphicon glyphicon-home" aria-hidden="true"></span><a href="../.././"> Trang chủ</a></li>
                        <li class="animated wow fadeInLeftBig" data-wow-duration="1200ms" data-wow-delay="900ms"><span class="fa fa-lg fa-info" aria-hidden="true"></span><a href="../../">&nbsp; Hướng dẫn</a></li>

                        <li class="dropdown animated wow fadeInLeftBig" data-wow-duration="1200ms" data-wow-delay="900ms">
                            <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dLabel"> Chủ đề <i class="fa fa-caret-down"></i></a>
                            <ul class="dropdown-menu my111" aria-labelledby="dLabel">
                                <?php
                                    include("control/configure.php");
                                    $sql = "SELECT * FROM topic WHERE ((idtopic != '1') AND (idtopic != '2') AND(idtopic != '3') AND (state='1'))";
                                    $result = mysqli_query($con, $sql);
                                    $num_rows = mysqli_num_rows($result);
                                    while($row=mysqli_fetch_array($result)){
                                    echo " <li style='margin:5px 15px;'><a href='../../topic.php?idtopic={$row['idtopic']}'>".$row['nametopic']."</a></li>";
                                    }
                                    mysqli_close($con);
                                ?>
                            </ul>
                        </li>

                        <li class="animated wow fadeInLeftBig" data-wow-duration="1200ms" data-wow-delay="900ms"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span><a href="../../my-dictionary.php"> Từ điển cá nhân</a></li>

                        <li class="dropdown animated wow fadeInLeftBig" data-wow-duration="1200ms" data-wow-delay="900ms">
                            <span class="glyphicon glyphicon-education" style="font-size:20px;" aria-hidden="true"></span>
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dLabel1"> Bài tập <i class="fa fa-caret-down"></i></a>
                            <ul class="dropdown-menu my111" aria-labelledby="dLabel1">
                                <?php
                                include("control/configure.php");
                                $sql = "SELECT * FROM typequestion";
                                $result = mysqli_query($con, $sql);
                                $num_rows = mysqli_num_rows($result);
                                while($row=mysqli_fetch_array($result)){
                                echo " <li style='margin:5px 15px;'><a href='../../exam.php?idtypequestion={$row['idtypequestion']}'>".$row['nametype']."</a></li>";
                                }
                                mysqli_close($con);
                            ?>
                            </ul>
                        </li>
                    </ul>
                </div>
                <?php
                    //tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
                    if (isset($_SESSION['username'])) {
                ?>
                <div class="header-right">
                    <div class="dropdown" style="padding-right:50px;margin-top:-10px;">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="user-info">
                        
                                    <?php
                                        include("control/configure.php");
                                        $sql="SELECT * FROM user WHERE iduser = '{$_SESSION['iduser']}'";
                                        $result = mysqli_query($con, $sql);
                                        while($row=mysqli_fetch_array($result)){
                                        ?>
                                        <div class="navbar-brand" style="color:white;cursor:default;"><?php echo $row['fullname'] ?></div>
                                            <div class="avatar">
                                        <?php
                                            echo "<img src='../../upload/{$row['avatar']}' alt='' />";
                                        }
                                        mysqli_close($con);
                                    ?>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-profile" style="margin-top:51px;margin-right:40px;">
                            <?php
                                if(($_SESSION['role']=="2")) {
                            ?>
                            <li><a href="./admin"><i class="glyphicon glyphicon-lock"></i> Trang quản trị</a></li>
                            <?php
                                }
                            ?>
                            
                            <li><a href="../../accout-setting.php"><i class="glyphicon glyphicon-cog"></i> Hồ sơ</a></li>
                            <li><a href="../../my-dictionary.php"><i class="glyphicon glyphicon-pushpin"></i> Từ điển cá nhân</a></li>
                            <li><a href="../../post-article.php"><i class="fa fa-edit fa-fw" style="font-size:22px;"></i>Bài đăng của tôi</a></li>
                            <!-- <li><a href="accout-setting.php"><i class="glyphicon glyphicon-cog"></i> Tùy chỉnh</a></li> -->
                            <li><a href="../../logout.php"> <i class="glyphicon glyphicon-log-out"></i> Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
                <?php 
                    }
                ?>
                <div class="clearfix"> </div>
            </div>

            <div class="logo animated wow bounceInDown" data-wow-duration="1000ms" data-wow-delay="500ms" style="padding-top:100px;">
                <h2><a href="../.././"><span>Trao đổi, học hỏi, chia sẻ</span>Diễn đàn tiếng Anh</a></h2>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
.my111 {
    border: unset !important;
    background:url('images/bgtop.jpg') !important;
    min-width: 160px;
    position: absolute !important;
}
.my111:after, .my111:before {
    display: none !important;
}
.my111 li:hover, .my111 li a:hover {
    background: rgb(243, 173, 69) !important;
    padding-left: 10px;
}
.my111 li a {
    color: white !important;
    padding: 10px 20px !important;
    text-decoration: none;

    /*display: block !important;*/
}
.my111 li a:hover {
    color:white !important;
}
.dropdown {
    cursor: pointer !important;
}
</style>