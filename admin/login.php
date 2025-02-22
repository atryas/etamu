<?php
error_reporting(0);
	ob_start();

    session_start();


include "../koneksi/koneksi.php";

  if(@$_SESSION['admin'] || $_SESSION['user'] ){
        header("location:index.php");
    }else{

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Login</title>
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
<body class="hold-transition login-page">

<?php 

    

    $sql = $koneksi->query("select * from tb_profile ");

    $data = $sql->fetch_assoc();

    
    

  ?>   
 

<div class="login-box">
  <div class="login-logo">
  	
  </div>



  <!-- /.login-logo -->
  <div class="login-box-body">
    <h3 style=" text-align: center; " > <img  src="images/<?php echo $data['foto'] ?>" width="160" height="100" alt=""></h3>

    <h3 style="color: black; font-size: 17px;  text-align: center;"> <b>Aplikasi</b> E-TAMU</h3>
    
    <p style="color: black; font-size: 18px;" class="login-box-msg">Halaman Login</p>

    <form  method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Your Username " name="nama" />
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      <input type="password" class="form-control"  placeholder="Your Password" name="pass" />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">

        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-info"  name="login" value="Login" />
        </div>
        <!-- /.col -->
      </div>
    </form>




  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

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
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>


<?php

if (isset($_POST['login'])) {

	$nama=addslashes(trim($_POST['nama']));
	$pass=addslashes(trim($_POST['pass']));

	$ambil = $koneksi->query("select * from tb_user where username='$nama' and pass='$pass'");
	$data =$ambil->fetch_assoc();
	$ketemu = $ambil->num_rows;

	if($ketemu >=1){

    session_start();

    $_SESSION[username] = $data [username];
    $_SESSION[pass] = $data [password];
    $_SESSION[level] = $data [level];


    if($data['level'] == "admin"){
        $_SESSION['admin'] = $data[id];
        header("location:index.php");

    }else if($data['level']== "user"){
        $_SESSION['user'] = $data[id];
        header("location:index.php");

    }else if($data['level']== "direktur"){
        $_SESSION['direktur'] = $data[id];
        header("location:index.php");

    }
} else{
            ?>
                <script type="text/javascript">
                    alert("Login Gagal Username dan Password Salah.. Silahkan Ulangi Lagi");
                </script>
            <?php
        }


}
}
?>
