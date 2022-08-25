<!doctype html>
<html lang="en">

<head>
    <?php $this->load->view('admin/_partials/head'); ?>
</head>

<body>
    <?php $this->load->view('admin/_partials/menu'); ?>
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-md-6 py-3 mx-auto">
                <div class="card">
                    <div class="card-header">
                        Tambah Data Karyawan dan Guru
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/karyawan/save'); ?>" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Nama Karyawan/Guru</label>
                                <input type="text" class="form-control" name="nama">
                            </div> 
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="">--Pilih Status--</option>
                                    <option value="Karyawan">Karyawan</option>
                                    <option value="Guru">Guru</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="kelamin" class="form-select">
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor Handphone</label>
                                <input type="text" class="form-control" name="telp">
                            </div>  
                            <div class="mb-3">
                                <label class="form-label">Alamat Lengkap</label>
                                <textarea name="alamat" class="form-control" cols="30" rows="10"></textarea>
                            </div> 
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username">
                            </div> 
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('admin/_partials/footer'); ?>
    </div>
    <?php $this->load->view('admin/_partials/bottom'); ?>
</body>

</html>