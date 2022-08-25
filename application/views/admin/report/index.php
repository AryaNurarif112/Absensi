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
                <h3>Laporan Absensi</h3>
                <?php
                if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success" role="alert">
                        <?= $this->session->flashdata('success'); ?>
                    </div>
                <?php
                }
                ?>
                <div class="col-sm-12">
                    <div class="form-group">
                    <form action="<?= base_url('admin/report') ?>" method="GET" class="d-flex flex-row align-middle">
                        <label class=" col-sm-1.5 mt-1"> Tanggal Mulai : </label>
                        <div class="input-group date col-sm-2" id="datetimepicker1" data-target-input="nearest">
                            <input type="text" name="date1" class="form-control datetimepicker-input" id="datetime1" data-target="#datetimepicker1"/>
                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        
                        
                        </div>
                        <label class=" col-sm-1.5 mt-1"> Tanggal Akhir : </label>
                        <div class="input-group date col-sm-2" id="datetimepicker2" data-target-input="nearest">
                            <input type="text" name="date2" class="form-control datetimepicker-input" id="datetime2" data-target="#datetimepicker1"/>
                            <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            
                        </div>
                        <div class="col-sm-4">
                        <button type="submit" class="form-control col-sm-2 btn btn-success">Submit</button>    
                        </div>
                        
                        
                        
                    </form>
                    </div>
                </div>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>MASUK</th>
                            <th>IZIN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;                        
                        foreach ($absen as $key => $value) : ?>
                            <tr>
                                <th><?=  $no; ?></th>
                                <td><?= $key; ?></td>
                                <td><?= $value["STATUS"]; ?></td>
                                <td><?= $value["MASUK"]; ?></td>
                                <td><?= $value["IZIN"]; ?></td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php $this->load->view('admin/_partials/footer'); ?>
    </div>
    <?php $this->load->view('admin/_partials/bottom'); ?>
</body>
<script type="text/javascript">      

  $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('.datetime1').on('change',function() {
            console.log(this.value);
        });
   });

   $(function () {
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('.datetime2').on('change',function() {
            console.log(this.value);
        });
   });

</script>
</html>