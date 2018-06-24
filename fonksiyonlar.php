<?php
/**
 * Bu dosyada return fonksiyonlar var
 */


require_once "./ayarlar.php";

$renksiz = "\033[0m";
$kirmizi =  "\033[1;31m";
$yesil = "\e[01;32m";
$mavi = "\033[1;34m";
$mor = "\033[1;35m";
#####################################   DOSYA ADLARI    ############################################

/**
 * Dosya adlarını dosyaAdi diye bir değişken dizisine koyuyor
 *
 * klasör isimleri olmadan sadece dosya isimlerini bir dizine koyuyor
 * dosyaAdi
 *
 * @param $klasor değişkeni fonksiyona tırnak içinde gönderiliyor "klasör "./csv/"
 *    kendisine göre
 *
 * @return dosya adlarının listesi $dosyalar
 */


function dosyaAdlari($klasor)
{
    $tumDosyalar = array_diff(scandir($klasor), array('.', '..'), array('.', '..')); // klasör isimleri olmadan sadece dosyaların isimlerini bir arraye koy
    $dosyalar = preg_grep("/distribution/", $tumDosyalar, PREG_GREP_INVERT); // request sonlu dosyaları kaldır
    return $dosyalar;
}

###################################    DOSYA ADI BÖLÜMLERİ  #####################################

/**
 * aldığı dosya ismini $bolumler diye bir değişken dizisine koyuyor
 *
 * dosya adını alıp _ işaretiyle bölüyor sonra bolumler diye değişken dizisi oluşturuyor
 * dosyaAdi
 *
 * @param $dosyaAdi değişkeni fonksiyona tırnak içinde gönderiliyor
 *    dosyaAdiBolumleri("TestDB_setup0_2018-06-14_1030_distribution.csv") şeklinde
 *
 * @return $bolumler bölümlerin listesi
 */


function dosyaAdiBolumleri($dosyaAdi)
{
    $bolumler = preg_split('[_]', $dosyaAdi, 0, PREG_SPLIT_NO_EMPTY);
    return $bolumler;
}

###################################         TARİH           ######################################

/**
 * aldığı dosya ismini $tarih diye bir değişkene  koyuyor
 *
 * dosya adını alıp _ işaretiyle bölüyor sonra bütün bölümleri $bolumler değişken dizisine yazıyor
 * dosyaAdi
 *
 * @param $dosyaAdi değişkeni fonksiyona tırnak içinde gönderiliyor
 *    tarih("TestDB_setup0_2018-06-14_1030_distribution.csv") şeklinde kullanılır
 *
 * @return $tarih dosyanın tarihi
 */


function tarih($dosyaAdi)
{
    $bolumler = preg_split('[_]', $dosyaAdi, 0, PREG_SPLIT_NO_EMPTY);
    $tarih = $bolumler[2];
    return $tarih;
}

###################################         saat           ######################################

/**
 * aldığı dosya ismini $saat diye bir değişkene  koyuyor
 *
 * dosya adını alıp _ işaretiyle bölüyor sonra bütün bölümleri $bolumler değişken dizisine yazıyor
 * dosyaAdi
 *
 * @param $dosyaAdi değişkeni fonksiyona tırnak içinde gönderiliyor
 *    tarih("TestDB_setup0_2018-06-14_1030_distribution.csv") şeklinde kullanılır
 *
 * @return $tarih dosyanın tarihi
 */


function saat($dosyaAdi)
{
    $bolumler = preg_split('[_]', $dosyaAdi, 0, PREG_SPLIT_NO_EMPTY);
    $saat = $bolumler[3];
    return $saat;
}

##################################      SETUP        ##########################################

/**
 * aldığı dosya ismini ayıklayıp $setup diye bir değişkene  koyuyor
 *
 * dosya adını alıp _ işaretiyle bölüyor sonra bütün bölümleri $bolumler değişken dizisine yazıyor
 * dosyaAdi ilk bölümü setupTum diye bir değişkene atıyor sonra sağdan ilk karaketerini alıyor
 *
 * @param $dosyaAdi değişkeni fonksiyona tırnak içinde gönderiliyor
 *    setup("TestDB_setup0_2018-06-14_1030_distribution.csv") şeklinde
 *
 * @return $setup dosyanın setupı en sağ karakteri
 */


