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
  <!-- /.card -->
  <div class="col-12">
    <!-- general form elements -->
    <div class="card">
      <form role="form" action="/materi/add" method="post" enctype="multipart/form-data">
        <div class="card-header">
          <h3 class="card-title">Tambah Materi</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="judul">Juduk Materi</label>
                <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukan judul" value="<?= old('judul') ?>" required>
              </div>
              <div class="form-group">
                <label>Tipe Materi</label>
                <select class="form-control select2" style="width: 100%;" name="tipe" required>
                  <option selected="selected">Pemograman</option>
                  <option>UI/UX</option>
                  <option>Data Sains</option>
                  <option>Frontend</option>
                </select>
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukan deskripsi" required><?= old('deskripsi') ?></textarea>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukan harga" value="<?= old('harga') ?>" required>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="vidio" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/materi" class="btn btn-danger">Cancel</a>
        </div>
      </form>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
</div>
<?= $this->endSection() ?>