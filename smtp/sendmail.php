<?php
    //goi thu vien
    include('class.smtp.php');
    include ("class.phpmailer.php"); 
    $nFrom = "Freetuts.net";    //mail duoc gui tu dau, thuong de ten cong ty ban
    $mFrom = 'summer.rain1368@gmail.com';  //dia chi email cua ban 
    $mPass = 'zesa20607571622';       //mat khau email cua ban
    $nTo = 'han gian'; //Ten nguoi nhan
    $mTo = 'gianhan.g34@gmail.com';   //dia chi nhan mail
    $mail             = new PHPMailer();
    $body             = 'Bạn đang tìm hiểu về cách gửi email bằng php mailler trên freetuts.net chúc các bạn có         những phút giây vui vẻ.';   // Noi dung email
    $title = 'Hướng dẫn gửi mail bằng PHPMailer';   //Tieu de gui mail
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
    $mail->AddReplyTo('summer.rain1368@gmail.com', 'Freetuts.net'); //khi nguoi dung phan hoi se duoc gui den email nay
    $mail->Subject    = $title;// tieu de email 
    $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
    $mail->AddAddress($mTo, $nTo);
    // thuc thi lenh gui mail 
    $mail->Send();
    // if(!$mail->Send()) {
    //     echo 'Co loi!';
         
    // } else {
         
    //     echo 'mail của bạn đã được gửi đi hãy kiếm tra hộp thư đến để xem kết quả. ';
    // }
?>

<?php
function sendMail($title, $content, $nTo, $mTo,$diachicc=''){
    $nFrom = "Dien dan tieng anh";    //mail duoc gui tu dau, thuong de ten cong ty ban
    $mFrom = 'prom.h1h2@gmail.com';  //dia chi email cua ban 
    $mPass = '112358xx';
    $mail             = new PHPMailer();
    $body             = $content;
    $mail->IsSMTP(); 
    $mail->CharSet   = "utf-8";
    $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;                    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";        
    $mail->Port       = 465;
    $mail->Username   = $mFrom;  // GMAIL username
    $mail->Password   = $mPass;               // GMAIL password
    $mail->SetFrom($mFrom, $nFrom);
    //chuyen chuoi thanh mang
    $ccmail = explode(',', $diachicc);
    $ccmail = array_filter($ccmail);
    if(!empty($ccmail)){
        foreach ($ccmail as $k => $v) {
            $mail->AddCC($v);
        }
    }
    $mail->Subject    = $title;
    $mail->MsgHTML($body);
    $address = $mTo;
    $mail->AddAddress($address, $nTo);
    $mail->AddReplyTo('vanni.2115@gmail.com', 'Dien dan tieng anh');
    if(!$mail->Send()) {
        return 0;
    } else {
        return 1;
    }
}
 
function sendMailAttachment($title, $content, $nTo, $mTo,$diachicc='',$file,$filename){
    $nFrom = "Dien dan tieng anh";    //mail duoc gui tu dau, thuong de ten cong ty ban
    $mFrom = 'prom.h1h2@gmail.com';  //dia chi email cua ban 
    $mPass = '112358xx';
    $mail             = new PHPMailer();
    $body             = $content;
    $mail->IsSMTP(); 
    $mail->CharSet   = "utf-8";
    $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;                    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";        
    $mail->Port       = 465;
    $mail->Username   = $mFrom;  // GMAIL username
    $mail->Password   = $mPass;               // GMAIL password
    $mail->SetFrom($mFrom, $nFrom);
    //chuyen chuoi thanh mang
    $ccmail = explode(',', $diachicc);
    $ccmail = array_filter($ccmail);
    if(!empty($ccmail)){
        foreach ($ccmail as $k => $v) {
            $mail->AddCC($v);
        }
    }
    $mail->Subject    = $title;
    $mail->MsgHTML($body);
    $address = $mTo;
    $mail->AddAddress($address, $nTo);
    $mail->AddReplyTo('vanni.2115@gmail.com', 'Dien dan tieng anh');
    $mail->AddAttachment($file,$filename);
    if(!$mail->Send()) {
        return 0;
    } else {
        return 1;
    }
}


?>
