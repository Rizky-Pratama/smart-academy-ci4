<?= $this->extend('layout/userDashboard') ?>

<?= $this->section('content') ?>
<div class="container h-100 p-4 mb-4 bg-light rounded-3 shadow-sm" style="max-width: 850px;">
  <?php
  if (isset($transaksi)) :
  ?>
    <h2 class="text-center">Transaksi</h2>
    <?php foreach ($transaksi as $transaksi) : ?>
      <div class="card mb-3 mt-4">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="thumbnail/<?= $transaksi['thumbnail'] ?>" class="img-fluid object-fit-cover rounded-start" style="min-height: 100%;" alt="<?= $transaksi['judul_materi'] ?>">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <h5 class="card-title"><?= $transaksi['judul_materi'] ?></h5>
                <a href="bukti/<?= $transaksi['transaksi_id'] ?>" class="btn btn-primary ms-auto">Bukti Pembayaran</a>
              </div>
              <hr>
              <span>
                <strong>ID: </strong>
                #<?= $transaksi['transaksi_id'] ?>
              </span>
              <?php if ($transaksi['status_transaksi'] == "sukses") : ?>
                <span class="badge text-bg-success"><?= $transaksi['status_transaksi'] ?></span>
              <?php elseif ($transaksi['status_transaksi'] == "gagal") : ?>
                <span class="badge text-bg-danger"><?= $transaksi['status_transaksi'] ?></span>
              <?php elseif ($transaksi['status_transaksi'] == "dibatalkan") : ?>
                <span class="badge text-bg-danger"><?= $transaksi['status_transaksi'] ?></span>
              <?php elseif ($transaksi['status_transaksi'] == "belum_dibayar") : ?>
                <span class="badge text-bg-secondary"><?= $transaksi['status_transaksi'] ?></span>
              <?php endif; ?>
              <div class="d-flex gap-5">
                <p class="d-block mb-0">Bank: <?= $transaksi['nama_bank'] ?></p>
                <p class="d-block mb-0">No. Rekening: <?= $transaksi['nomor_rekening'] ?></p>
              </div>
              <p class="card-text">Total: Rp <?= number_format($transaksi['total_transaksi'], 0, ',', '.') ?></p>
              <p class="card-text"><small class="text-body-secondary"><?= $transaksi['tanggal_transaksi'] ?></small></p>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else : ?>
    <h3 class="text-center">Belum ada transaksi</h3>
  <?php endif; ?>
</div>
<?= $this->endSection() ?>