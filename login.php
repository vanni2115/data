
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
                    <input class="form-control" type="text" name="lblUsername" id="lblUsername1" value="Tên đăng nhập..." onfocus="onfocus_username1()">
                    <input class="form-control" type="text" name="username" id="username1" style="display:none;" onkeyup="return check_username1()";>
                    <div id="username_response1" style="display:none;"></div>
                </div>
              </div>
              <div class="row">
                  <div class="col-md-5">
                      <label for="password" class="control-label">Mật khẩu</label>
                  </div>
                  <div class="col-md-7">
                      <input class="form-control" type="text" name="lblPassword" id="lblPassword1" value="Mật khẩu..." onfocus="onfocus_password1()">
                      <input class="form-control" type="password" name="password" id="password1" style="display:none;" onkeyup="return check_password1()";>
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
