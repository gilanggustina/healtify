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
    <div class="container-fluid" style="margin-top:20px">
        <center>
            <font size="6">Data Administrator</font>
        </center>
        <hr>
        <br>
        <a href="index.php?page=tambah_admin"><button class="btn btn-primary right">Tambah Data</button></a>
        <div class="table-responsive"><br />
            <table class="table table-striped jambo_table bulk_action" border="1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //query ke database SELECT tabel admin urut berdasarkan id yang paling besar
                    $sql = mysqli_query($koneksi, "SELECT * FROM admin ORDER BY id DESC") or die(mysqli_error($koneksi));
                    //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                    if (mysqli_num_rows($sql) > 0) {
                        //membuat variabel $no untuk menyimpan nomor urut
                        $no = 1;
                        //melakukan perulangan while dengan dari dari query $sql
                        while ($data = mysqli_fetch_assoc($sql)) {
                            //menampilkan data perulangan
                            $password = md5($data['password']);
                            echo '
						<tr>
							<td>' . $no . '</td>		
							<td>' . $data['username'] . '</td>
							<td>' . $password . '</td>
							<td>
                                <a href="index.php?page=edit_admin&id=' . $data['id'] . '" class="btn btn-secondary btn-sm"><i class="fas fa-edit">edit</i></a>
								<a href="delete_admin.php?id=' . $data['id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"><i class="fas fa-trash">hapus</i></a>
							</td>
						</tr>
						';
                            $no++;
                        }
                        //jika query menghasilkan nilai 0
                    } else {
                        echo '
					<tr class="text-center">
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
                    }
                    ?>
                <tbody>
            </table>
        </div>
    </div>
</body>

</html>