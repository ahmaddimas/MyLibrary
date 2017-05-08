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
          <div class="app-brand"><span class="highlight">LOGIN</span> Admin</div>
        </div>
        <?php if(!empty($notif)) {
            echo '<div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                '.$notif.'
            </div>';
        } ?>
        <form action="<?php echo base_url('Authentication/Login'); ?>" method="post" id="form">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
              <input type="text" class="form-control" name="username" placeholder="Username" aria-describedby="basic-addon1" autofocus>
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2"><i class="fa fa-key" aria-hidden="true"></i></span>
              <input type="password" class="form-control" name="password" placeholder="Password" aria-describedby="basic-addon2" autofocus>
            </div>
            <input type="submit" class="btn btn-success btn-submit" value="Login" name="submit">
        </form>

        <div class="form-line">
          <div class="title">OR</div>
        </div>
        <div class="form-footer">
          <button type="button" class="btn btn-default btn-sm btn-social __facebook" onclick="window.location='<?php echo base_url('Authentication/SignUp'); ?>'">
            <div class="info">
              <i class="icon fa fa-user-plus" aria-hidden="true"></i>
              <span class="title">Create Account!</span>
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
  <script type="text/javascript">
      $('#form').submit(function(event) {
          this.submit();
      });
  </script>

</body>
</html>
