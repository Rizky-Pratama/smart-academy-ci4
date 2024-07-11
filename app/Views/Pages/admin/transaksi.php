<?= $this->extend('layout/adminDashboard') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col-12">

    <div class="card">
      <div class="card-header">
        <!-- <a href="/materi/add" class="btn btn-primary">Data Transaksi</a> -->
        <h3 class="card-title">Data Transaksi</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive">
        <table id="example1" class="table table-bordered table-striped" style="min-width: max-content;">
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Judul Materi</th>
              <th>Nama Bank</th>
              <th>Nomor Rekening</th>
              <th>Total Transaksi</th>
              <th>Tanggal Transaksi</th>
              <th>Status Transaksi</th>
              <th>Option</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            // dd($get);
            foreach ($get as $row) { ?>
              <?php
              // dd($row[]);
              ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['judul_materi'] ?></td>
                <td><?= $row['nama_bank'] ?></td>
                <td><?= $row['nomor_rekening'] ?></td>
                <td><?= $row['total_transaksi'] ?></td>
                <td><?= $row['tanggal_transaksi'] ?></td>
                <td>
                  <!-- beberapa status transaksi 'belum_dibayar', 'sukses', 'gagal', 'dibatalkan' -->
                  <?php if ($row['status_transaksi'] == "sukses") : ?>
                    <span class="badge badge-success"><?= $row['status_transaksi'] ?></span>
                  <?php elseif ($row['status_transaksi'] == "gagal") : ?>
                    <span class="badge badge-danger"><?= $row['status_transaksi'] ?></span>
                  <?php elseif ($row['status_transaksi'] == "dibatalkan") : ?>
                    <span class="badge badge-danger"><?= $row['status_transaksi'] ?></span>
                  <?php elseif ($row['status_transaksi'] == "belum_dibayar") : ?>
                    <span class="badge badge-secondary"><?= $row['status_transaksi'] ?></span>
                  <?php endif; ?>
                </td>
                <td>
                  <a href="/materi/edit/<?= $row['transaksi_id'] ?>" class="btn btn-warning">Edit</a>
                  <form action="/materi/delete/<?= $row['transaksi_id'] ?>" class="d-inline" method="post">
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
            <?php } ?>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Judul Materi</th>
              <th>Nama Bank</th>
              <th>Nomor Rekening</th>
              <th>Total Transaksi</th>
              <th>Tanggal Transaksi</th>
              <th>Status Transaksi</th>
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