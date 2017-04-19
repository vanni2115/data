<?php
session_start();
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

        <title>Thông báo đăng ký</title>

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
            include("login.php");
            include("register.php");
        ?>

        <div class="container" style="z-index:1 !important;">
            <div class="row" style="display:flex;margin:50px 0;">
                <div class="col-md-7" style="margin:auto;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">Thông báo đăng ký</div>
                        </div>
                        <div class="panel-body">
                                <?php
                                    // session_start();
                                    //Tạo kết nối đến CSDL
                                    include('control/configure.php');
                                    include('smtp/class.smtp.php');
                                    include ("smtp/class.phpmailer.php"); 
                                                // include ("smtp/Send_Mail.php");  
                                    $msg='';
                                    if(!empty($_POST['email']) && isset($_POST['email']) && !empty($_POST['password']) && isset($_POST['password']) && isset($_POST['username'])&& isset($_POST['btnRes']) && isset($_POST['fullname']) ){
                                        // username and password sent from form
                                        $email=mysql_real_escape_string($_POST['email']);
                                        $password=mysql_real_escape_string($_POST['password']);
                                        // kiểm tra định dạng email nhập đúng chưa
                                        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';

                                        if(preg_match($regex, $email)){
                                            $password=md5($password); // mã hóa password
                                            $activation=md5($email.time()); // mã hóa email v�  thời gian
                                            $fullname=$_REQUEST['fullname'];
                                            $username=$_REQUEST['username'];
                                            $state=0;
                                            $avatar="avatar.jpg";
                                            $idrole = 1;
                                            $count=mysqli_query($con,"SELECT iduser FROM user WHERE email='$email'");
                                            $count1=mysqli_query($con,"SELECT iduser FROM user WHERE username='$username'");
                                            // Kiểm tra email đã có trong cơ sở dữ liệu chưa
                                            if((mysqli_num_rows($count) < 1) && (mysqli_num_rows($count1) < 1)){
                                                mysqli_query($con,"INSERT INTO user(email,username,password,activation,fullname,avatar,idrole,state) VALUES('$email','$username','$password','$activation','$fullname','$avatar','$idrole','$state')");
                                                // sending email
                                                $nFrom = "Diễn đàn tiếng Anh";    //mail duoc gui tu dau, thuong de ten cong ty ban
                                                $mFrom = 'summer.rain1368@gmail.com';  //dia chi email cua ban 
                                                $mPass = 'zesa20607571622';       //mat khau email cua ban
                                                $nTo = $fullname; //Ten nguoi nhan
                                                $mTo = $email;   //dia chi nhan mail
                                                $mail             = new PHPMailer();
                                                $body             = 'Xin chào <b>' . $fullname . '</b>, <br/> <br/> Bạn đã đăng ký thành viên tại website Diễn đàn tiếng Anh. Để có thể sử dụng tài khoản, vui lòng xác nhận thông tin đăng ký là chính xác:<br/> <br/> <a href="'.$base_url.'activation.php?code='.$activation.'">'.$base_url.'activation/'.$activation.'</a>';   // Noi dung email
                                                $title = 'Xác nhận tài khoản';   //Tieu de gui mail
                                                $mail->IsSMTP();             
                                                $mail->CharSet  = "utf-8";
                                                $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
                                                $mail->SMTPAuth   = true;    // enable SMTP authentication
                                                $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
                                                $mail->Host       = "smtp.gmail.com";    // sever gui mail.
                                                $mail->Port       = 465;         // cong gui mail de nguyen
                                                // xong phan cau hinh bat dau phan gui mail
                                                $mail->Username   = $mFrom;  // khai bao dia chi email
                                                $mail->Password   = $mPass;              // khai bao mat khau
                                                $mail->SetFrom($mFrom, $nFrom);
                                                $mail->AddReplyTo('summer.rain1368@gmail.com', 'Diễn đàn tiếng Anh'); //khi nguoi dung phan hoi se duoc gui den email nay
                                                $mail->Subject    = $title;// tieu de email 
                                                $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
                                                $mail->AddAddress($mTo, $nTo);
                                                // thuc thi lenh gui mail 
                                                $mail->Send();
                                                $msg= "Đăng ký tài khoản thành công, vui lòng xác nhận thông tin qua email.";
                                            }else{
                                                $msg= 'Địa chỉ email hoặc tên đăng nhập đã tồn tại, vui lòng đăng ký địa chỉ email hoặc tên đăng nhập khác.';
                                            }
                                        }else{
                                            $msg = 'Địa chỉ email mà bạn nhập không hợp lệ, vui lòng nhập chính xác.';
                                        }
                                    }
                                    // HTML Part
                                    mysqli_close($con);
                                ?>
                                <div class="noti-repwd-me"><br><br><i><?php echo $msg; ?></i></div>
                            
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
    </body>