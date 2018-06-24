<?php
/**
 * Bu dosya mysqlden sorgu yapıp html tablo içinde sonuç gösteriyor
 */

require_once "./ayarlar.php";
require_once "./db.php";
require_once "./fonksiyonlar.php";

$sorgu = "SELECT Tarih,Saat,Setup,Test,ToplamRequest,Hata,OrtalamaRequests FROM locustrapor  WHERE Tarih = '$tarihKlasoru' ORDER BY `locustrapor`.`ID` ASC";
$mysqlSonuc = mysqli_query($baglanti, $sorgu);

$tumBasliklar = array();  //declare an array for saving property

//showing property
echo '<table class="data-table">
        <tr class="data-heading" style="background-color: cornflowerblue; font-size: larger;">';  //tablo ve tr taglerini başlat
while ($baslik = mysqli_fetch_field($mysqlSonuc)) {
    echo '<td>' . $baslik->name . '</td>';  //alan başlığını al
    array_push($tumBasliklar, $baslik->name);  //array yap
}
echo '</tr>'; // tr tag bitir

//tüm verileri göster
while ($satir = mysqli_fetch_array($mysqlSonuc)) {
    echo "<tr>";
    foreach ($tumBasliklar as $item) {
        echo '<td style="padding: 1em;">' . $satir[$item] . '</td>'; //özellik değerlerini ekle
    }
    echo '</tr>';
}
echo "</table>";