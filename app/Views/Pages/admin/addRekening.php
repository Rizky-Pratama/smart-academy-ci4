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
      <form role="form" action="/rekening/add" method="post">
        <div class="card-header">
          <h3 class="card-title">Tambah Rekening</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_bank">Nama Bank</label>
                <input type="text" class="form-control" name="nama_bank" id="nama_bank" placeholder="Masukan Nama Bank" value="<?= old('nama_bank') ?>" >
              </div>
              <div class="form-group">
                <label for="nomor_rekening">Nomor Rekening</label>
                <input type="number" class="form-control" name="nomor_rekening" id="nomor_rekening" placeholder="Masukan Nomor Rekening" value="<?= old('nomor_rekening') ?>" >
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_pemilik_rekening">Atas Nama</label>
                <input type="text" class="form-control" name="nama_pemilik_rekening" id="nama_pemilik_rekening" placeholder="Masukan Atas Nama" value="<?= old('nama_pemilik_rekening') ?>" >
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/rekening" class="btn btn-danger">Cancel</a>
        </div>
      </form>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
</div>
<?= $this->endSection() ?>