<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <!-- CDN Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex justify-content-center mt-5">
        <div class="d-flex-col border border-success shadow p-4 qr-property">
            <div class="text-success">
                <h1 clas="ml-2 mt-5">Scan Me</h1>
            </div>
            <div class="border border-dark" > 
                <?php
                            require 'vendor/autoload.php'; // load folder vendor/autoload
                            use Endroid\QrCode\QrCode;
                            use Endroid\QrCode\Writer\PngWriter; 
                            $qrCode = new QrCode(base_url("check/checkin/".$token->private_key)); // mengambil data kode siswa sebagai data  QR code
                            $writer = new PngWriter();
                            $writer->write($qrCode)->saveToFile("assets/qrcode/".$users->nama.'-'.$users->id_karyawan.'-'.$token->public_key.".png");
                        ?>
                                        <!-- tampilkan gambar QR code -->
                    <img src="<?= base_url("assets/qrcode/".$users->nama.'-'.$users->id_karyawan.'-'.$token->public_key.".png") ?>" alt="QRcode-siswa" width="250px">
            </div>
        </div>
    </div>
</body>
<script>
   function loop(){
        axios.get("<?= base_url('check/ischecked/'.$token->public_key) ?>")
            .then((data) => {
                console.log(data.data.is_check);
                if(data.data.is_check){
                    window.location.href = "<?= base_url('check/checkinredirect') ?>";
                }
            });
       setTimeout(loop, 3000);
       console.log('hello');
   }
   setTimeout(loop, 3000);
</script>
</html>

