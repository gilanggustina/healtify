<?php
include 'config.php';
session_start();
if ($_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" href="../vendor/img/caredoc_sOg_icon.ico" type="image/gif" sizes="16x16">
    <title> Caredoc</title>
    <link rel="stylesheet" href="css/style_admin.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
    <!-- Icon -->
    <link rel="icon" href="../vendor/img/caredoc.png" sizes="20x20" type="imgae/png">
    <script src="../vendor/jquery/jquery.min.js" charset="utf-8"></script>
</head>

<body>
    <input type="checkbox" id="check">
    <!--header -->
    <header>
        <label for="check">
            <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>
        <div class="left_area">
            <h3>Care<span>doc</span></h3>
        </div>
        <div class="right_area">
            <a href="logout.php" class="logout_btn">Logout</a>
        </div>
    </header>
    <!--header akhir-->
    <!--navigasi mobile -->
    <div class="mobile_nav">
        <div class="nav_bar">
            <i class="fa fa-bars nav_btn"></i>
        </div>
        <div class="mobile_nav_items">
            <a href="index.php?=pagehome.php"><i class="fas fa-home"></i><span>Dashboard</span></a>
            <a href="index.php?page=tampil_admin"><i class="fas fa-user"></i><span>Data Admin</span></a>
            <a href="index.php?page=tampil_penyakit"><i class="fas fa-desktop"></i><span>Data Penyakit</span></a>
            <a href="index.php?page=tampil_feedback"><i class="fas fa-ban"></i></i><span>Data Penyakit Kosong</span></a>
            <a href="../index.php"><i class="fas fa-location-arrow"></i><span>Halaman Web</span></a>
        </div>
    </div>
    <!--navigasi mobile akhir-->
    <!--sidebar-->
    <div class="sidebar">
        <div class="profile_info">
            <h4> Selamat Datang <?php echo $_SESSION['username']; ?></h4>
        </div>
        <a href="index.php?=page=home.php"><i class="fas fa-home"></i><span>Dashboard</span></a>
        <a href="index.php?page=tampil_admin"><i class="fas fa-user"></i><span>Data Admin</span></a>
        <a href="index.php?page=tampil_penyakit"><i class="fas fa-desktop"></i><span>Data Penyakit</span></a>
        <a href="index.php?page=tampil_feedback"><i class="fas fa-ban"></i></i><span>Data Penyakit Kosong</span></a>
        <a href="../index.php"><i class="fas fa-location-arrow"></i><span>Halaman Web</span></a>
    </div>
    <!--sidebar akhir-->

    <div class="content">
        <div class="" style="margin-top:20px">
            <center>
                <font size="6">Data Penyakit</font>
            </center>
            <hr>
            <br>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <!-- Search / Cari -->
                    <form action="cari_penyakit.php" method="post">
                        <div class="input-group">
                            <input type="text" name="kunci" placeholder="Cari..." autocomplete="off" class="form-control" style="padding: 0% 5px !important;">
                            <div class="input-group-append">
                                <button type="submit" name="cari" class="btn btn-secondary"><i class="fa fa-search"></i> Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
                <br>
                <a href="index.php?page=tambah_penyakit"><button class="btn btn-primary right">Tambah Data</button></a>
            </div>
            <div class="table-responsive"><br />
                <table class="table table-striped jambo_table bulk_action" border="1">
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>Nama Penyakit</th>
                            <th>Deskripsi</th>
                            <th>Gejala</th>
                            <th>Penyebab</th>
                            <th>Pengobatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['cari'])) {
                            $kunci = $_POST['kunci'];
                            $sql = "SELECT * FROM penyakit WHERE nama LIKE '%$kunci%' OR penyebab LIKE '%$kunci%' OR gejala LIKE '%$kunci%' OR pengobatan LIKE '%$kunci%' OR deskripsi LIKE '%$kunci%'";
                            $query = mysqli_query($koneksi, $sql);
                            $no = 1;
                            if ($data = mysqli_fetch_array($query)) {
                                $test = $data['nama'];
                                echo '<tr>';
                                echo '<td>' . $no . '</td>';
                                echo '<td>' . $data['nama'] . '</td>';
                                echo '<td>' . $data['deskripsi'] . '</td>';
                                echo '<td>' . $data['gejala'] . '</td>';
                                echo '<td>' . $data['penyebab'] . '</td>';
                                echo '<td>' . $data['pengobatan'] . '</td>';
                                echo '<td>
                                <a href="index.php?page=edit_penyakit&id=' . $data['id'] . '" class="btn btn-outline-secondary btn-sm"><i class="fas fa-edit"> edit</i></a>
								<a href="delete_penyakit.php?id=' . $data['id'] . '" class="btn btn-outline-danger btn-sm mt-2" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"><i class="fas fa-trash"> hapus</i></a>
							    </td>
                        </tr>';
                            } else {
                                echo '<tr class="text-center">
                            <td colspan="6">Tidak ada data.</td></tr>';
                            }
                        }
                        $no++;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
</body>

</html>