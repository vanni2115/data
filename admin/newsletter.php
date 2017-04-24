
<?php
    session_start();
    //Tạo kết nối đến CSDL
    include('control/configure.php');
    include('smtp/class.smtp.php');
    include ("smtp/class.phpmailer.php"); 
                // include ("smtp/Send_Mail.php");  
    $msg='';
    if(!empty($_POST['newsletter']) && isset($_POST['newsletter']) ){
        // username and password sent from form
        $newsletter=mysql_real_escape_string($_POST['newsletter']);
        // kiểm tra định dạng email nhập đúng chưa
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';

        if(preg_match($regex, $newsletter)){
            $activation=md5($newsletter.time());
            $count=mysqli_query($con,"SELECT id FROM letter WHERE email_letter='$newsletter'");
            // Kiểm tra email đã có trong cơ sở dữ liệu chưa
            if(mysqli_num_rows($count) < 1){
                mysqli_query($con,"INSERT INTO letter(email_letter, activation_letter) VALUES ('$newsletter', '$activation')");
                // sending email
                $nFrom = "Diễn đàn tiếng Anh";    //mail duoc gui tu dau, thuong de ten cong ty ban
                $mFrom = 'summer.rain1368@gmail.com';  //dia chi email cua ban 
                $mPass = 'zesa20607571622';       //mat khau email cua ban
                $nTo = 'Bạn'; //Ten nguoi nhan
                $mTo = $newsletter;   //dia chi nhan mail
                $mail             = new PHPMailer();
                $body             = 'Xin chào, <br/> <br/> Bạn đã đăng ký nhận thông tin bài viết tại website Diễn đàn tiếng Anh.<br/><br/>Click vào đây nếu bạn muốn hủy bỏ việc nhận thông tin từ chúng tôi:<br/> <br/> <a href="'.$base_url.'cancel-letter.php?code='.$activation.'">'.$base_url.'cancel-receipt-letter/'.$activation.'</a>';   // Noi dung email
                $title = 'Đăng ký nhận thông tin';   //Tieu de gui mail
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
                ?>
                <script language="javascript">
                    alert("Đăng ký nhận thông tin thành công, chúng tôi đã gửi email thông báo đến cho bạn.");
                    history.back();
                </script>
                <?php
            }else{
                ?>
                <script language="javascript">
                    alert("Địa chỉ email đã tồn tại, vui lòng đăng ký địa chỉ email.");
                    history.back();
                </script>
                <?php
            }
        }else{
            ?>
            <script language="javascript">
                alert("Địa chỉ email mà bạn nhập không hợp lệ, vui lòng nhập chính xác.");
                // location.reload();
                window.location.href = "./";
            </script>
            <?php
        }
    }
    // HTML Part
    mysqli_close($con);
?>
                                