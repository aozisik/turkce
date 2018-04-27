PHP Türkçe Paketi 🇹🇷
==========

Herhangi bir framework'e bağlı olmayan, kullanımı basit ufak bir dil kütüphanesi.
Sözcükleri veya özel isimleri Türkçe'ye uygun olarak ismin 5 haline çekimlemenizi sağlar ve büyük - küçük harf dönüşümü yapar.

## Kurulum

    composer require aozisik/php-turkce

Autoload özelliğiniz açıksa, global olarak kullanabileceğiniz bir tr($sozcuk) fonksiyonu tanımlanacaktır (eğer boşta ise). Bu helper olmadan kullanabilmek için `new \Aozisik\Turkce\Cekimleyici($sozcuk)` yapabilirsiniz.

## İyelik ve Hâl Ekleri

İsimlerin yanına gelen ekleri koda gömdüğünüzde "Ahmet'nin" veya "Hikmet'ye" gibi Türkçe'ye uygun olmayan ve hiç doğal gözükmeyen bir sonuç elde edersiniz. Bu pakette gelen `ek` fonksiyonu tam olarak bu sorunu çözer.

	tr('İstanbul')->den(); // "İstanbul'dan"
	tr('Hatice')->i(); // "Hatice'yi"
	tr('Kemal')->in(); // "Kemal'in"
	tr('Kazım')->e(); // "Kazım'a"
	tr('Asu')->de(); // "Asu'da"

Kullanılabilen ekler:

* `i` (belirtme)
* `e` (yönelme)
* `de` (bulunma)
* `den` (ayrılma)
* `in` (iyelik)

## Büyük-Küçük Harf Dönüştürme

I ve i harfleri büyük-küçük harfe dönüştürülürken i ve I oluyor. Bu sinir bozucu problem için üç adet fonksiyon sunuyoruz.

	tr('İZMİRİN ILIK İLKBAHARLARI')->kucuk(); // izmirin ılık ilkbaharları
	tr('izmirin ılık ilkbaharları')->buyuk(); // İZMİRİN ILIK İLKBAHARLARI
	tr('izmirin ılık ilkbaharları')->baslik(); // İzmirin Ilık İlkbaharları