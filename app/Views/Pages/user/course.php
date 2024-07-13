<?= $this->extend('layout/userDashboard') ?>

<?= $this->section('content') ?>
<div class="container mb-4" style="max-width: 860px;">
  <div class="d-flex flex-column">
    <img src="<?= base_url() ?>/thumbnail/<?= $get->thumbnail ?>" class="card-img-top" style="max-width: 50rem;">
    <div class="d-flex flex-column">
      <h5 class=""><?= $get->judul ?></h5>
      <p class=""><?= $get->deskripsi ?></p>
      <?php $harga = "Rp " . number_format($get->harga, 2, ',', '.'); ?>
      <p class=""><?= $get->tipe ?></p>
      <div class="d-flex gap-2 align-items-center">
        <a href="/checkout/<?= $get->id ?>" class="btn btn-primary">Beli Materi</a>
        <span class="d-inline"><?= $harga ?></span>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>