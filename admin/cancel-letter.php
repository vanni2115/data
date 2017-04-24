<?php
    session_start();
    // if(empty($_SESSION['username'])) {
    //     header("location:./");
    // }
    // <!--Xử lý thao tác xóa bài viết-->
    //Tạo kết nối đến CSDL
    include('control/configure.php');
    //Truy vấn đến CSDL
    if(!empty($_GET['code']) && isset($_GET['code'])) {

        $code=mysql_real_escape_string($_GET['code']);
        $c=mysqli_query($con,"SELECT id FROM letter WHERE activation_letter='$code'");
        if(mysqli_num_rows($c) == 1){
            mysqli_query($con,"DELETE FROM letter WHERE activation_letter='$code'");
            ?>
            <script language="javascript">
                alert("Bạn đã hủy đăng ký nhận thông tin từ website của chúng tôi.");
                window.location.href = "./";
            </script>
            <?php
        }else{
            ?>
            <script language="javascript">
                alert("Mã xác nhận không đúng. Hủy đăng ký nhận thông tin không thành công.");
                window.location.href = "./";
            </script>
            <?php
        }
    }
    //Đóng kết nối đến server
    mysqli_close($con);
?>
