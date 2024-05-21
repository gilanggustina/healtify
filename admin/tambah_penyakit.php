<?php
include 'config.php';
session_start();
if ($_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
}
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" href="../vendor/img/caredoc_sOg_icon.ico" type="image/gif" sizes="16x16">
    <title>Caredoc</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <center>
        <font size="6">Tambah Data</font>
    </center>
    <hr>
    <?php
    if (isset($_POST['submit'])) {
        $id                 = $_POST['id'];
        $nama               = $_POST['nama'];
        $deskripsi          = $_POST['deskripsi'];
        $gejala             = $_POST['gejala'];
        $penyebab           = $_POST['penyebab'];
        $pengobatan         = $_POST['pengobatan'];
        $gambar             = $_POST['gambar'];

        $cek = mysqli_query($koneksi, "SELECT * FROM penyakit WHERE id='$id'") or die(mysqli_error($koneksi));

        if (mysqli_num_rows($cek) == 0) {
            $sql = mysqli_query($koneksi, "INSERT INTO penyakit (id, nama, deskripsi, gejala, penyebab, pengobatan, gambar) VALUES ('$id', '$nama', '$deskripsi', '$gejala', '$penyebab', '$pengobatan', '$gambar')") or die(mysqli_error($koneksi));

            if ($sql) {
                echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_penyakit";</script>';
            } else {
                echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
            }
        } else {
            echo '<div class="alert alert-warning">Gagal, Id sudah terdaftar.</div>';
        }
    }
    ?>

    <form action="index.php?page=tambah_penyakit" method="post">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="nama" class="form-control" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="deskripsi" class="form-control" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Gejala</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="gejala" class="form-control" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Penyebab</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="penyebab" class="form-control" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Pengobatan</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="pengobatan" class="form-control" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Gambar:</label>
            <div class="col-sm-6 p-3" style="padding-top: 0% !important;">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="float-left">
                            <label id="inputGroupFile01" class="btn btn-outline-secondary">
                                <input type="file" style="display: none;" for="inputGroupFile01" name="gambar">Upload</input>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-0">
                <a href="index.php?page=tampil_penyakit" style="width: 60%;" class="btn btn-secondary">Kembali</a>
                <input type="submit" name="submit" class="btn btn-primary" style="width: 34%;" value="Simpan">
            </div>
        </div>
    </form>
</body>

</html>