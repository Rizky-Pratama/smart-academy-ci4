<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php base_url() ?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php base_url() ?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php base_url() ?>/template/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition register-page">
  <?php
  if (session()->getFlashdata('errors')) {
    $errors = session()->getFlashdata('errors');
  }
  ?>
  <div class="register-box">
    <div class="register-logo">
      Smart Academy
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>
        <form action="register" method="post" id="form">
          <div class="input-group mb-3">
            <input type="text" class="form-control <?= isset($errors["username"]) ? "is-invalid" : "" ?>" placeholder="Username" name="username" value="<?= old("username") ?>" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            <div class="invalid-feedback">
              <?= isset($errors["username"]) ? $errors["username"] : "" ?>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control <?= isset($errors["email"]) ? "is-invalid" : "" ?>" placeholder="Email" name="email" value="<?= old("email") ?>" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            <div class="invalid-feedback">
              <?= isset($errors["email"]) ? $errors["email"] : "" ?>
            </div>
          </div>
          <div class="input-group mb-3">
            <input id="pw1" type="password" class="form-control <?= isset($errors["password"]) ? "is-invalid" : "" ?>" placeholder="Password" name="password" value="<?= old("password") ?>" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <div class="invalid-feedback">
              <?= isset($errors["password"]) ? $errors["password"] : "" ?>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
          </div>
        </form>
        <div class="mt-3">
          <a href="/login" class="text-center">Sudah mempunyai akun</a>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="<?php base_url() ?>/template/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php base_url() ?>/templatep/lugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php base_url() ?>/template/dist/js/adminlte.min.js"></script>

</body>

</html>