# locust-csv
report generator for load testing tool locust. 


Almost all comments are in Turkish thus if you are interested to use this script please contact me for support.
You won't even need a web server for locust-csv to generate summary report from locust csv files.


**Requirements**

- MySQL 5
- PHP 7


**e-mail sending features :** [PHPMailer](https://github.com/PHPMailer/PHPMailer)


**mobile mail reader supported html generation:** [Foundation for Emails](https://foundation.zurb.com/emails/docs/).



## Kurulumu
1. dosyaları herhangi bir klasöre aç
2. cd ile kaynaklar klasörüne gir
3. mysql -u root locustrapor < locustrapor.sql 
4. kaynaklar içindeki ayarlar.php dosyasında database bilgilerini ve csv dosyalarının olduğu klasör adını gir. ./csv/ yada ../csv/ gibi.
5. mailCek.php içindeki 16-18-19-24-25-26. satırlar değiştirilecek.


## Konsoldan Kullanımı 


``` bash rapor.sh YYYY-AA-GG ```
YYYY-AA-GG yerine , raporunu almak istediğiniz günü yazacaksınız.


**örneğin:**
``` bash rapor.sh 2018-06-18 ``` 


Çalıştırılması gereken 3 php dosyası var ancak üçününüde ard arda çalıştıracak tek bir **bash** scripti var.

Bash scripti çalıştırırken sadece tarih kısmı(2018-06-18) değiştirilecek
İstendiğinde cronjob oluştururken o günün tarihini otomatik yazdırabilirsiniz.


```bash rapor.sh 2018-06-16```
2018-06-16 yerine rapor almak istediğiniz tarihi yerleştirmeniz yeterli.
#### Php programı tüm işlemleri 3 aşamada gerçekleştiriyor
1. Önceki çalıştırmadan sonra eklenen dosyaların hangileri olduğunu buluyor (veritabanı ile dosya adlarını kıyaslıyor)
 1. Eğer yeni dosyalar varsa onları da veritabanına yazıyor. ```php yenileriDbYaz.php 2018-06-16 > log.txt```
2. e-mail ile gönderilecek html dosyasını oluşturuyor. ```php -f maileHtml.php 2018-06-16 > gonderilecek.htm```
3. mail çekiyor ```php mailCek.php```


## Detaylı kullanım

 mysql veritabanı içinde tek bir tablo var
 
 
| Adı           | Türü          | 
| ------------- |:-------------:| 
| ID            | int(12)	AUTO_ | 
| dosyaAd       | varchar(64)   | 
| Tarih         | date          | 
| Saat          | varchar(9)    |
| Setup         | varchar(9)	   |
| Test          | varchar(32) 	 |
| ToplamRequest | int(11)       |
| Hata          | int(11)       |
| OrtalamaRequests | int(11)    |


Normalde ana klasördeki 3 php dosyası haricinde hiç dosyayı çalıştırmak gerekmiyor. 
**tüm php dosyalarının bizden aldığı tek değişken :**  csv klasörü içindeki tarih klasörünün adı ( 2018-06-16 şeklinde. )
**örneğin :**  php yenileriDbYaz.php 2018-06-16

raporunu oluşturmak istediğin tarihi php dosya adının sonuna yazıyoruz.

```
cd ~/locustcsv/
php yenileriDbYaz.php 2018-06-16 
php -f maileHtml.php 2018-06-16 > gonderilecek.htm
php mailCek.php
```
**not:** (fetch error free_result hatası verebilir "YENİ KAYIT BAŞARIYLA OLUŞTURULDU" mesajı verdiği sürece önemli değil) sadece bir uyarı.
