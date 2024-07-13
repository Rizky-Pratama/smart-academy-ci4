<?= $this->extend('layout/userDashboard') ?>

<?= $this->section('content') ?>
<div class="container mb-4" style="max-width: 960px">

  <main>
    <div class="py-5 text-center">
      <h2>Checkout</h2>
      <p class="lead">
        Silahkan lengkapi data diri anda untuk menyelesaikan transaksi
      </p>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <?php $harga = "Rp " . number_format($getMateri->harga, 2, ',', '.'); ?>
            <div>
              <h6 class="my-0">Judul Materi</h6>
              <small class="text-muted"><?= $getMateri->judul ?></small>
            </div>
            <span class="text-muted"><?= $harga ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (IDR)</span>
            <strong><?= $harga ?></strong>
          </li>
        </ul>
      </div>
      <div class="col-md-7 col-lg-8">
        <form class="needs-validation" method="post" action="/checkout">
          <h4 class="mb-3">Pembayaran</h4>

          <input type="hidden" name="materi_id" value="<?= $getMateri->id ?>" />
          <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>" />
          <div class="my-3">
            <?php
            $no = 1;
            foreach ($getRekening as $row) :
            ?>
              <div class="form-check">
                <input id="pay<?= $no ?>" name="rekening_id" value="<?= $row['rekening_id'] ?>" type="radio" class="form-check-input" required />
                <label class="form-check-label" for="pay<?= $no ?>"><?= $row['nama_bank'] ?></label>
              </div>
            <?php
              $no++;
            endforeach; ?>
          </div>

          <hr class="my-4" />

          <button class="w-100 btn btn-primary btn-lg" type="submit">
            Continue to checkout
          </button>
        </form>
      </div>
    </div>
  </main>
</div>
<?= $this->endSection() ?>