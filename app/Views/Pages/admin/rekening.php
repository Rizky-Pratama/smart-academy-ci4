<?= $this->extend('layout/adminDashboard') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col-12">

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Rekening</h3>
        <a href="/rekening/add" class="btn btn-primary float-right">Tambah Rekening</a>
      </div>
      <div class="card-body table-responsive">
        <table id="example1" class="table table-bordered table-striped" style="min-width: max-content;">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Bank</th>
              <th>Nomor Rekening</th>
              <th>Nama Pemilik Rekening</th>
              <th>Option</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($get as $row) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama_bank'] ?></td>
                <td><?= $row['nomor_rekening'] ?></td>
                <td><?= $row['nama_pemilik_rekening'] ?></td>
                <td>
                  <a href="/rekening/edit/<?= $row['rekening_id'] ?>" class="btn btn-warning">Edit</a>
                  <form action="/rekening/delete/<?= $row['rekening_id'] ?>" class="d-inline" method="post">
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
            <?php } ?>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Nama Bank</th>
              <th>Nomor Rekening</th>
              <th>Nama Pemilik Rekening</th>
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