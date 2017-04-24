<?php
session_start();
    if(empty($_SESSION['username'])) {
        header("location:./");
    }
?>
<!DOCTYPE HTML>
<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="refresh" content="5400" />
        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />

        <meta http-equiv="Pragma" content="no-cache"/>
        <meta http-equiv="Expires" content="-1"/>
        <meta http-equiv="Cache-Control" content="no-cache"/>

        <meta name="keywords" content="Topics"/>
        <meta name="description" content="Topics"/>
        <meta name="robots" content="index, follow"  />
        <meta name="googlebot" content="index, follow">
        <meta name="revisit-after" content="1 days" />
        <meta name="generator" content="Topics" />
        <meta name="rating" content="General">

        <meta property="og:url" content=""> <!--url-->
        <meta property="og:description" content="Topics">
        <meta property="og:title" content="Topics">
        <meta property="og:image" content=""> <!--link img-->
        <meta property="og:site_name" content=""> <!--url-->
        <meta property="og:type" content="product" />
        <meta property="og:locale" content="vi_VN" />
        <meta itemprop="image" content=""> <!--link img-->

        <meta property="article:section" content="Topics" />
        <meta property="article:tag" content="Topics" />

        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="" />
        <meta name="twitter:title" content="Topics" />
        <meta name="twitter:description" content="Topics" />
        <meta name="twitter:image" content="" /> <!--link img-->
        <meta name="twitter:url" content="" /> <!--url-->

        <title>Tùy chỉnh tài khoản</title>

        <link rel="shortcut icon" type="image/x-icon" href=""/> <!--icon-->

        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="dist/css/style.css" type="text/css" rel="stylesheet" />
        <link href="dist/css/style-pop.css" rel="stylesheet" type="text/css">
        <link href="dist/css/animate.min.css" rel="stylesheet" type="text/css">

        <!-- Custom Fonts -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel='stylesheet' id='gfont-style-css'  href='http://fonts.googleapis.com/css?family=Roboto%3A100%2C300%2C300italic%2C400%2C400italic%2C500%2C700%2C900%7CRoboto+Slab%3A300%2C400%2C700%7CArapey%3A400%2C400italic%7CLobster%7CCinzel%7CPoiret+One%3A400%7CJosefin+Sans%3A400%7CDomine%3A400&#038;ver=4.4.5' type='text/css' media='all' />
        
        <!--css-->
    </head>

	<body class="cbp-spmenu-push">
        <?php 
            include("header.php");
            include("login.php");
            include("register.php");
        ?>
        <div class="container" style="z-index:1 !important;">
	        <div class="content-set panel panel-default">
			    <ul id="myTab" class="nav nav-tabs" role="tablist">
			      <li class="active"><a href="#profile" class="title-set" role="tab" data-toggle="tab">Thông tin cá nhân</a></li>
			      <li class=""><a href="#active" class="title-set" role="tab" data-toggle="tab">Hoạt động</a></li>
			      <li class=""><a href="#setting" class="title-set" role="tab" data-toggle="tab">Chỉnh sửa</a></li>
			    </ul>
			    <div id="myTabContent" class="tab-content">
			      <!-- Tab profile -->
			      <div class="tab-pane fade active in" id="profile">
			        <div class="row">
			        <?php
                        include("control/configure.php");
                        $sql = "SELECT * FROM user WHERE iduser = '{$_SESSION['iduser']}'";
                        $result = mysqli_query($con, $sql);
                        while($row=mysqli_fetch_array($result)){
                    ?>

					  <div class="col-xs-6 col-md-4 col-sm-4 col-md-push-1">
					    <a class="thumbnail">
					      <img src="upload/<?php echo $row['avatar'] ?>" data-src="holder.js/100%x180" alt="...">
					    </a>
					  </div>
					  <div class="col-xs-6 col-md-5 col-sm-8 col-md-push-1">
						<div class="name-set"><?php echo $row['fullname'] ?> <i style="color:blue;" class="fa <?php if($row['gender']==1){echo "fa-male";}else{echo "fa-female";} ?>" aria-hidden="true"></i></div>
						<div class="info"><i class="fa fa-birthday-cake" aria-hidden="true"></i>&nbsp;&nbsp; <?php echo $row['dateofbirth'] ?></div>
						<div class="info"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp; <?php echo $row['address'] ?></div>
						<div class="info"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp; Hoạt động 2 giờ trước</div>
					  </div>
					</div>

					<hr style="border-top:1px dotted #c5c5c5;">

					<div class="row" style="margin-top:40px;">
						<div class="col-md-10 col-md-push-1">
							<div class="form-control pre-scrollable" style="background:white !important;height:95px;"></div>
							<div class="about-me">Giới thiệu về bản thân</div>
							<p style="padding-left:10px;"><?php echo $row['about'] ?></p>
						</div>
					</div>
					<?php
                        }
                        mysqli_close($con);
                    ?>

					<hr style="border-top:1px dotted #c5c5c5;margin-top:120px;">

					<div class="row">
						<div class="col-md-10 col-md-push-1">
		                    <div class="panel panel-default" style="margin-top:20px;">
		                        <div class="panel-heading">
		                            <div class="panel-title"><a class="mess-me">Kết quả làm bài</a></div>
		                        </div>
		                        <div class="panel-body pre-scrollable">
		                        	<?php
                                    include("control/configure.php");
                                    $sql = "SELECT * FROM result, exam WHERE ((iduser='{$_SESSION['iduser']}') AND (result.idexam=exam.idexam)) ORDER BY datetest DESC";
                                    $result = mysqli_query($con, $sql);
                                    while($row=mysqli_fetch_array($result)){
                                    	echo "
                                    	<div class='row'>
				                        	<div class='col-md-9'>
				                        		<div><a class='title-set'>Bạn đã làm bài tập <b>" .$row['nameexam']. "</b></a></div>
				                        	</div>
				                        	<div class='col-md-3' style='font-size:12px;'>Vào lúc " .$row['datetest']. "</div>
				                        </div>
				                        <div class='row'>
				                        	<div class='col-md-9'>Đạt 
				                        		" .$row['score']. " điểm.
				                        	</div>
				                        </div>
				                        <hr style='border-top:1px dotted #c5c5c5;'>
                                    	";

                                    }
                                	mysqli_close($con);
                                    ?>
		                        	
		                        </div>
		                    </div>
						</div>
					</div>
			      </div>

			      <!-- Tab active -->
			      <div class="tab-pane fade" id="active">
			        <div class="row">
					  <?php
                        include("control/configure.php");
                        $sql = "SELECT * FROM user WHERE iduser = '{$_SESSION['iduser']}'";
                        $result = mysqli_query($con, $sql);
                        while($row=mysqli_fetch_array($result)){
                    	?>

					  <div class="col-xs-6 col-md-4 col-sm-4 col-md-push-1">
					    <a class="thumbnail">
					      <img src="upload/<?php echo $row['avatar'] ?>" data-src="holder.js/100%x180" alt="...">
					    </a>
					  </div>
					  <div class="col-xs-6 col-md-5 col-sm-8 col-md-push-1">
						<div class="name-set"><?php echo $row['fullname'] ?> <i style="color:blue;" class="fa <?php if($row['gender']==1){echo "fa-male";}else{echo "fa-female";} ?>" aria-hidden="true"></i></div>
						<div class="info"><i class="fa fa-birthday-cake" aria-hidden="true"></i>&nbsp;&nbsp; <?php echo $row['dateofbirth'] ?></div>
						<div class="info"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp; <?php echo $row['address'] ?></div>
						<div class="info"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp; Hoạt động 2 giờ trước</div>
					  </div>
					</div>
					<?php
                        }
                        mysqli_close($con);
                    ?>

					<hr style="border-top:1px dotted #c5c5c5;">

					<div class="row" style="margin-top:30px;">
						<div class="col-md-10 col-md-push-1">
		                    <div class="panel panel-default" style="margin-top:20px;">
		                        <div class="panel-heading">
		                            <div class="panel-title"><a class="mess-me">Thông báo và Hoạt động của bạn</a></div>
		                        </div>
		                        <div class="panel-body pre-scrollable">
		                        	<?php
                                    include("control/configure.php");
                                    $sql = "SELECT * FROM noti WHERE ((iduser='{$_SESSION['iduser']}') AND (idarticle != 0)) ORDER BY dateaction DESC";
                                    $result = mysqli_query($con, $sql);
                                    while($row=mysqli_fetch_array($result)){
                                    	echo "
                                    	<div class='row'>
				                        	<div class='col-md-9'>
				                        		<div><a class='title-set'>" .$row['action']. " <a class='title-set'>của bạn</a></a></div>
				                        	</div>
				                        	<div class='col-md-3' style='font-size:12px;'>Vào lúc " .$row['dateaction']. "</div>
				                        </div>
				                        <div class='row'>
				                        	<div class='col-md-9'>
				                        		" .$row['content']. "
				                        	</div>
				                        </div>
				                        <hr style='border-top:1px dotted #c5c5c5;'>
                                    	";
                                    }
                                	mysqli_close($con);
                                    ?>
		                        	
		                        </div>
		                    </div>
						</div>
					</div>

					<hr style="border-top:1px dotted #c5c5c5;">

					<div class="row" style="margin-top:30px;">
						<div class="col-md-10 col-md-push-1">
		                    <div class="panel panel-default" style="margin-top:20px;">
		                        <div class="panel-heading">
		                            <div class="panel-title"><a class="mess-me">Thông báo và Hoạt động liên quan</a></div>
		                        </div>
		                        <div class="panel-body pre-scrollable">
		                        	<?php
                                    include("control/configure.php");
                                    $sql = "SELECT idarticle FROM noti WHERE ((iduser='{$_SESSION['iduser']}') AND (idarticle != 0))";
                                    $result = mysqli_query($con, $sql);
                                    while($row=mysqli_fetch_array($result)){
                                    	$sql1 = "SELECT * FROM noti WHERE ((idarticle='{$row['idarticle']}') AND (idarticle != 0) AND (iduser !='{$_SESSION['iduser']}') AND (myself != 1)) ORDER BY dateaction DESC";
	                                    $result1 = mysqli_query($con, $sql1);
	                                    while($row1=mysqli_fetch_array($result1)){
	                                    	echo "
	                                    	<div class='row'>
					                        	<div class='col-md-9'>
					                        		<div><a class='title-set'>" .$row1['action']. " <a class='title-set'>của thành viên khác</a></a></div>
					                        	</div>
					                        	<div class='col-md-3' style='font-size:12px;'>Vào lúc " .$row1['dateaction']. "</div>
					                        </div>
					                        <div class='row'>
					                        	<div class='col-md-9'>
					                        		" .$row1['content']. "
					                        	</div>
					                        </div>
					                        <hr style='border-top:1px dotted #c5c5c5;'>
	                                    	";
	                                    }
                                    }
                                    // hien thi hoat dong cua nguoi khac lien quan: tao them field idarticle, select cac ban ghi idarticle giong nhau va 
                                	mysqli_close($con);
                                    ?>
		                        	
		                        </div>
		                    </div>
						</div>
					</div>
			      </div>

			      <!-- Tab setting -->
			      <div class="tab-pane fade" id="setting">
					<div class="row">
						<div class="col-md-10 col-md-push-1">
							<form id="change" name="regis" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
							<!-- ava -->
						        <div class="row">
								  <div class="col-md-7 col-sm-8 col-xs-8 col-md-push-3 col-ms-push-2 col-xs-push-2">
							  		<?php
			                            include("control/configure.php");
			                            $sql = "SELECT * FROM user WHERE iduser = '{$_SESSION['iduser']}'";
			                            $result = mysqli_query($con, $sql);
			                            while($row=mysqli_fetch_array($result)){
										?>
									  <div id="img-upload-form" class="thumbnail" onmouseover="mouseOver()" onmouseout="mouseOut()">
										<img id="logo-img" onclick="document.getElementById('add-new-logo').click();" src="upload/<?php echo $row['avatar'] ?>" />
										<div id="hover-ava" style="z-index:1;position:relative;display:none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; Cập nhật ảnh đại diện<input type="file" id="add-new-logo" style="opacity:0;z-index:2;margin-top:-18px;position:relative;cursor:pointer;" class="center-block" name="avatar" accept="image/*" onchange="addNewLogo(this)"/></div>
										
									  </div>
									  
								  </div>
								</div>
								<!-- thong tin khac -->
		                        <div class="form-group row">
		                            <label for="fullname" class="col-md-3 control-label">Họ và tên</label>
		                            <div class="col-md-9">
		                                <input class="form-control" type="text" value="<?php echo $row['fullname'] ?>" name="fullname2" id="fullname2" onblur="return check_fullname2()";>
		                                <div id="fullname_response2" style="display:none;"></div>
		                            </div>
		                        </div>

		                        <div class="form-group row">
		                            <label for="username" class="col-md-3 control-label">Tên đăng nhập</label>
		                            <div class="col-md-9">
		                                <input class="form-control" type="text" name="username2" value="<?php echo $row['username'] ?>" id="username2" readonly="readonly">
		                            </div>
		                        </div>

		                        <div class="form-group row">
		                            <label for="password" class="col-md-3 control-label">Mật khẩu</label>
		                            <div class="col-md-6">
		                                <input class="form-control" type="password" value="<?php echo $row['password'] ?>" name="password2" id="password2" readonly="readonly">
		                            </div>
		                            <div class="col-md-3" style="padding-top:5px;">
		                            	<i><a href="change-password.php"><u>Thay đổi mật khẩu</u></a></i>
		                            </div>
		                        </div>

			                    <div class="form-group row">
		                            <label for="gioitinh" class="col-md-3 control-label">Giới tính</label>
		                            <div class="col-md-9">
		                            	<?php
			                            	if($row['gender']==1){
	                                            echo "<label class='radio-inline'>
														<input type='radio' name='gioitinh' id='gtinh1' value='1' checked> Nam
													</label>
													<label class='radio-inline'>
														<input type='radio' name='gioitinh' id='gtinh2' value='0'> Nữ
													</label>";
	                                        }else{
	                                            echo "<label class='radio-inline'>
														<input type='radio' name='gioitinh' id='gtinh1' value='1'> Nam
													</label>
													<label class='radio-inline'>
														<input type='radio' name='gioitinh' id='gtinh2' value='0' checked> Nữ
													</label>";
	                                        }
		                            	?>
		                            </div>
			                    </div>

		                        <div class="form-group row">
		                            <label for="ngaysinh" class="col-md-3 control-label">Ngày sinh</label>
		                            <div class="col-md-9">
										  <input class="form-control" value="<?php echo $row['dateofbirth'] ?>" type="date" name="ngaysinh" id="ngaysinh" min="1950-01-01">
		                            </div>
			                    </div>

		                        <div class="form-group row">
		                            <label for="address" class="col-md-3 control-label">Địa chỉ</label>
		                            <div class="col-md-9">
		                                <!-- <input class="form-control" type="text" name="address" id="address"> -->
		                                <select class="form-control" name="address" id="address" size="1">
	                                    	<option value="">--Chọn tỉnh của bạn-- </option>
	                                        <option value="An Giang">An Giang </option>
	                                        <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu </option>
	                                        <option value="Bắc Cạn">Bắc Cạn </option>
	                                        <option value="Bắc Giang">Bắc Giang </option>
	                                        <option value="Bắc Ninh">Bắc Ninh </option>
	                                        <option value="Bạc Liêu">Bạc Liêu </option>
	                                        <option value="Bến Tre">Bến Tre </option>
	                                        <option value="Bình Dương">Bình Dương </option>
	                                        <option value="Bình Phước">Bình Phước </option>
	                                        <option value="Bình Thuận">Bình Thuận </option>
	                                        <option value="Bình Định">Bình Định </option>
	                                        <option value="Cao Bằng">Cao Bằng </option>
	                                        <option value="Cà Mau">Cà Mau </option>                                    
	                                        <option value="Cần Thơ">Cần Thơ </option>                                    
	                                        <option value="Gia Lai">Gia Lai </option>                                    
	                                        <option value="Hà Giang">Hà Giang </option>                                    
	                                        <option value="Hà Nam">Hà Nam </option>                                    
	                                        <option value="Hà Nội">Hà Nội </option>                                    
	                                        <option value="Hà Tĩnh">Hà Tĩnh </option>                                    
	                                        <option value="Hải Dương">Hải Dương </option>                                    
	                                        <option value="Hải Phòng">Hải Phòng </option>                                    
	                                        <option value="Hậu Giang">Hậu Giang </option>                                    
	                                        <option value="Hòa Bình">Hòa Bình </option>                                    
	                                        <option value="Hưng Yên">Hưng Yên </option>                                    
	                                        <option value="Khánh Hòa">Khánh Hòa </option>                                    
	                                        <option value="Kiên Giang">Kiên Giang </option>                                    
	                                        <option value="Kon Tum">Kon Tum </option>                                    
	                                        <option value="Lai Châu">Lai Châu </option>                                    
	                                        <option value="Lâm Đồng">Lâm Đồng </option>                                    
	                                        <option value="Lào Cai">Lào Cai </option>                                    
	                                        <option value="Lạng Sơn">Lạng Sơn </option>                                    
	                                        <option value="Long An">Long An </option>                                    
	                                        <option value="Nam Định">Nam Định </option>                                    
	                                        <option value="Nghệ An">Nghệ An </option>                                    
	                                        <option value="Ninh Bình">Ninh Bình </option>                                    
	                                        <option value="Ninh Thuận">Ninh Thuận </option>                                    
	                                        <option value="Phú Thọ">Phú Thọ </option>                                    
	                                        <option value="Phú Yên">Phú Yên </option>                                    
	                                        <option value="Quảng Bình">Quảng Bình </option>                                    
	                                        <option value="Quảng Nam">Quảng Nam </option>                                    
	                                        <option value="Quảng Ngãi">Quảng Ngãi </option>                                    
	                                        <option value=">Quảng Ninh">Quảng Ninh </option>                                    
	                                        <option value="Quảng Trị">Quảng Trị </option>                                    
	                                        <option value="12051">Sơn La </option>                                    
	                                        <option value="12050">Sóc Trăng </option>                                    
	                                        <option value="12052">Tây Ninh </option>                                    
	                                        <option value="Thanh Hóa">Thanh Hóa </option>                                    
	                                        <option value="12053">Thái Bình </option>                                    
	                                        <option value="12054">Thái Nguyên </option>                                    
	                                        <option value="12056">Thừa Thiên Huế </option>                                    
	                                        <option value="12057">Tiền Giang </option>                                    
	                                        <option value="Tp. Hồ Chí Minh">Tp. Hồ Chí Minh </option>                                 
	                                        <option value="12059">Trà Vinh </option>                                    
	                                        <option value="12060">Tuyên Quang </option>                                    
	                                        <option value="12061">Vĩnh Long </option>                                    
	                                        <option value="12062">Vĩnh Phúc </option>                                    
	                                        <option value="12063">Yên Bái </option>                                    
	                                        <option value="12016">Đăk Lăk </option>                                    
	                                        <option value="12017">Đăk Nông </option>                                    
	                                        <option value="12015">Đà Nẵng </option>                                    
	                                        <option value="12018">Điện Biên </option>                                    
	                                        <option value="Đồng Nai">Đồng Nai </option>                                    
	                                        <option value="Đồng Tháp">Đồng Tháp </option>
	                                    </select>
		                            </div>
		                        </div>

		                        <div class="form-group row">
		                            <label for="email" class="col-md-3 control-label">Email</label>
		                            <div class="col-md-9">
		                                <input class="form-control" type="text" name="email" id="email" value="<?php echo $row['email'] ?>" onblur="return check_email()";>
		                                <div id="email_response" style="display:none;"></div>
		                            </div>
		                        </div>

		                        <div class="form-group row">
		                            <label for="about" class="col-md-3 control-label">Giới thiệu về bản thân</label>
		                            <div class="col-md-9">
		                                <textarea class="form-control pre-scrollable" name="about" id="about" style="resize:none;height:95px;"><?php echo $row['about'] ?></textarea>
		                            </div>
		                        </div>

		                        <button type="submit" class="btn btn-pop center-block" value="edit" name="btnEdit" id="btnEdit"><b>Lưu lại</b></button>
				            </form>
							<?php
							}
                                mysqli_close($con);
                            ?>
		            	</div>
		            </div>
		            <?php
                        //Tạo kết nối đến CSDL
                        include('control/configure.php');
                        //Truy vấn đến CSDL
                        if(isset($_REQUEST['fullname2'])&&isset($_REQUEST['email'])&&isset($_REQUEST['ngaysinh'])&&isset($_REQUEST['btnEdit'])) {
                            if($_REQUEST['fullname2']!=""){
                                // $fullname=$_REQUEST['fullname2'];
                                // $email=$_REQUEST['email'];
                                // $ngaysinh=$_REQUEST['ngaysinh'];
                                // $about=$_REQUEST['about'];
                                // $address=$_REQUEST['address'];
                                // $gioitinh=$_REQUEST['gioitinh'];
                                // Nếu người dùng có chọn file để upload
						        if (isset($_FILES['avatar']['name'])){
						            // Nếu file upload không bị lỗi,
						            // Tức là thuộc tính error > 0
						            $varFileName=$_FILES['avatar']['name'];
									$varSize=$_FILES['avatar']['size'];
									$varTemp=$_FILES['avatar']['tmp_name'];
									$varType=$_FILES['avatar']['type'];
									$varExt=$FILES['avatar']['Extend'];
									$varUploadDir="./upload/";
									$varUploadFile=$varUploadDir.$varFileName;
						            $sql="UPDATE user SET fullname='{$_REQUEST['fullname2']}', email='{$_REQUEST['email']}', dateofbirth='{$_REQUEST['ngaysinh']}', address='{$_REQUEST['address']}', about='{$_REQUEST['about']}', gender='{$_REQUEST['gioitinh']}', avatar='$varFileName' WHERE iduser = '{$_SESSION['iduser']}'";
                                    if(mysqli_query($con,$sql)) {
                                    // header("Location:admin-post-article.php");
                                        //header('Refresh: 1; url=edit-article.php');
                                        ?>
                                        <script language="javascript">
                                            alert("Đã sửa thành công thông tin tài khoản");
                                            window.location.href = "profile.php?iduser=<?php echo $_SESSION['iduser']; ?>";
                                        </script>
                                        <?php
                                    
	                                }else {
	                                    echo "<br><p>Sửa không thành công:</p> " .mysqli_error($con);
	                                }
						            if ($_FILES['avatar']['error'] > 0)
						            {
						                echo 'File Upload Bị Lỗi';
						            }else{
						                // Upload file
						                move_uploaded_file($_FILES['avatar']['tmp_name'], './upload/'.$_FILES['avatar']['name']);
						                // echo 'File Uploaded';
						            }
						        }else{
                                $sql="UPDATE user SET fullname='{$_REQUEST['fullname2']}', email='{$_REQUEST['email']}', dateofbirth='{$_REQUEST['ngaysinh']}', address='{$_REQUEST['address']}', about='{$_REQUEST['about']}', gender='{$_REQUEST['gioitinh']}' WHERE iduser = '{$_SESSION['iduser']}'";
                                    if(mysqli_query($con,$sql)) {
                                    // header("Location:admin-post-article.php");
                                        //header('Refresh: 1; url=edit-article.php');
                                        ?>
                                        <script language="javascript">
                                            alert("Đã sửa thành công thông tin tài khoản");
                                            window.location.href = "profile.php?iduser=<?php echo $_SESSION['iduser']; ?>";
                                        </script>
                                        <?php
                                    
                                }else {
                                    echo "<br><p>Sửa không thành công:</p> " .mysqli_error($con);
                                }
                            }
                            }else {
                                echo "<br><p>Không để trống <b>họ tên</b>";
                            }
                        }
						//Đóng kết nối đến server
                        mysqli_close($con);
                        // Nếu người dùng click Upload
					    // if (isset($_POST['btnEdit']))
					    // {
					        
					    // }
                    ?>
			      </div>
			    </div>
	        </div>
        </div>
        <script type="text/javascript">
        	// change ava UI
            function mouseOver() {
                document.getElementById("hover-ava").className="up-ava";
                document.getElementById("hover-ava").style.display="";
            }

            function mouseOut() {
                document.getElementById("hover-ava").className="none";
                document.getElementById("hover-ava").style.display="none";
            }
            var addNewLogo = function(input){
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        //Hiển thị ảnh vừa mới upload lên
                        $('#logo-img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                    //submit form để upload ảnh
                    // $('#img-upload-form').submit();
                }
            }
        </script>
        
        <?php 
	        include("footer.php");
	    ?>
<!-- jQuery -->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="dist/js/jquery-3.1.1.min.js"></script>
    <!-- <script src="dist/js/jquery-1.8.2.min.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Angular -->
    <script src="dist/js/angular.min.js"></script>
    <script src="dist/js/angular-route.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/style.js"></script>
    <script src="dist/js/wow.min.js"></script>
    <script src="dist/js/move-top.js"></script>
    <script src="dist/js/easing.js"></script>

    <!-- tinymce -->
    <script src="tinymce/tinymce.min.js" type="text/javascript"></script>
    <script>
     new WOW().init();
    </script>
    <!--javascript-->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){     
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>

    <script type="text/javascript">
      $(document).ready(function() {      
        $().UItoTop({ easingType: 'easeOutQuart' });
                  
        });
    </script>        

    </body>