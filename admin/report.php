<?php
    session_start();
    if(empty($_SESSION['username'])) {
        // header("location:./");
        // $_SERVER['HTTP_REFERER'];
    }
    // <!--Xử lý thao tác report bai viet, comment-->
    //Tạo kết nối đến CSDL
    include('control/configure.php');
    include("simple_html_dom.php");
    // xu ly cat chuoi toan ven
    function words($str,$num)
    {
        $limit = $num - 1 ;
        $str_tmp = '';
         $str = str_replace(']]>', ']]&gt;', $str);
         $str = strip_tags($str);
        $arrstr = explode(" ", $str);
        if ( count($arrstr) <= $num ) { return $str; }
        if (!empty($arrstr))
        {
            for ( $j=0; $j< count($arrstr) ; $j++)    
            {
                $str_tmp .= " " . $arrstr[$j];
                if ($j == $limit) 
                {
                    break;
                }
            }
        }
        return $str_tmp."...";
    }
    if(isset($_GET['idcomment'])) {
        $idcomment=$_GET['idcomment'];
        $sql = "SELECT * FROM comment, user, article WHERE ((idcomment='{$_REQUEST['idcomment']}') AND (comment.iduser = user.iduser) AND (comment.idarticle = article.idarticle))";
        $result = mysqli_query($con, $sql);
        while($row=mysqli_fetch_array($result)){
            $idusersend = $_SESSION['iduser'];
            $fullnamesend = $_SESSION['fullname'];
            $idusercmt = $row['iduser'];
            $fullname = $row['fullname'];
            $myself = 0;
            $small = $row['contentcomment'];
            $html = str_get_html($small)->plaintext;
            $rutgon = words($html, 10);
            $idarticle = 0;
            $idarticle2 = $row['idarticle'];;
            $content_noti = "Thành viên <a href='profile.php?iduser=".$idusersend."' style='color:black;'>".$fullnamesend."</a> báo cáo có vi phạm trong bình luận của thành viên <a href='profile.php?iduser=".$idusercmt."' style='color:black;'>".$fullname."</a><br>Trong bài: <a href='article.php?idtopic=".$row['idtopic']."&idarticle=".$row['idarticle']."' style='color:black;'>".$row['namearticle']."</a>";
            $content_noti_str = mysql_real_escape_string($content_noti);
            $content_noti2 = "Bạn đã báo cáo bình luận của thành viên <a href='profile.php?iduser=".$idusercmt."' style='color:black;'>".$fullname."</a><br>Trong bài: <a href='article.php?idtopic=".$row['idtopic']."&idarticle=".$row['idarticle']."' style='color:black;'>".$row['namearticle']."</a>";
            $content_noti_str2 = mysql_real_escape_string($content_noti2);

            $sql1="INSERT INTO noti(iduser,idarticle,myself,content,action) VALUES ('{$idusersend}','{$idarticle}','{$myself}','{$rutgon}','{$content_noti_str}') , ('{$idusersend}','{$idarticle2}','1','{$rutgon}','{$content_noti_str2}')";

            $sql2 = "DELETE FROM noti WHERE action= '{$content_noti_str}' LIMIT 1";
            $sql3 = "DELETE FROM noti WHERE action= '{$content_noti_str2}' LIMIT 1";

            $result1 = mysqli_query($con, $sql2);
            $result1 = mysqli_query($con, $sql3);
            if(mysqli_query($con,$sql1)) {
                // header("Location:admin-post-article.php");
                    //header('Refresh: 1; url=edit-article.php');
                    ?>
                    <script language="javascript">
                        alert("Đã báo cáo thành công bình luận của thành viên khác.");
                        history.back();
                    </script>
                    <?php
                
            }else {
                echo "<br><p>Báo cáo vi phạm không thành công:</p> " .mysqli_error($con);
            }
        }
    }
    //Đóng kết nối đến server
    mysqli_close($con);
?>
