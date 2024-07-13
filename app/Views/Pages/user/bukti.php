<?= $this->extend('layout/userDashboard') ?>

<?= $this->section('content') ?>
<div class="container" style="max-width: 800px;">
  <h3 class="text-center">Upload Bukti Pembayaran</h3>
  <div class="card mt-4">
    <div class="card-body">
      <form action="/bukti/upload" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input name="transaksi_id" type="hidden" value="<?= $transaksi['transaksi_id'] ?>">
        <div class="mb-3">
          <label class="form-label" for="gambar">Upload Gambar</label>
          <input type="file" name="gambar" id="gambar" class="form-control" required>
        </div>
        <button class="btn btn-primary" type="submit">Upload</button>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>