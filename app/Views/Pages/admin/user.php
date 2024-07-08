<?= $this->extend('layout/adminDashboard') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data User</h3>
        <a href="<?= site_url('pengguna/add') ?>" class="btn btn-primary float-right">Tambah User</a>
    </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive">
        <table id="example1" class="table table-hover">
          <thead>
            <tr>
              <th>Alamat Email</th>
              <th>Username</th>
              <th>User Level</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($get as $row) : ?>
              <tr>
                <td><?= $row->email ?></td>
                <td><?= $row->username ?></td>
                <td><?= $row->user_level ?></td>
                <td><a href="<?= site_url('hapususer/' . $row->id) ?>" class="btn btn-danger">Hapus</a></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<?= $this->endSection() ?>