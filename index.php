<?php

$parsed = parse_url($_SERVER['REQUEST_URI']);

$path = $parsed['path'];

switch($path){
    case '/':
        require './views/kezdolap.html';
        break;

    case '/kaloriaszukseglet':
        //Példa:  http://localhost:8080/?kg=70&szandek=sulytartas&testtipus=ectomorph

        //1. Kiveszem az adatokat az URL ből
        $kg = (float)($_GET['kg'] ?? 0);  
        $szandek = $_GET['szandek'] ?? "sulytartas";
        $testTipus = $_GET['testtipus'] ?? "mesomorph";

        //2. lépés Használom a json fájlom az adatok felhasználásához
        $kaloriaszukseglet = json_decode(file_get_contents('./kaloriaszukseglet.json'), true);

        //3. Számítást hajtok végre
        $atvaltom = $kg * 2.2; 
        $kaloria = $atvaltom * $kaloriaszukseglet[0]['szandek'][$szandek]; 

        $feherjeKaloriaban = floor($kaloria * $kaloriaszukseglet[1]['testtipus'][$testTipus]['feherje']); 
        $szenhidratKaloriaban = floor($kaloria * $kaloriaszukseglet[1]['testtipus'][$testTipus]['szenhidrat']); 
        $zsirKaloriaban = floor($kaloria * $kaloriaszukseglet[1]['testtipus'][$testTipus]['zsir']);

        $gFehejre = floor($feherjeKaloriaban / $kaloriaszukseglet[2]['kaloria']['gFeherje']); 
        $gSzenhidrat = floor($szenhidratKaloriaban / $kaloriaszukseglet[2]['kaloria']['gSzenhidrat']); 
        $gZsir = floor($zsirKaloriaban / $kaloriaszukseglet[2]['kaloria']['gZsir']); 
        require './views/kaloriaszukseglet.php';
        break;
    default:
        echo 'Oldal nem található <a href="/">Vissza a kezdőoldalra</a>';
}


