<?php
    session_start();
    if(empty($_SESSION['username'])) {
        header("location:./");
    }
    // <!--Xử lý thao tác xóa bài viết-->
    //Tạo kết nối đến CSDL
    include('control/configure.php');
    //Truy vấn đến CSDL
    if(isset($_REQUEST['iddictionary'])) {
        $iddictionary=$_REQUEST['iddictionary'];
        $sql="DELETE FROM dictionary WHERE iddictionary='{$iddictionary}'";
        if(mysqli_query($con,$sql)) {
            // header("Location:admin-post-article.php");
                //header('Refresh: 1; url=edit-article.php');
                ?>
                <script language="javascript">
                    alert("Đã xóa thành công từ điển");
                    window.location.href = "my-dictionary.php";
                </script>
                <?php
            
        }else {
            echo "<br><p>Xóa không thành công:</p> " .mysqli_error($con);
        }
    }
    //Đóng kết nối đến server
    mysqli_close($con);
?>