function setup($dosyaAdi)
{
    $bolumler = preg_split('[_]', $dosyaAdi, 0, PREG_SPLIT_NO_EMPTY);
    $setupTum = $bolumler[1];
    $setup = substr($setupTum, -1);

    return $setup;
}


##################################      TEST        ##########################################

/**
 * aldığı dosya ismini ayıklayıp $test diye bir değişkene  koyuyor
 *
 * dosya adını alıp _ işaretiyle bölüyor sonra bütün bölümleri $bolumler değişken dizisine yazıyor
 *
 * @param $dosyaAdi değişkeni fonksiyona tırnak içinde gönderiliyor
 *    test("TestDB_setup0_2018-06-14_1030_distribution.csv") şeklinde
 *
 * @return $test dosyanın testi
 */


function test($dosyaAdi)
{
    $bolumler = preg_split('[_]', $dosyaAdi, 0, PREG_SPLIT_NO_EMPTY);
    $test = $bolumler[0];
    return $test;
}

#


##################################      tum CSV   verileri     ###################################

/**
 * aldığı dosya ismini ayıklayıp veri diye bir değişkene  koyuyor
 *
 * dosya adını alıp csv dosyasını bir array haline getiriyor
 * dosyaAdi csv dosyasını her satır bir array gurubu olacak şekilde
 * array (size=3)
 * 0 =>
 * array (size=10)
 * 0 => string 'Method' (length=6)
 * 1 => string 'Name' (length=4)
 * 2 => string '# requests' (length=10)
 * 3 => string '# failures' (length=10)
 * 4 => string 'Median response time' (length=20)
 * 5 => string 'Average response time' (length=21)
 * 6 => string 'Min response time' (length=17)
 * 7 => string 'Max response time' (length=17)
 * 8 => string 'Average Content Size' (length=20)
 * 9 => string 'Requests/s' (length=10)
 * 1 =>
 * array (size=10)
 * 0 => string 'POST' (length=4)
 * 1 => string '/TransferService.svc/json/TestCacheMethod' (length=41)
 * 2 => string '2065695' (length=7)
 * 3 => string '1' (length=1)
 * 4 => string '34' (length=2)
 * 5 => string '51' (length=2)
 * 6 => string '28' (length=2)
 * 7 => string '15367' (length=5)
 * 8 => string '4' (length=1)
 * 9 => string '1726.69' (length=7)
 * 2 =>
 * array (size=10)
 * 0 => string 'None' (length=4)
 * 1 => string 'Total' (length=5)
 * 2 => string '2065695' (length=7)
 * 3 => string '1' (length=1)
 * 4 => string '34' (length=2)
 * 5 => string '51' (length=2)
 * 6 => string '28' (length=2)
 * 7 => string '15367' (length=5)
 * 8 => string '4' (length=1)
 * 9 => string '1726.69' (length=7)
 *
 * @param $dosyaAdi değişkeni fonksiyona tırnak içinde gönderiliyor
 *    setup("TestDB_setup0_2018-06-14_1030_distribution.csv") şeklinde
 *
 * @return $veri
 */


function tumCSV($dosyaAdi)
{
    $veri = array_map('str_getcsv', file($GLOBALS['klasor'] . $dosyaAdi));
    return $veri;
}


/**
 * aldığı dosya ismini ayıklayıp veri diye bir değişkene  koyuyor
 *
 * dosya adını alıp csv dosyasını bir array haline getiriyor
 * dosyaAdi csv dosyasını her satır bir array gurubu olacak şekilde

 *
 * @param $dosyaAdi değişkeni fonksiyona tırnak içinde gönderiliyor
 *    setup("TestDB_setup0_2018-06-14_1030_distribution.csv") şeklinde
 *
 * @return $veri
 */


function kacSatir($dosyaAdi)
{
    $fp = file($GLOBALS['klasor'] . $dosyaAdi);
    $kacSatir = count($fp);
    return $kacSatir;
}