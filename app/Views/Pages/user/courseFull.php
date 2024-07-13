<?= $this->extend('layout/userDashboard') ?>

<?= $this->section('content') ?>
<div class="container mb-4" style="max-width: 860px;">
  <div class="d-flex flex-column">
    <video class="card-img-top" style="max-width: 50rem;" controls>
      <source src="<?= base_url() ?>/vidio/<?= $get->video ?>" type="video/mp4">
    </video>
    <div class="d-flex flex-column">
      <h5 class=""><?= $get->judul ?></h5>
      <p class=""><?= $get->deskripsi ?></p>
    </div>
  </div>
</div>
<?= $this->endSection() ?>