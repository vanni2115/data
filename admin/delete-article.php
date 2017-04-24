<?php
    session_start();
    if(empty($_SESSION['username'])) {
        header("location:./");
    }
    // <!--Xử lý thao tác xóa bài viết-->
    //Tạo kết nối đến CSDL
    include('control/configure.php');
    //Truy vấn đến CSDL
    if(isset($_REQUEST['idarticle'])) {
        $idarticle=$_REQUEST['idarticle'];
        $sql="DELETE FROM article WHERE idarticle='{$idarticle}'";
        if(mysqli_query($con,$sql)) {
            // header("Location:admin-post-article.php");
                //header('Refresh: 1; url=edit-article.php');
                ?>
                <script language="javascript">
                    alert("Đã xóa thành công bài viết");
                    window.location.href = "post-article.php";
                </script>
                <?php
            
        }else {
            echo "<br><p>Xóa không thành công:</p> " .mysqli_error($con);
        }
    }
    //Đóng kết nối đến server
    mysqli_close($con);
?>
