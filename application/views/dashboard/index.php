<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Absensi Karyawan SDIT Al-Khairaat</title>
</head>

<body>
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-md-12">
                <h3 class="text-center">Halaman Absensi Karyawan dan Guru</h3>
            </div>
        </div>
        <div class="row">
            <?php
            if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success" role="alert">
                   <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php
            }
            ?>
            <div class="col-md-7 mx-auto mb-4">
                <div class="card border-primary text-dark">
                    <div class="card-header">Absensi Masuk</div>
                    <div class="card-body">
                        <div class="d-grid gap-1">
                            <a href="<?= base_url('dashboard/absen/masuk'); ?>" class="btn btn-primary" type="button">Masuk</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-7 mx-auto mb-4">
                <div class="card border-success text-dark">
                    <div class="card-header">Izin</div>
                    <div class="card-body">
                        <div class="d-grid gap-1">
                            <a href="<?= base_url('dashboard/absen/izin'); ?>" class="btn btn-warning" type="button">Izin</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-7 mx-auto">
                <div class="card border-success text-dark">
                    <div class="card-header">Absensi Keluar</div>
                    <div class="card-body">
                        <div class="d-grid gap-1">
                            <a href="<?= base_url('dashboard/absen/keluar'); ?>" class="btn btn-success" type="button">Keluar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>