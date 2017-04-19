<meta charset="utf-8">
<!-- user, topic, article, dictionary, tag, comment, message, role 
nhieu bai - nhieu tag
=> nhieu bai - 1 tag
nhieu tag - 1 bai
=> idtag, idarticle
-->
<?php
	//Tạo kết nối đến CSDL
	include('configure.php');
	//Truy vấn đến CSDL
	$sql1="CREATE TABLE IF NOT EXISTS topic (
		idtopic int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		nametopic varchar(100) COLLATE utf8_unicode_ci NOT NULL,
		state bit NOT NULL,
		link varchar(255) NOT NULL
	)ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
	$sql2="CREATE TABLE IF NOT EXISTS ditribute (
		idarticle int(10) NOT NULL,
		idtopic int(10) NOT NULL
		/*FOREIGN KEY (idarticle) REFERENCES article(idarticle)*/
		/*FOREIGN KEY (idtopic) REFERENCES topic(idtopic)*/
	)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
	
	$sql3="CREATE TABLE IF NOT EXISTS article (
		idarticle int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		tenarticle varchar(100) COLLATE utf8_unicode_ci NOT NULL,
		datepost timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		idtopic int(10) NOT NULL,
		/*tomtat varchar(1000) COLLATE utf8_unicode_ci NOT NULL,*/
		content text COLLATE utf8_unicode_ci NOT NULL
		/*FOREIGN KEY (idtopic) REFERENCES divisionarticle(idtopic)*/
	)ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";	
	$sql4="CREATE TABLE IF NOT EXISTS user (
		iduser int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		fullname varchar(50) COLLATE utf8_unicode_ci NOT NULL,
		username varchar(50) NOT NULL,
		password varchar(50) NOT NULL,
		address varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		/*dienthoai varchar(20) NOT NULL,*/
		email varchar(50) NOT NULL,
		about varchar(1000) COLLATE utf8_unicode_ci,
		dateregis timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		dateofbirth date NOT NULL,
		gender int(1) NOT NULL,
		idrole int(1)
		/*FOREIGN KEY (idrole) REFERENCES user(idrole)*/
		/*FOREIGN KEY (idrole) REFERENCES role(idrole)*/
	)ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
	$sql5="CREATE TABLE IF NOT EXISTS role (
		idrole int(10) NOT NULL PRIMARY KEY,
		namerole varchar(100) COLLATE utf8_unicode_ci NOT NULL
	)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";	
	$sql6="CREATE TABLE IF NOT EXISTS comment (
		idcomment int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		idarticle int(10) NOT NULL,
		datecomment timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		fullname varchar(50) COLLATE utf8_unicode_ci NOT NULL,
		content text COLLATE utf8_unicode_ci NOT NULL
		/*FOREIGN KEY (iduser) REFERENCES comment(iduser),
		FOREIGN KEY (idarticle) REFERENCES article(idarticle)*/
	)ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
	$sql7="CREATE TABLE IF NOT EXISTS message (
		idmessage int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		iduser int(10) NOT NULL,
		datemessage timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		fullname varchar(50) COLLATE utf8_unicode_ci NOT NULL,
		content text COLLATE utf8_unicode_ci NOT NULL
		/*FOREIGN KEY (iduser) REFERENCES user(iduser)*/
	)ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
	$sql8="CREATE TABLE IF NOT EXISTS dictionary (
		iddictionary int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		iduser int(10) NOT NULL,
		header varchar(200) NOT NULL,
		type varchar(50) NOT NULL,
		content text COLLATE utf8_unicode_ci NOT NULL
		/*FOREIGN KEY (iduser) REFERENCES user(iduser)*/
	)ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
	//Xử lý kết quả trả về
	if((mysqli_query($con,$sql1))&&(mysqli_query($con,$sql2))&&(mysqli_query($con,$sql3))&&(mysqli_query($con,$sql4))&&(mysqli_query($con,$sql5))&&(mysqli_query($con,$sql6))&&(mysqli_query($con,$sql7))&&(mysqli_query($con,$sql8))) {
		
			echo "<br>Đã tạo thành công bảng";
	}else{
		echo "<br>Không thể tạo bảng: " .mysqli_error($con);
	}
	//Đóng kết nối đến server
	mysqli_close($con);
?>