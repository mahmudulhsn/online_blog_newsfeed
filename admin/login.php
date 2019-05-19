<?php require_once('functions.php'); ?>
<?php 
  session_start();
  if (is_loggedin()) {
    redirect('index.php');
  }
  
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Microkodes | Fitness Management System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style type="text/css">
    .is-invalid{
      border-color: red;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index2.html"><b>NewsFeed</b> Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">


    <form action="" method="post">
      <?php 
        if (isset($_POST['login'])) {
          $username = $_POST['username'];
          $password = $_POST['password'];
          if($username && $password){
            login($username,$password);
          }
        }
     ?>
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control <?php if(isset($_POST['login']) && empty($_POST['username'])){echo 'is-invalid';} ?>" placeholder="Enter username...">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?php if(isset($_POST['login']) && empty($_POST['username'])): ?>
          <strong class="text text-danger"><?php echo 'Username is required !'; ?></strong>
        <?php endif; ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control <?php if(isset($_POST['login']) && empty($_POST['password'])){echo 'is-invalid';} ?>" placeholder="Enter password...">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php if(isset($_POST['login']) && empty($_POST['password'])): ?>
          <strong class="text text-danger"><?php echo 'Password is required !'; ?></strong>
        <?php endif; ?>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" name="login" value="Login" class="btn btn-primary btn-block btn-flat"/>
        </div>
        <!-- /.col -->
      </div>
    </form>

    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
