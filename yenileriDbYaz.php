<?php
/**
 * Bu dosya csvlerin bilgilerini mysqle yazıyor
 */

require_once "./ayarlar.php";
require_once "./db.php";
require_once "./fonksiyonlar.php";

#####################################   yeni olanları bul    ############################################


$klasorIcindekiDosyalar = dosyaAdlari($klasor);
echo "\n######################################################## \n";
echo "########## klasör içindeki dosyaların listesi ########## \n";
echo "######################################################## \n";
//print_r($klasorIcindekiDosyalar);
foreach ($klasorIcindekiDosyalar as $dosyaAd) {
    echo $dosyaAd. "\n";
}
echo "      ---------------------------\n";

$sorgu = "SELECT dosyaAd FROM locustrapor";
$mysqlSonuc = mysqli_query($baglanti, $sorgu);

while ($satir = $mysqlSonuc->fetch_row()) {
    $dbDekiDosyaAdlari[] = $satir[0];
}

#####################################   database içi doluysa   ############################################
if (isset($dbDekiDosyaAdlari)) {  // database içinde hiç dosya varsa
    echo $mor."\n######################################################## \n";
    echo "#########  database içindeki dosyaların listesi ######## \n";
    echo "######################################################## \n";
    foreach ($dbDekiDosyaAdlari as $dosyaAd) {
        echo $dosyaAd. "\n";
    }
//
//
//    echo $mor."     ----------------------------------------------------\n";

    $yeniler = array_diff($klasorIcindekiDosyalar, $dbDekiDosyaAdlari);
} else { #####################################   database içi boşsa   ############################################

    $yeniler = $klasorIcindekiDosyalar;

    echo $kirmizi . "       Veritabanı boş \n ".$renksiz;
}


    echo "      ---------------------------------\n".$renksiz;


#####################################   yeni dosya durumuna göre switch   ############################################
switch ($yeniler) {
    case NULL: // yeni yoksa
        echo "\n \033[01;31m ################ ".$tarihKlasoru ." KLASÖRÜNDE YENİ BİR DOSYA YOK ################ \033[0m \n";

        break;
    default:  // yeni varsa
#####################################   veri tabanına yazacaklarını hazırla   ############################################
        echo "\n ################################################################################";
        echo "\n ##  klasör içinde (veri tabanında olmayan) " . count($yeniler) . " adet yeni dosya görünüyor ## \n";

        foreach ($yeniler as $yeniDosyaAdi) { // her yeni dosya için yapılacaklar
            // echo var_dump(tumCSV($yeniDosyaAdi)). " \n ";  DİKKAT !!! tüm csv içini görmek için bu kodu aç
            $yeniTarih = tarih($yeniDosyaAdi);
            $yeniSaat = saat($yeniDosyaAdi);
            $yeniSetup = setup($yeniDosyaAdi);
            $yeniTest = test($yeniDosyaAdi);
            $satirSayisi = kacSatir($yeniDosyaAdi)-1;
            $yeniToplamRequest = tumCSV($yeniDosyaAdi)[$satirSayisi][2];
            $yeniHata = tumCSV($yeniDosyaAdi)[$satirSayisi][3];
            $yeniOrtRequest = tumCSV($yeniDosyaAdi)[$satirSayisi][9];
            $tumCSVArray = tumCSV($yeniDosyaAdi);

            /** @var ayar $detay */
            if ( $detay == 1) {
                echo $yesil." ----------------------------------------------------------------------------- \n ". $renksiz;
                echo $mavi."Dosya adı:          " . $yeniDosyaAdi . " \n ";
                echo $mavi."Satır Sayısı:        ".$renksiz . kacSatir($yeniDosyaAdi). " \n ";
                echo $mavi."Tarih:               ".$renksiz . tarih($yeniDosyaAdi) . " \n ";
                echo $mavi."Saat:                ".$renksiz . saat($yeniDosyaAdi) . " \n ";
                echo $mavi."Setup:               ".$renksiz . setup($yeniDosyaAdi) . " \n ";
                echo $mavi."Test:                ".$renksiz . test($yeniDosyaAdi) . " \n ";
                echo $mavi."Toplam istek:        ".$renksiz . $yeniToplamRequest . " \n ";
                echo $mavi."Hata:                ".$renksiz . $yeniHata . " \n ";
                echo $mavi."Ortalama Requests:   ".$renksiz . $yeniOrtRequest . " \n";

            }


            #####################################   veri tabanına yaz  ############################################

            $yazdirmaSorgu = "INSERT INTO locustrapor(dosyaAd,Tarih,Saat,Setup,Test,ToplamRequest,Hata,OrtalamaRequests) VALUES ('$yeniDosyaAdi','$yeniTarih',' $yeniSaat','$yeniSetup','$yeniTest','$yeniToplamRequest','$yeniHata','$yeniOrtRequest')";
            ## check connection


//            if (isset($mysqlSonuc)) {
//                mysqli_free_result($mysqlSonuc);
//            }
            // print_r($yazdirmaSorgu); // sorgunun nasıl olduğunu görmek için bu kodu aç


            if (mysqli_query($baglanti, $yazdirmaSorgu)) {
                echo $yesil." ". $yeniDosyaAdi ." için YENİ KAYIT BAŞARIYLA OLUŞTURULDU  \n";
                echo " -------------------------------------------------------------------------------- \n \n \n". $renksiz;
            } else {
                echo "HATA: " . $yazdirmaSorgu . " \n " . mysqli_error($baglanti);
            }


        } // yeni dosya switch


        break;
} // switch sonu


## bağlantıyı kes
mysqli_close($baglanti);
