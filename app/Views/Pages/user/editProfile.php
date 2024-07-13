<?= $this->extend('layout/userDashboard') ?>

<?= $this->section('content') ?>
<?php
$valueNama = isset($profil) ? $profil['nama_lengkap'] : '';
$valueAlamat = isset($profil) ? $profil['alamat'] : '';
$valueNoHp = isset($profil) ? $profil['no_hp'] : '';
?>
<div class="container" style="max-width: 800px;">
  <h3 class="text-center">Edit Profile</h3>
  <div class="card mt-4">
    <form action="/profile/edit" method="post">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <?= csrf_field(); ?>
            <input type="hidden" name="id" value="<?= isset($profil) ? $profil['id'] : '' ?>">
            <div class="mb-3 d-flex flex-column">
              <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
              <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Masukan nama lengkap" value="<?= old('nama_lengkap') ? old('nama_lengkap') : $valueNama ?>" required>
            </div>
            <div class="mb-3 d-flex flex-column">
              <label class="form-label" for="alamat">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" rows="3">
                <?= old('alamat') ? old('alamat') : $valueAlamat ?>
              </textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3 d-flex flex-column">
              <label class="form-label" for="no_hp">No HP</label>
              <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Masukan Nomor" value="<?= old('no_hp') ? old('no_hp') : $valueNoHp ?>" required>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button class="btn btn-warning" type="submit">Save</button>
        <a class="btn btn-danger" href="/profile">Cancel</a>
      </div>
    </form>
  </div>
</div>
<?= $this->endSection() ?>