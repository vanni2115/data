<?php
    session_start();
    if(empty($_SESSION['username'])) {
        header("location:./");
    }
    // <!--Xử lý thao tác xóa bài viết-->
    //Tạo kết nối đến CSDL
    include('control/configure.php');
    //Truy vấn đến CSDL
    if(isset($_REQUEST['idcomment'])) {
        $idcomment=$_REQUEST['idcomment'];
        $sql2 = "SELECT datecomment FROM comment WHERE idcomment='{$idcomment}'";
        $result = mysqli_query($con, $sql2);
        while($row=mysqli_fetch_array($result)){
            $datenoti = $row['datecomment'];

            $sql="DELETE FROM comment WHERE idcomment='{$idcomment}'";
            $sql1="DELETE FROM noti WHERE dateaction='$datenoti'";
            if(mysqli_query($con,$sql) AND mysqli_query($con,$sql1)) {
                // header("Location:admin-post-article.php");
                    //header('Refresh: 1; url=edit-article.php');
                    ?>
                    <script language="javascript">
                        alert("Đã xóa thành công bình luận của bạn.");
                        history.load();
                    </script>
                    <?php
                
            }else {
                echo "<br><p>Xóa không thành công:</p> " .mysqli_error($con);
            }
        }
    }
    //Đóng kết nối đến server
    mysqli_close($con);
?>
