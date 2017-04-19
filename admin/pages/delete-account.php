<?php
    session_start();
    if(!($_SESSION['username']=="admin")) {
        header("../../location:./");
    }
    // <!--Xử lý thao tác xóa thành viên-->
    //Tạo kết nối đến CSDL
    include('control/configure.php');
    //Truy vấn đến CSDL
    if(isset($_REQUEST['iduser'])) {
        $iduser=$_REQUEST['iduser'];
        $sql="DELETE FROM user WHERE iduser='{$iduser}'";
        if(mysqli_query($con,$sql)) {
            echo "<br><p>Đã xóa thành công 1 thành viên trong bảng user!</p>";
        }else {
            echo "<br><p>Xóa không thành công: " .mysqli_error($con);
        }
        header("location:account.php");
    }
    //Đóng kết nối đến server
    mysqli_close($con);
?>
