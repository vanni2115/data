<?php
    session_start();
    if(!($_SESSION['username']=="admin")) {
        header("location:.././");
    }
    // <!--Xử lý thao tác xóa bài viết-->
    //Tạo kết nối đến CSDL
    include('../control/configure.php');
    //Truy vấn đến CSDL
    if(isset($_REQUEST['idarticle'])) {
        $idarticle=$_REQUEST['idarticle'];
        $sql="DELETE FROM article WHERE idarticle='{$idarticle}'";
        if(mysqli_query($con,$sql)) {
            echo "<br><p>Đã xóa thành công 1 bài viết trong danh sách!</p>";
        }else {
            echo "<br><p>Xóa không thành công: " .mysqli_error($con);
        }
        header("location:article.php");
    }
    //Đóng kết nối đến server
    mysqli_close($con);
?>
