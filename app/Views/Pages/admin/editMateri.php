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
      <form role="form" action="/materi/edit/<?= $get->id ?>" method="post" enctype="multipart/form-data">
        <div class="card-header">
          <h3 class="card-title">Edit Materi</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <input type="hidden" name="oldThumbnail" value="<?= $get->thumbnail ?>">
              <input type="hidden" name="oldvidio" value="<?= $get->video ?>">
              <div class="form-group">
                <label for="judul">Juduk Materi</label>
                <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukan judul" value="<?= old('judul') ? old('judul') : $get->judul ?>" required>
              </div>
              <div class="form-group">
                <label>Tipe Materi</label>
                <input type="text" class="form-control" name="tipe" id="tipe" placeholder="Masukan tipe" value="<?= old('tipe') ? old('tipe') : $get->tipe ?>" required>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Thumbnail</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail" accept=".png,.jpg,.jpeg" onchange="preview()">
                    <label class="custom-file-label" for="thumbnail">Pilih file</label>
                  </div>
                </div>
              </div>
              <div class="d-flex flex-column">
                <label>Preview</label>
                <img src="<?= base_url() ?>thumbnail/<?= $get->thumbnail ?>" alt="<?= $get->judul ?>" id="img-preview" class="img-thumbnail" style="max-width: 500px;">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukan harga" value="<?= old('harga') ? old('harga') : $get->harga ?>" required>
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukan deskripsi" required><?= old('deskripsi') ? old('deskripsi') : $get->deskripsi ?></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Video</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="video" name="vidio" accept=".mp4" onchange="displayVideo(event)">
                    <label class="custom-file-label" for="video">Pilih file</label>
                  </div>
                </div>
              </div>
              <div class="d-flex flex-column">
                <label>Preview</label>
                <video width="320" height="240" controls>
                  <source src="<?= base_url() ?>vidio/<?= $get->video ?>" type="video/mp4" style="max-width: 500px;">
                  Your browser does not support the video tag.
                </video>
                <!-- <img src=" <?= base_url() ?>uploads/<?= $get->video ?>" alt="<?= $get->video ?>" id="img-preview" class="img-thumbnail" style="max-width: 500px;"> -->
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