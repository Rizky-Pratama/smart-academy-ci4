<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
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

<body class="hold-transition login-page">
  <?php
  if (session()->getFlashdata('errors')) {
    $errors = session()->getFlashdata('errors');
  }
  ?>
  <div class="login-box">
    <div class="login-logo">
      <img src="<?php base_url() ?>/smart.png" height="150" />
    </div>
    <?php if (session()->getFlashdata('success')) : ?>
      <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata("success") ?>
      </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
      <div class="alert alert-danger" role="alert">
        <?= session()->getFlashdata("error") ?>
      </div>
    <?php endif; ?>
    <div class="card">
      <div class="card-body login-card-body">
        <p>Login</p>
        <form action="login" method="post">
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control <?= isset($errors["email"]) ? "is-invalid" : "" ?>" placeholder="Email" value="<?= old("email") ?>">
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
            <input type="password" name="password" class="form-control <?= isset($errors["password"]) ? "is-invalid" : "" ?>" placeholder="Password" value="<?= old("password") ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <div class="invalid-feedback">
              <?= isset($errors["password"]) ? $errors["password"] : "" ?>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          <div class="mt-3">
            <p>Belum punya akun?<a href="/register">Daftar disini</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <!-- jQuery -->
  <script src="<?php base_url() ?>/template/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php base_url() ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php base_url() ?>/template/dist/js/adminlte.min.js"></script>

</body>

</html>