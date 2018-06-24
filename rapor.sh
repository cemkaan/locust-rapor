#!/bin/bash
kirmizi=`tput setaf 1`
yesil=`tput setaf 2`
renksiz=`tput sgr0`
if [ "$1" != "" ]; then
echo "${yesil} $1 dizini içindeki csv dosyaları kullanılarak ${renksiz} rapor oluşturulacak"
php yenileriDbYaz.php $1
echo -n "${yesil}Gönderilecek mail ${renksiz}oluşturulsun mu?(e/h)"
read cevap
	if [ "$cevap" != "${cevap#[Ee]}" ] ;then
		php -f maileHtml.php $1 > gonderilecek.htm
		echo -n "${yesil}Gönderilecek mail ${renksiz}oluşturuldu "
		sleep 1
		echo -n ".. hazırlanan ${yesil}gonderilecek.html ${renksiz} dosyası gönderilsin mi?(e/h)"
		read cevap
		if [ "$cevap" != "${cevap#[Ee]}" ] ;then
			php mailCek.php
		else
			exit
		fi
	else
		exit
	fi
else
    echo "${kirmizi} lütfen hangi klasör içinin kullanılacağını  YYYY-AA-GG formatında yazın ${renksiz}"
	echo "(ör: 'bash rapor.sh 2018-06-18')"
fi