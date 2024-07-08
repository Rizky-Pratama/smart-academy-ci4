<div class="row">
  <div class="col-12">

    <div class="card">
      <div class="card-header">
        <a href="/membership/add" class="btn btn-primary">Tambah Materi</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Membership</th>
              <th>Durasi</th>
              <th>Harga</th>
              <th>Option</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($get as $row) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row->nama_membership ?></td>
                <td><?= $row->durasi_keanggotaan ?></td>
                <td><?= $row->harga_keanggotaan ?></td>
                <td>
                  <a href="/materi/edit/<?= $row->id_membership ?>" class="btn btn-warning">Edit</a>
                  <form action="/materi/delete/<?= $row->id_membership ?>" class="d-inline" method="post">
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
            <?php } ?>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Nama Membership</th>
              <th>Durasi</th>
              <th>Harga</th>
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