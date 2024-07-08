<?= $this->extend('layout/adminDashboard') ?>

<?= $this->section('content') ?>

<?php
if (session()->getFlashdata('errors')) {
  $errors = session()->getFlashdata('errors');
}
?>
<div class="row">
  <!-- /.card -->
  <?php if (isset($errors)) : ?>
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-ban"></i> Gagal!</h5>
      <ul>
        <?php foreach ($errors as $error) : ?> <li><?= esc($error) ?></li>
        <?php endforeach ?>
      </ul>
    </div>
    <?php endif; ?>

    <div class="col-12">
      <!-- general form elements -->
      <div class="card">
        <form role="form" action="/pengguna/add" method="post">
          <div class="card-header">
            <h3 class="card-title">Tambah User</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Masukan email" value="<?= old('email') ?>" required>
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="username" id="username" placeholder="Masukan username" value="<?= old('username') ?>" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Level User</label>
                  <select class="form-control select2" style="width: 100%;" name="user_level" required>
                    <option value="user" selected="selected">User</option>
                    <option value="admin">Admin</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Masukan password" value="<?= old('password') ?>" required>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
    </div>
    <?= $this->endSection() ?>