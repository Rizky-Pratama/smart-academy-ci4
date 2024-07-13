<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart Academy</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <!-- <h1>smart academy</h1> -->
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
        <img src="<?php base_url() ?>/logo.png" height="40" />
      </a>
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="<?= base_url() ?>" class="nav-link px-2 link-secondary">Home</a></li>
        <li><a href="<?= base_url() ?>transaction" class="nav-link px-2 link-dark">Transaction</a></li>
      </ul>

      <?php if (session()->get('username')) : ?>
        <div class="dropdown text-end d-flex">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="/avatar/default.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="/profile">Profile</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="<?= base_url() ?>logout">Sign out</a></li>
          </ul>
        </div>
      <?php else : ?>
        <div class="col-md-3 text-end">
          <a href="<?= base_url() ?>login" class=" btn btn-primary">Login</a>
        </div>
      <?php endif; ?>
    </header>
  </div>

  <?php if (session()->getFlashdata('success')) : ?>
    <div class="container">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
  <?php endif; ?>

  <main>
    <?= $this->renderSection('content') ?>
  </main>
  <script src="<?php base_url() ?>/template/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php base_url() ?>/template/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    function preview() {
      const file = document.querySelector('input[type=file]').files[0];
      const preview = document.querySelector('#img-preview');

      const reader = new FileReader();
      reader.readAsDataURL(file);

      reader.addEventListener("load", function(e) {
        preview.src = e.target.result;
      });
    }
  </script>
</body>

</html>