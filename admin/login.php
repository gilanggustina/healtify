<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" href="../vendor/img/caredoc_sOg_icon.ico" type="image/gif" sizes="16x16">
    <title>Caredoc</title>
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<body>
    <form action="proses_login.php" method="POST">
        <div class="form-box">
            <h1>Login Page</h1>
            <!-- cek pesan notifikasi -->
            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") {
                    echo "<center>Login gagal! username dan password salah!</center>";
                } else if ($_GET['pesan'] == "logout") {
                    echo "<center>Anda telah berhasil logout</center>";
                } else if ($_GET['pesan'] == "belum_login") {
                    echo "<center>Anda harus login untuk mengakses halaman admin</center>";
                }
            }
            ?>
            <div class="input-box">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="username" autocomplete="off" name="username">
            </div>
            <div class="input-box">
                <i class="fa fa-key" aria-hidden="true"></i>
                <input type="password" placeholder="password" autocomplete="off" id="myInput" name="password">
                <span class="eye" onclick="myFunction()">
                    <i id="hide1" class="fa fa-eye"></i>
                    <i id="hide2" class="fa fa-eye-slash"></i>
                </span>
            </div>
            <button type="submit" name="masuk" class="login-btn">LOGIN</button>
        </div>
    </form>
</body>
<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        var y = document.getElementById("hide1");
        var z = document.getElementById("hide2");
        if (x.type === 'password') {
            x.type = "text";
            y.style.display = "block";
            z.style.display = "none";
        } else {
            x.type = "password";
            y.style.display = "none";
            z.style.display = "block";
        }
    }
</script>

</html>