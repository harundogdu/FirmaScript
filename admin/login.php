<?php
@session_start();
if (isset($_SESSION['oturum'])) :
    header("Location:index.php");
endif;
require_once '../config.php';
$lastLogin = $database->getData("settings");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?= $lastLogin['settings_title'] ?> - Admin Paneli Giriş Ekranı</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Giriş Yap</a>
            <small><?= $lastLogin['settings_title'] ?> - Admin Paneli Giriş Ekranı</small>
        </div>
        <div class="card">
            <div class="body">
                <?php
                if (isset($_POST['admin_username'])) :
                    extract($_POST);
                    $admin_username;
                    $admin_password;
                    $database->loginControl($admin_password, $admin_username);
                else :
                ?>
                    <form id="sign_in" method="POST">
                        <div class="msg">Lütfen Oturum Bilgilerinizi Giriniz</div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="admin_username" placeholder="Kullanıcı Adı" required autofocus>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="admin_password" placeholder="Parola" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <button class="btn btn-block bg-pink waves-effect" type="submit">Giriş Yap</button>
                            </div>
                        </div>
                    </form>
                <?php
                endif;


                ?>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>