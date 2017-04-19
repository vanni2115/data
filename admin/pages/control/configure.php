<meta charset="utf-8">
<?php
	//Tạo kết nối đến CSDL
	$host='localhost';
	$user='root';
	$pwd='';
	$db='forum';
	$con=mysqli_connect($host,$user,$pwd,$db);
	//Kiểm tra kết nối
	if(mysqli_connect_errno($con)) {
		echo "Không thể kết nối đến CSDL: ".mysqli_connect_error($con);
	}
?>