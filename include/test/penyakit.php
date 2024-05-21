<?php
include "../admin/config.php";
$ambil = "SELECT * FROM penyakit ORDER BY nama ASC";
if (isset($_GET['q'])) {
    $isi = $_GET['q'];
    $pecah = explode(" ", $isi);
    $z = count($pecah);
    for ($i = 0; $i < $z; $i++) {
        $data_nama = $pecah[$i];
        $ambil = "SELECT * FROM penyakit WHERE nama='$data_nama' OR gejala='$data_nama' OR penyebab='$data_nama' OR pengobatan='$data_nama' OR deskripsi='$data_nama' ";
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="row">
        <?php
        $query = mysqli_query($koneksi, $ambil);

        // untuk perulangan seluruh data penyakit
        while ($asosiasi = mysqli_fetch_assoc($query)) {
            $id_penyakit        = $asosiasi['id'];
            //nama penyakit
            $nama_penyakit      = $asosiasi['nama'];
            // deskrupsi
            $data_deskripsi     = $asosiasi['deskripsi'];
            //penyebab
            $data_penyebab      = $asosiasi['penyebab'];
            // gambar
            $gambar             = $asosiasi['gambar'];
            //gejala
            $data_gejala        = explode(",", $asosiasi['gejala']);
            // pengobatan
            $data_pengobatan    = explode(".", $asosiasi['pengobatan']);
        ?>

            <div class="col-sm-6 p-3">
                <div class="container">
                    <div class="card sdh2 mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="vendor/img/penyakit/<?= "$gambar"; ?>" class="card-img mt-10" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= "$nama_penyakit"; ?></h5>
                                    <p class="card-text text-left" style="overflow: auto;"><?= "$data_deskripsi"; ?></p>
                                    <a href="deskripsi_penyakit.php?id=<?= $asosiasi['id']; ?>" class="btn btn-primary" data>Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>