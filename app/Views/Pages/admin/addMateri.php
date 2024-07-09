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
                <label for="tipe">Tipe Materi</label>
                <input type="text" class="form-control" name="tipe" id="tipe" placeholder="Masukan tipe" value="<?= old('tipe') ?>" required>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukan harga" value="<?= old('harga') ?>" required>
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukan deskripsi" required><?= old('deskripsi') ?></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="preview1">Thumbnail</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="thumbnail" class="custom-file-input" id="preview1" accept=".png,.jpg,.jpeg" required>
                    <label class="custom-file-label" for="preview1">Choose file</label>
                  </div>
                </div>
              </div>
              <!-- <div class="form-group">
                <label>Preview Thumnail</label>
                <img src="/image.png" class="img-thumbnail" id="preview1-img" alt="preview" style="max-width: 500px;">
              </div> -->
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="preview2">Vidio</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="vidio" class="custom-file-input" id="preview2" accept=".mp4" required>
                    <label class="custom-file-label" for="preview2">Choose file</label>
                  </div>
                </div>
              </div>
              <!-- <div class="form-group">
                <label>Preview Vidio</label>
                <img src="/image.png" class="img-thumbnail" alt="preview2-img" style="max-width: 500px;" id="previwe-thumb">
              </div> -->
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