<?php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://covid19.mathdro.id/api/countries/ID",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $data = json_decode($response, true);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Data Persebaran Covid-19 oleh Kominfo Kabupaten kampar</title>
    <link rel="apple-touch-icon" sizes="180x180" href="fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="fav/favicon-16x16.png">
    <link rel="manifest" href="fav/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body onload="JavaScript:AutoRefresh(1000*60*30);">
    <main>
        <div class="section no-pad-bot" id="index-banner">
            <div class="container">
                <br />
                <div class="center"><img src="img/logo.png" alt="" width="90" /></div>
                <h3 class="header center orange-text">#INDONESIASIAGA</h3>
                <div class="row center">
                    <h5 class="header col s12 light">
                        Data Persebaran COVID-19 di Indonesia oleh Kominfo Kabupaten Kampar
                    </h5>
                    <br /><br /><br />
                    <h6>Update Terakhir tanggal : <?= date('d M Y', strtotime($data['lastUpdate'])) ?></h6>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col s4 m4 center">
                    <div class="card green light-1">
                        <div class="card-content white-text laporan">
                            <i class="large material-icons">face</i>
                            <p id="kasus"> <?= $data['confirmed']['value']; ?></p>
                            <p>Kasus Tercatat</p>
                        </div>
                    </div>
                </div>
                <div class="col s4 m4 center">
                    <div class="card green light-1">
                        <div class="card-content white-text laporan">
                            <i class="large material-icons">mood_bad</i>
                            <p id="kasus"> <?= $data['deaths']['value']; ?></p>
                            <p>Kasus Meninggal</p>
                        </div>
                    </div>
                </div>
                <div class="col s4 m4 center">
                    <div class="card green light-1">
                        <div class="card-content white-text laporan">
                            <i class="large material-icons">mood</i>
                            <p id="kasus"> <?= $data['recovered']['value']; ?></p>
                            <p>Kasus Sembuh</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="page-footer orange">
        <div class="container">
            <div class="row">
                <div class="col l12 s12 center">
                    <h5 class="white-text">Sumber Data</h5>
                    <p class="grey-text text-lighten-4">
                        https://covid19.mathdro.id/
                    </p>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container center">
                Made with ❤
                <a class="orange-text text-lighten-3" href="#">oleh Ardiansyah IT Kominfo Kampar</a>
            </div>
        </div>
    </footer>

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>

<script type="text/JavaScript">
    function AutoRefresh( t ) {
               setTimeout("location.reload(true);", t);
            }
</script>

</html>