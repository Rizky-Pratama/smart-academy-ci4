<?= $this->extend('layout/userDashboard') ?>

<?= $this->section('content') ?>
<div class="container" style="max-width: 800px;">
  <h3 class="text-center">Profile</h3>
  <div class="card mt-4">
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <?= csrf_field(); ?>
          <div class="mb-3 d-flex flex-column">
            <label class="form-label" for="gambar">Nama Lengkap</label>
            <span><?= isset($profil) ? $profil['nama_lengkap'] : '-' ?></span>
          </div>
          <div class="mb-3 d-flex flex-column">
            <label class="form-label" for="gambar">Alamat</label>
            <span><?= isset($profil) ? $profil['alamat'] : '-' ?></span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3 d-flex flex-column">
            <label class="form-label" for="gambar">No HP</label>
            <span><?= isset($profil) ? $profil['no_hp'] : '-' ?></span>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <a href="profile/edit" class="btn btn-warning" type="submit">Edit</a>
    </div>
  </div>
</div>
<?= $this->endSection() ?>