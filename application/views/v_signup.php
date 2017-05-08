<!DOCTYPE html>
<html>
<head>
  <title>Flat Admin V.3 - Free flat-design bootstrap administrator templates</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="../assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/flat-admin.css">

  <!-- Theme -->
  <link rel="stylesheet" type="text/css" href="../assets/css/theme/blue-sky.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/theme/blue.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/theme/red.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/theme/yellow.css">

</head>
<body>
  <div class="app app-default">

<div class="app-container app-login">
  <div class="flex-center">
    <div class="app-header"></div>
    <div class="app-body">
      <div class="app-block">
        <div class="app-form">
          <div class="form-header">
            <div class="app-brand"><span class="highlight">SIGN UP</span> Admin</div>
          </div>
          <?php if(!empty($notif)) {
              echo '<div class="alert alert-warning alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  '.$notif.'
              </div>';
          } ?>
          <form action="<?php echo base_url('Authentication/SignUp'); ?>" method="POST">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">
                  <i class="fa fa-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" aria-describedby="basic-addon2">
              </div>
              <div class="input-group">
                  <span class="input-group-addon" id="basic-addon2">
                    <i class="fa fa-genderless" aria-hidden="true"></i></span>
                    <div class="radio radio-inline">
                        <input type="radio" name="jk" id="radio5" value="L" checked>
                        <label for="radio5">
                            Laki - Laki
                        </label>
                    </div>
                    <div class="radio radio-inline">
                        <input type="radio" name="jk" id="radio6" value="P">
                        <label for="radio6">
                            Perempuan
                        </label>
                    </div>
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">
                  <i class="fa fa-mobile-phone" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="telp" placeholder="Nomor Telpon" aria-describedby="basic-addon2">
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">
                  <i class="fa fa-location-arrow" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="alamat" placeholder="Alamat" aria-describedby="basic-addon2">
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">
                  <i class="fa fa-at" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="username" placeholder="Username" aria-describedby="basic-addon2">
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon3">
                  <i class="fa fa-key" aria-hidden="true"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password" aria-describedby="basic-addon3">
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon4">
                  <i class="fa fa-check" aria-hidden="true"></i></span>
                <input type="password" class="form-control" name="password2" placeholder="Confirm Password" aria-describedby="basic-addon4">
              </div>
              <div class="text-center">
                  <input type="submit" class="btn btn-success btn-submit" value="Register" name="submit">
              </div>
          </form>
          <div class="form-line">
            <div class="title">OR</div>
          </div>
          <div class="form-footer">
            <button type="button" class="btn btn-default btn-sm btn-social __facebook" onclick="window.location='<?php echo base_url('Authentication/Login'); ?>'">
              <div class="info">
                <i class="icon fa fa-sign-in" aria-hidden="true"></i>
                <span class="title">Login</span>
              </div>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="app-footer">
    </div>
  </div>
</div>

  </div>

  <script type="text/javascript" src="../assets/js/vendor.js"></script>

</body>
</html>
