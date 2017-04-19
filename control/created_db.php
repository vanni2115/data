<meta charset="utf-8">
<?php
	//Tạo kết nối
	$host='localhost';
	$user='root';
	$pwd='';
	$con=mysqli_connect($host,$user,$pwd);
	//Kiểm tra kết nối
	if(mysqli_connect_errno($con)) {
		echo "Không thể kết nối đến CSDL: ".mysqli_connect_error($con);
	}else {
		echo "Đã kết nối thành công.";
	}
	//Tạo CSDL
	$sql="CREATE DATABASE IF NOT EXISTS forum";
	//Xử lý kết quả trả về
	if(mysqli_query($con,$sql)) {
		echo "<br>Đã tạo thành công CSDL";
	}else {
		echo "<br>Không thể tạo CSDL: ".mysql_error($con);
	}
	//Đóng kết nối đến server
	mysqli_close($con);
?>