<!doctype html>
<html lang="en">

<head>
  <?php $this->load->view('admin/_partials/head'); ?>
</head>

<body>
  <?php $this->load->view('admin/_partials/menu'); ?>
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12 py-3">
        <h3 class="text-center">Assalamu'alaikum warahmatullahi wabarakatuh</h3>
        <?php
            if ($this->session->flashdata('success')) { ?>
                  <div class="alert alert-success" role="alert">
                    <?= $this->session->flashdata('success'); ?>
                  </div>
                <?php
                }
        ?>
      </div>

      <table class="table">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Status</th>
            <th>Status Absen</th>
            <th> Keterangan </th>
            <th>Jam Absen</th>
            <th> Tanggal Absen </th>
          </tr>
        </thead>
        <tbody>
          <?php
            $no = 1;
            foreach ($absen as $data) : ?>
              <tr>
                <th><?= $no++; ?></th>
                <td><?= $data->nama; ?></td>
                <td><?= $data->status ?></td>
                <td><?= $data->status_absen; ?></td>
                <td><?= $data->keterangan == null ? '-' : $data->keterangan; ?></td>
                <td><?= $data->jam_absen; ?></td>
                <td><?= $data->tgl_absen; ?></td>
              </tr>
            <?php
          endforeach; ?>
        </tbody>
      </table>

    </div>
    
    <?php $this->load->view('admin/_partials/footer'); ?>
  </div>
  <?php $this->load->view('admin/_partials/bottom'); ?>
</body>

</html>