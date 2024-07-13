<?= $this->extend('layout/adminDashboard') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Bukti</h3>
      </div>
      <div class="card-body table-responsive">
        <table id="example1" class="table table-bordered table-striped" style="min-width: max-content;">
          <thead>
            <tr>
              <th>No</th>
              <th>ID Transaksi</th>
              <th>Nama Bank</th>
              <th>Nomor Rekening</th>
              <th>Total</th>
              <th>Bukti</th>
              <th>Status</th>
              <th>Option</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($get as $row) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['transaksi_id'] ?></td>
                <td><?= $row['nama_bank'] ?></td>
                <td><?= $row['nomor_rekening'] ?></td>
                <td><?= $row['total_transaksi'] ?></td>
                <td>
                  <a data-fancybox data-src="bukti/<?= $row['gambar'] ?>">
                    <img src="bukti/<?= $row['gambar'] ?>" width="200" />
                  </a>
                </td>
                <td>
                  <?php if ($row['status'] == "sukses") : ?>
                    <span class="badge badge-success"><?= $row['status'] ?></span>
                  <?php elseif ($row['status'] == "gagal") : ?>
                    <span class="badge badge-danger"><?= $row['status'] ?></span>
                  <?php elseif ($row['status'] == "dibatalkan") : ?>
                    <span class="badge badge-danger"><?= $row['status'] ?></span>
                  <?php elseif ($row['status'] == "belum_dibayar") : ?>
                    <span class="badge badge-secondary"><?= $row['status'] ?></span>
                  <?php endif; ?>
                </td>
                <td>
                  <a href="/transaksi/edit/<?= $row['transaksi_id'] ?>" class="btn btn-warning">Edit Status</a>
                </td>
              </tr>
            <?php } ?>
          <tfoot>
            <tr>
              <th>No</th>
              <th>ID Transaksi</th>
              <th>Nama Bank</th>
              <th>Nomor Rekening</th>
              <th>Total</th>
              <th>Bukti</th>
              <th>Status</th>
              <th>Option</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<?= $this->endSection() ?>