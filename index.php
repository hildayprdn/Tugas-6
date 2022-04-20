<!DOCTYPE html>
<html lang="en">

<?php
// inisialisasi array
$bandara_asal = [
    'Soekarno Hatta ' => 65000,
    'Husein Sastranegara' => 50000,
    'Abdul Rachman Saleh' => 40000,
    'Juanda' => 30000
];
// inisialisasi array
$bandara_tujuan = [
    'Ngurah Rai' => 85000,
    'Hasanuddin' => 70000,
    'Inanwatan' => 90000,
    'Sultan Iskandar Muda' => 60000
];


?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>website pendaftaran rute penerbangan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
<?php
// cek jika ada masukan
if (isset($_POST['harga'])) {
    // mendeklarasikan dan memberikan nilai untuk setiap variabel yang akan ditampilkan
    // nilai random untuk nomor
    $nomor = rand();
    // mengambil tanggal dan waktu saat ini
    $tanggal =  date("l jS \of F Y h:i:s A");
    // Mengambil nama dari input user
    $maskapai =  $_POST['nama'];
    // mencari nama bandara dari input user
    $asal = array_search($_POST['asal'],$bandara_asal);
    // mencari nama bandara dari input user
    $tujuan = array_search($_POST['tujuan'],$bandara_tujuan);
    // mengambil harga dari input user
    $harga = $_POST['harga'];
    // kalkulasi pajak
    $pajak = $_POST['asal'] + $_POST['tujuan'];
    // kalkulasi total
    $total_pembayaran = $harga + $pajak;

    ?>
        <div class="card text-white bg-success mb-3 mt-3">
            <div class="card-header">Total Pembayaran Anda</div>
            <div class="card-body">
                <h5 class="card-title">Silahkan cek dibawah ini</h5>
                <!-- menampilkan semua bagian -->
                <table class="table">
                    <tr>
                        <td>
                            Nomor
                        </td>
                        <td>
                        <?= $nomor?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            tanggal
                        </td>
                        <td>
                        <?= $tanggal?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            maskapai
                        </td>
                        <td>
                        <?= $maskapai?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            asal
                        </td>
                        <td>
                        <?= $asal?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            tujuan
                        </td>
                        <td>
                        <?= $tujuan?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            harga
                        </td>
                        <td>
                        <?='Rp.'.$harga?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            pajak
                        </td>
                        <td>
                        <?='Rp.'.$pajak?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            total
                        </td>
                        <td>
                        <?='Rp.'.$total_pembayaran?>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
<?php } ?>
        <div class="jumbotron m-5">
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">Ini adalah website pendaftaran rute penerbangan</p>
            <hr class="my-4">
            <p>Silahkan lakukan pendaftara anda dibawah ini</p>
        </div>

        <form class="my-3" action="index.php" method='POST'>
            <div class="col-lg-12">
                <label for="validationCustom01">Nama Maskapai</label>
                <input name="nama" type="text" class="form-control" id="validationCustom01" required>
                <div class="invalid-feedback">
                    Please provide a valid Name
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="validationCustom02">Bandara Asal</label>
                    <select name="asal" class="custom-select" required>
                    <option value="" disabled selected>select one</option>
                    <!-- Menampilkan semua bandara asal -->
                    <?php
                        foreach ($bandara_asal as $k => $v) {
                        ?>
                            <option value="<?= $v ?>"><?= $k ?></option>
                        <?php
                        } ?>
                    </select>
                    <div class="invalid-feedback">Example invalid custom select feedback</div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="validationCustom02">Bandara Tujuan</label>
                    <select name="tujuan" class="custom-select" required>
                    <option value="" disabled selected>select one</option>
                    <!-- menampilkan semua bandara tujuan -->
                        <?php
                        foreach ($bandara_tujuan as $k => $v) {
                        ?>
                            <option value="<?= $v ?>"><?= $k ?></option>
                        <?php
                        } ?>

                    </select>
                    <div class="invalid-feedback">Example invalid custom select feedback</div>
                </div>
            </div>
            <div class="col-lg-12">
                <label for="validationCustom01">Harga</label>
                <input name="harga" type="number" class="form-control" id="validationCustom01" required>
                <div class="invalid-feedback">
                    Please provide a valid Name
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</body>

</html>