
<?php
	session_start();
	unset($_SESSION['iduser'],$_SESSION['username'],$_SESSION['fullname'],$_SESSION['role']);
	?>
	    <script language="javascript">
	        history.back();
	    </script>
    <?php
?>