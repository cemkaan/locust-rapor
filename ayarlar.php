<?php
/**
 * Bu dosyada ayarlar var
 */

$tarihKlasoru = $argv[1] ; // Değiştirilmeyecek!! bash scriptinin aldığı tarih değeri $tarihKlasoru yerine yazılıyor


###########################################################
########## AŞAĞIDAKİ DEĞERLERİ DEĞİŞTİREBİLİRSİN.##########

$GLOBALS['klasor'] = "./csv/" .$tarihKlasoru. "/"; // hangi klasörde csv dosyaları var?
$serverPort = "localhost:3306"       ;
$dbUser = "locustcsv"                ;
$dbPass = "locustcsv"         ;
$dbAd = "locustcsv"                  ;

$detay = 0                            ; // detay istiyorsan 1 ; sade görünüm için 0 yapabilirsin.

