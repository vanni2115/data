<script>
   window.fbAsyncInit = function() {
    FB.init({
      appId      : '137484120122691',
      cookie     : true,  // cho phep sd cookies de thuc hien 
      xfbml      : true, // cho phep phan tich cu phap plugin
      version    : 'v2.9'
    });

  // (function(d, s, id){
  //    var js, fjs = d.getElementsByTagName(s)[0];
  //    if (d.getElementById(id)) {return;}
  //    js = d.createElement(s); js.id = id;
  //    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=137484120122691";
  //    fjs.parentNode.insertBefore(js, fjs);
  //  }(document, 'script', 'facebook-jssdk'));
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  function login() {
    FB.login(function(response){
        if (response.status === 'connected') {
            document.getElementById('status').innerHTML = "we are connected";
        } else if (response.status === 'not_authorized') {
            document.getElementById('status').innerHTML = "We are not logged in";
        } else {
            document.getElementById('status').innerHTML = "we are not logged into facebook";
        }
    }, {scrope: 'email'});
};
</script>

<?php
  include('control/configure.php');
  ?>

<script type="text/javascript">
  function getInfo() {
    FB.api('/me', 'GET', {fields: 'name,id,email,picture.width(150).height(150)'}, function(response) {
        document.getElementById('status').innerHTML = response.id;
        // <?php $idfb ?> = response.id;
        // <?php $fullname ?> = response.name;
        // <?php $email ?> = response.email;
        // <?php $avatar ?> = response.picture.data.url;
        var $idfb = response.id;
        var $fullname = response.name;
        var $email = response.email;
        var $avatar = response.picture.data.url;
        <?php
          
          echo $fullname;


          // neu chon ok thi update username, avatar, fullname len db
          // gui username, iduser, role, fullname len SESSIOn


        ?>
        
        // document.getElementById('status').innerHTML = console.log(response);
        // document.getElementById('status').innerHTML = response.picture.data.url;

    });
};

// dong bo tai khoan
function syncInfo() {
  <?php
    // dong bo thong tin user
    mysqli_query($con,"UPDATE user SET fullname='$fullname', avatar='$avatar',  WHERE email = '$email'");
    $_SESSION['iduser'] = $idfb;
            $_SESSION['role'] = $idrole;
            $_SESSION['username'] = $email;
            $_SESSION['fullname'] = $fullname;

  ?>
}


</script>

  <?php
  // kiem tra trong db da co email chua
          $sql = "SELECT iduser FROM user WHERE email = '{$email}'";
          $query = mysqli_query($con,$sql);
          $num_rows = mysqli_num_rows($query);
          // neu ko co email giong
          if ($num_rows==0) {
          // tien hanh dang ky moi
            $idrole = 1;
            // insert vao db  fbid, fullname = fbname, email =fbemail, avatar
            mysqli_query($con,"INSERT INTO user(email,fullname,avatar,idrole,idfb) VALUES('$email','$fullname','$avatar','$idrole','$idfb')");
            $_SESSION['iduser'] = $idfb;
            $_SESSION['role'] = $idrole;
            $_SESSION['username'] = $email;
            $_SESSION['fullname'] = $fullname;

          } else {
          // neu co email giong thong bao voi user
            echo "Bạn đã sử dụng email ".$email." để đăng ký tài khoản.<br />Chúng tôi sẽ đồng bộ thông tin giúp bạn nếu bạn chọn Đồng ý.<br />Hoặc bạn cần dùng tài khoản Facebook khác để sử dụng website";
            echo "<button class='btn btn-default btn-pop center-block' onclick='syncInfo()'>Đồng ý</button>";
          }
?>

<script type="text/javascript">
// get info user
function getInfo() {
    FB.api('/me', 'GET', {fields: 'name,id,email,picture.width(150).height(150)'}, function(response) {
        document.getElementById('status').innerHTML = response.id;
        <?php $idfb ?> = response.id;
        <?php $fullname ?> = response.name;
        <?php $email ?> = response.email;
        <?php $avatar ?> = response.picture.data.url;
        <?php echo $fullname; ?>

        <?php
          include('control/configure.php');
          // kiem tra trong db da co email chua
          $sql = "SELECT iduser FROM user WHERE email = '{$email}'";
          $query = mysqli_query($con,$sql);
          $num_rows = mysqli_num_rows($query);
          // neu ko co email giong
          if ($num_rows==0) {
          // tien hanh dang ky moi
            $idrole = 1;
            // insert vao db  fbid, fullname = fbname, email =fbemail, avatar
            mysqli_query($con,"INSERT INTO user(email,fullname,avatar,idrole,idfb) VALUES('$email','$fullname','$avatar','$idrole','$idfb')");
            $_SESSION['iduser'] = $idfb;
            $_SESSION['role'] = $idrole;
            $_SESSION['username'] = $email;
            $_SESSION['fullname'] = $fullname;

          } else {
          // neu co email giong thong bao voi user
            echo "Bạn đã sử dụng email ".$email." để đăng ký tài khoản.<br />Chúng tôi sẽ đồng bộ thông tin giúp bạn nếu bạn chọn Đồng ý.<br />Hoặc bạn cần dùng tài khoản Facebook khác để sử dụng website";
            echo "<button class='btn btn-default btn-pop center-block' onclick='syncInfo()'>Đồng ý</button>";
          }


          // neu chon ok thi update username, avatar, fullname len db
          // gui username, iduser, role, fullname len SESSIOn


        ?>
        
        // document.getElementById('status').innerHTML = console.log(response);
        // document.getElementById('status').innerHTML = response.picture.data.url;

    });
};

// dong bo tai khoan
function syncInfo() {
  <?php
    // dong bo thong tin user
    mysqli_query($con,"UPDATE user SET fullname='$fullname', avatar='$avatar',  WHERE email = '$email'");
    $_SESSION['iduser'] = $idfb;
            $_SESSION['role'] = $idrole;
            $_SESSION['username'] = $email;
            $_SESSION['fullname'] = $fullname;

  ?>
}
</script>

<?php
  // session_start();
  //Tạo kết nối đến CSDL
  include('control/configure.php');
  $msg = '';   
  //Truy vấn đến CSDL
      $username = $_REQUEST['username'];
      $password = $_REQUEST['password'];
      $sql = "SELECT * FROM user WHERE username = '{$username}' AND password = (md5('{$password}'))";
      $query = mysqli_query($con,$sql);
      $num_rows = mysqli_num_rows($query);
      if ($num_rows==0) {
          $msg = "Tên đăng nhập hoặc mật khẩu không đúng!";
      }
      while ($row = mysqli_fetch_array($query)){  
          //Kiểm tra thành viên hợp lệ không
          if($row['state']=='0'){
              $msg = "Tài khoản của bạn chưa được kích hoạt, vui lòng xác nhận qua email mà bạn đã đăng ký.";
          }else{
              //Đưa vào 1 mảng $row
              $_SESSION['iduser'] = $row['iduser'];
              $_SESSION['role'] = $row['idrole'];
              $_SESSION['username'] = $row['username'];
              $_SESSION['fullname'] = $row['fullname'];
              ?>
              <script language="javascript">
                  history.back();
              </script>
              <?php
          }
          
      }
      unset($row,$sql);
      //Bước 4: Đóng kết nối đến server
  mysqli_close($con);
?>
<!-- dang nhap -->
<div class="modal fade" id="myModal-log" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content boxRegis">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <legend>Đăng nhập</legend>
        <div class="text-pop"><i>Chưa có tài khoản? <a href="" data-toggle="modal" data-target="#myModal-res" data-dismiss="modal"><u>Đăng ký</u></a></i></div>
      </div>

      <div class="modal-body">
      <form class="" id="login" action="login-noti.php" name="login" method="POST" onSubmit="javascript:return validate1();">
        <div class="row">
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-5">
                    <label for="username" class="control-label">Tên đăng nhập</label>
                </div>
                <div class="col-md-7">
                    <input class="form-control" type="text" name="username" id="username1" value="Tên đăng nhập..." autocomplete="off" onfocus="if (this.value == 'Tên đăng nhập...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Tên đăng nhập...'}; if (this.value == 'Tên đăng nhập...') {document.getElementById('username_response1').style.display='none'}" onkeyup="return check_username1()">
                    <div id="username_response1" style="display:none;"></div>
                </div>
              </div>
              <div class="row">
                  <div class="col-md-5">
                      <label for="password" class="control-label">Mật khẩu</label>
                  </div>
                  <div class="col-md-7">
                      <input class="form-control" type="text" name="password" value="Mật khẩu..." id="password1" onfocus="this.type = 'password'; if (this.value == 'Mật khẩu...') {this.value = ''}" onblur="if (this.value == '') {this.value = 'Mật khẩu...';this.type = 'text'}; if (this.value == 'Mật khẩu...') {document.getElementById('password_response1').style.display='none'}" onkeyup="return check_password1()";>
                    <div id="password_response1" style="display:none;"></div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-7 col-md-offset-5"><i><a href="reset-password.php"><u>Quên mật khẩu?</u></a></i></div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="row">
                <div class="col-xs-10 col-sm-11 col-xs-offset-1">
                    <button class="btn btn-block btn-social btn-facebook">
                        <i class="fa fa-facebook"></i> Facebook
                    </button>
                    <!-- <div class="fb-login-button" data-width="150" data-max-rows="1" data-size="medium" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="true" data-use-continue-as="false"></div> -->

                    <!-- <button class="btn btn-block btn-social btn-facebook fb-login-button"  data-button-type="login_with" data-show-faces="false" data-auto-logout-link="true" data-use-continue-as="false">
                        <i class="fa fa-facebook"></i> Facebook
                    </button> -->
                </div>
                <div class="col-xs-10 col-sm-11 col-xs-offset-1">
                    <button class="btn btn-block btn-social btn-google-plus">
                        <i class="fa fa-google-plus"></i> Google
                    </button>
                </div>
              </div>
              
            </div>
        </div>
        <button type="submit" class="btn btn-default btn-pop center-block" value="login" name="btnLogin" id="btnLogin" style="margin-top:20px;">Đăng nhập</button>
        </form>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
