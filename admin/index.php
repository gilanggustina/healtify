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
            <h4> Selamat Datang <?php echo ucfirst($_SESSION['username']); ?></h4>
        </div>
        <a href="index.php?=page=home.php"><i class="fas fa-home"></i><span>Dashboard</span></a>
        <a href="index.php?page=tampil_admin"><i class="fas fa-user"></i><span>Data Admin</span></a>
        <a href="index.php?page=tampil_penyakit"><i class="fas fa-desktop"></i><span>Data Penyakit</span></a>
        <a href="index.php?page=tampil_feedback"><i class="fas fa-ban"></i></i><span>Data Penyakit Kosong</span></a>
        <a href="../index.php"><i class="fas fa-location-arrow"></i><span>Halaman Web</span></a>
    </div>
    <!--sidebar akhir-->

    <div class="content">
        <?php
        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        switch ($queries['page']) {
            case 'tampil_penyakit':
                include 'tampil_penyakit.php';
                break;

            case 'tampil_cari':
                include 'tampil_cari.php';
                break;

            case 'tambah_penyakit':
                include 'tambah_penyakit.php';
                break;

            case 'edit_penyakit':
                include 'edit_penyakit.php';
                break;

            case 'tampil_admin':
                include 'tampil_admin.php';
                break;

            case 'tambah_admin':
                include 'tambah_admin.php';
                break;

            case 'edit_admin':
                include 'edit_admin.php';
                break;

            case 'delete_admin':
                include 'delete_admin.php';
                break;

            case 'tampil_feedback';
                include 'tampil_feedback.php';
                break;

            case 'delete_feedback':
                include 'delete_feedback.php';
                break;

            default:
                #code...
                include 'home.php';
                break;
        }
        ?>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.nav_btn').click(function() {
                $('.mobile_nav_items').toggleClass('active');
            });
        });
    </script>

</body>

</html>