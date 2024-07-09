<?= $this->extend('layout/adminDashboard') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col-12">

    <div class="card">
      <div class="card-header">
        <a href="/materi/add" class="btn btn-primary">Tambah Materi</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive">
        <table id="example1" class="table table-bordered table-striped" style="width: max-content;">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul Materi</th>
              <th style="max-width: 200px;">Deskripsi</th>
              <th>Tipe</th>
              <th>Thumbnail</th>
              <th>Vidio</th>
              <th>Harga</th>
              <th>Option</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($get as $row) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row->judul ?></td>
                <td><?= $row->deskripsi ?></td>
                <td><?= $row->tipe ?></td>
                <td>
                  <img class="object-fit-contain" style="height: 200px;" src="thumbnail/<?= $row->thumbnail ?>" alt="<?= $row->judul ?>">
                </td>
                <td>
                  <video width="320" height="240" controls>
                    <source src="vidio/<?= $row->video ?>" type="video/mp4">
                    Your browser does not support the video tag.
                  </video>
                </td>
                <td>
                  <!-- tampilkan harga dengan format rupiah -->
                  <?= "Rp " . number_format($row->harga, 2, ',', '.'); ?>
                </td>
                <td>
                  <a href="/materi/edit/<?= $row->id ?>" class="btn btn-warning">Edit</a>
                  <form action="/materi/delete/<?= $row->id ?>" class="d-inline" method="post">
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
            <?php } ?>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Judul Materi</th>
              <th>Deskripsi</th>
              <th>Tipe</th>
              <th>Thumbnail</th>
              <th>Vidio</th>
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