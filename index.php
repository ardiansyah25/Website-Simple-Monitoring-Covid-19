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

    <meta property="og:title" content="Website Pantau Corona Oleh Kominfo Kabupaten Kampar" />
    <meta property="og:description" content="Website Data Update Persebaran Virus Corona atau Covid 19 di Indonesia Oleh Kominfo Kabupaten Kampar" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://pantaucorona.kamparkab.go.id/" />
    <meta property="og:image" content="img/logo.png" />

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body>
    <main>
        <div class="section no-pad-bot" id="index-banner">
            <div class="container">
                <br />
                <div class="center"><img src="img/logo.png" alt="" width="90" /></div>
                <h4 class="header center orange-text">#INDONESIASIAGA</h4>
                <div class="row center">
                    <h5 class="header col s12 light">
                        Data Persebaran COVID-19 di Indonesia oleh Kominfo Kabupaten Kampar
                    </h5>
                    <br /><br /><br />
                    <h6 id="lastUpdate"></h6>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row" id="datareal">
                <div class="col s4 m4 center">
                    <div class="card green light-1">
                        <div class="card-content white-text laporan">
                            <i class="large material-icons">face</i>
                            <p id="confirmed"></p>
                            <p>Kasus Tercatat</p>
                        </div>
                    </div>
                </div>
                <div class="col s4 m4 center">
                    <div class="card green light-1">
                        <div class="card-content white-text laporan">
                            <i class="large material-icons">mood_bad</i>
                            <p id="deaths"></p>
                            <p>Kasus Meninggal</p>
                        </div>
                    </div>
                </div>
                <div class="col s4 m4 center">
                    <div class="card green light-1">
                        <div class="card-content white-text laporan">
                            <i class="large material-icons">mood</i>
                            <p id="recovered"></p>
                            <p>Kasus Sembuh</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12">
                    <div class="card  orange darken-3">
                        <div class="card-content white-text laporan">
                            <p style="font-size: 1.5rem">Cara pencegahan</p>
                            <p>Beberapa tips untuk menghindari virus corona.</p>
                            <hr>
                            <ol>
                                <li> Mencuci tangan dengan benar</li>
                                <li> Menggunakan masker</li>
                                <li> Menjaga daya tahan tubuh</li>
                                <li> Tidak pergi ke negara terjangkit</li>
                                <li> Minum vitamin C</li>
                                <li>Hindari menyentuh mata, hidung, dan mulut dengan tangan yang tidak dicuci</li>
                                <li> Konsumsi gizi seimbang, perbanyak sayur dan buah</li>
                                <li> Rajin olahraga dan istirahat cukup</li>
                                <li>Jangan mengonsumsi daging yang tidak masak</li>
                            </ol>
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
    $(document).ready(function () {
       datacovid();
       setInterval("datacovid();",(1000*60)*30); 
    });

function datacovid(){
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": "https://covid19.mathdro.id/api/countries/ID",
        "method": "GET",
}

$.ajax(settings).done(function (response) {
    const months = ["JAN", "FEB", "MAR","APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];
    var LastUpdate = Date.parse(response['lastUpdate']);
    var tgl = new Date(LastUpdate);
    var tglHasil = tgl.getDate()+ '-'+ months[tgl.getMonth()]+'-'+tgl.getFullYear();
    $('#confirmed').html(response['confirmed']['value']);
    $('#deaths').html(response['deaths']['value']);
    $('#recovered').html(response['recovered']['value']);
    $('#lastUpdate').html('Update Terakhir tanggal : '+tglHasil);
    console.log('chek Data Baru setiap 30 Menit '+ new Date());
    
});
}

</script>

</html>