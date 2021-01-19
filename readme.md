# PHP Türkçe Paketi 🇹🇷

![](https://github.com/aozisik/turkce/workflows/run-tests/badge.svg)

## Ne yapar?

- Türkçe sözcüğün içindeki harfleri bozmadan büyültür/küçültür veya başlık yapar.

- Verilen Türkçe sözcüğü veya özel ismi, istenen eke göre çekimler. (-e, -i, -in, -de, -den)

## Kurulum

    composer require aozisik/php-turkce

## Kullanım

### Sözcükleri Büyültme/Küçültme ve Başlık Yapma

PHP'de `strtoupper` ve `strtolower` fonksiyonları Türkçe ile uyumsuzdur. Yerine tavsiye edilen `mb_strtoupper` ve `mb_strtolower` ise neredeyse çalışır, ama i ve I harflerini düzgün çeviremez.

Bu kütüphane size düzgün şekilde büyültme/küçültme yapan metotlar verir.

```php
// Normal strtoupper ile:
strtoupper('izmirin ılık ilkbaharları'); // IZMIRIN ıLıK ILKBAHARLARı

// Büyültme
turkce('izmirin ılık ilkbaharları')->buyuk(); // İZMİRİN ILIK İLKBAHARLARI
// veya
tr_strtoupper('izmirin ılık ilkbaharları'); // İZMİRİN ILIK İLKBAHARLARI

// Küçültme
turkce('İZMİRİN ILIK İLKBAHARLARI')->kucuk(); // izmirin ılık ilkbaharları
// veya
tr_strtolower('İZMİRİN ILIK İLKBAHARLARI'); // izmirin ılık ilkbaharları

// Başlık
turkce('İZMİRİN ILIK İLKBAHARLARI')->baslik(); // İzmirin Ilık İlkbaharları
```

### İsmin Hallerine Çekimleme

İsimlerin yanına gelen ekleri koda gömersek "Ahmet'nin" veya "Hikmet'ye" gibi Türkçe'ye uygun olmayan ve hiç doğal gözükmeyen bir sonuç elde ederiz. Onun yerine, bırakın Türkçe paketi ismi uygun haline çeksin.

```php
turkce('İstanbul')->den(); // "İstanbul'dan"
turkce('Hatice')->i(); // "Hatice'yi"
turkce('Kemal')->in(); // "Kemal'in"
turkce('Kazım')->e(); // "Kazım'a"
turkce('Asu')->de(); // "Asu'da"
```

Hatta bunu bir önceki metotla da birleştirebilirsiniz:

```php
turkce('güzel istanbul')->dan()->baslik(); // "Güzel İstanbul'dan"
```

Kullanılabilen ekler:

- `i` (belirtme)
- `e` (yönelme)
- `de` (bulunma)
- `den` (ayrılma)
- `in` (iyelik)
