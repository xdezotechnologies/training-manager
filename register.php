<?php require('connection/config.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register | TMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
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
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="register.php"><b>Training</b> Manager</a>
  </div>

<?php
if(isset($_POST['register'])) {
  $name=$_POST['name'];
  $email=$_POST['email'];
  $password=md5($_POST['password']);
  $retype_password=md5($_POST['retype_password']);
  $verification_code=$_POST['verification_code'];


  if($name!="" AND $email!="" AND $password!="" AND $retype_password!="" AND $verification_code!="") {
     if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
       if($password==$retype_password) {
         $ver_code_query="SELECT * FROM tbl_user_verifications WHERE ver_code='$verification_code'";
         $ver_code_result=mysqli_query($conn,$ver_code_query);
         $data=$ver_code_result->fetch_assoc();
         $ver_code=$data['ver_code'];
         $user_type=$data['user_type'];
         if ($user_type=='3') {
            $user_query="INSERT INTO tbl_user (name,username,password,email) VALUES ('$name','$name','$password','$email')";
            $user_result=mysqli_query($conn,$user_query);
         }
         $count=mysqli_num_rows($ver_code_result);
         if($count==1){

           $register_query="INSERT INTO tbl_users (usertype_id,name,email,password,address,phone,image,status,info) VALUES('$user_type','$name','$email','$password','','','','active','')";
           $register_result=mysqli_query($conn,$register_query);
           if($register_result) {
             $del_ver_code_query="DELETE FROM tbl_user_verifications WHERE ver_code='$ver_code'";
             $del_ver_code_result=mysqli_query($conn,$del_ver_code_query);
             header('Location: index.php?msg=reg_success');
           }
           else {
             header('Location: register.php?msg=error_reg');
           }
         }
        else {
          ?>
          <div class="alert alert-warning" role="alert">
            Verification Code is invalid !!!
          </div>
          <?php
        }
       }
       else {
         ?>
         <div class="alert alert-warning" role="alert">
           Retyped Password Does Not Match !!!
         </div>
         <?php
       }
     }
     else {
       ?>
       <div class="alert alert-warning" role="alert">
         Email is invalid !!!
       </div>
       <?php
     }
  }
  else {
    ?>
    <div class="alert alert-warning" role="alert">
      All fields are necessary !!!
    </div>
    <?php
  }
}



 ?>
  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

      <form class="" action="#" method="POST" enctype="multipart/form-data">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Full name" name="name">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Retype password" name="retype_password">
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Verification Code" name="verification_code">
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="register">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    <a href="index.php" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
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
