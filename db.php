<?php

require_once "./ayarlar.php";

$baglanti = new mysqli($serverPort, $dbUser, $dbPass, $dbAd);
if ($baglanti->connect_errno) {
    echo "Mysqle bağlanamadım: (" . $baglanti->connect_errno . ") " . $baglanti->connect_error;
}
echo "<!-- mysql bağlandı --!>";