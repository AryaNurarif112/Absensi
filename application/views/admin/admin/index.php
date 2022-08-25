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
                <h3>Data Admin Absensi</h3>
                <?php
                if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success" role="alert">
                        <?= $this->session->flashdata('success'); ?>
                    </div>
                <?php
                }
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Admin</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($admin as $data) : ?>
                            <tr>
                                <th><?= $no; ?></th>
                                <td><?= $data->nama_admin; ?></td>
                                <td><?= $data->username; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/admin/change/' . $data->id_admin); ?>" class="btn btn-small btn-info">Change</a>
                                    <a href="<?= base_url('admin/admin/delete/' . $data->id_admin); ?>" class="btn btn-small btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
                <a href="<?= base_url('admin/admin/add'); ?>" class="btn btn-primary">Add</a>
            </div>
        </div>
        <?php $this->load->view('admin/_partials/footer'); ?>
    </div>
    <?php $this->load->view('admin/_partials/bottom'); ?>
</body>

</html>