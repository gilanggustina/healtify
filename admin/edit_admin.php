<?php
include 'config.php';

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" href="../vendor/img/caredoc_sOg_icon.ico" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <div class="" style="margin-top: 50px;">
        <center>
            <font size="6">Edit Data Administrator</font>
        </center>
        <hr>
        <?php
        //jika sudah mendapatkan parameter GET id dari URL
        if (isset($_GET['id'])) {
            //membuat variabel $id untuk menyimpan id dari GET id di URL
            $id = $_GET['id'];

            //query ke database SELECT tabel mahasiswa berdasarkan id = $id
            $select = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id'") or die(mysqli_error($koneksi));

            //jika hasil query = 0 maka muncul pesan error
            if (mysqli_num_rows($select) == 0) {
                echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
                exit();
                //jika hasil query > 0
            } else {
                //membuat variabel $data dan menyimpan data row dari query
                $data = mysqli_fetch_assoc($select);
            }
        }
        ?>
        <?php
        //jika tombol simpan di tekan/klik
        if (isset($_POST['submit'])) {
            $username     = $_POST['username'];
            $password     = md5($_POST['password']);
            $sql = mysqli_query($koneksi, "UPDATE admin SET username='$username', password='$password' WHERE id='$id'") or die(mysqli_error($koneksi));
            if ($sql) {
                echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_admin";</script>';
            } else {
                echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
            }
        }
        ?>
        <form action="index.php?page=edit_admin&id=<?php echo $id; ?>" method="post">
            <div class="item form-group">
                <label class="col-form-label col-md-1 col-sm-3 label-align">Username</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>" required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-1 col-sm-3 label-align">Password</label>
                <div class="col-md-6 col-sm-6">
                    <input type="password" name="password" class="form-control" value="admin123" required>
                </div>
            </div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md0">
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                    <a href="index.php?page=tampil_admin" class="btn btn-secondary">Kembali</a>
                </div>
        </form>
    </div>
</body>

</html>