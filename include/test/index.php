<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="penyakit.php" method="get" id="search-form">
        <div class="input-group mb-3">
            <input id="textbox" name="q" type="text" placeholder="Masukan apa yang anda rasakan..." autocomplete="off" required>
            <div class="input-group-append">
                <!-- <button type="submit" class="d-none"></button> -->
                <button type="button" class="btn btn-light btn-lg mr-1" id="start-btn" title="Start">
                    <i class="fas fa-microphone" id="micoff"></i>
                    <i class="fa fa-assistive-listening-systems d-none" id="micon" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </form>
</body>

</html>