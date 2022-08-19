<picture>
  <source media="(prefers-color-scheme: dark)" srcset="banner-dark.png">
  <source media="(prefers-color-scheme: light)" srcset="banner.png">
  <img alt="" src="banner.png">
</picture>

<br />

![](https://github.com/aozisik/turkce/workflows/run-tests/badge.svg)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/aozisik/php-turkce.svg?style=flat-square)](https://packagist.org/packages/aozisik/php-turkce)

## Ne yapar?

- PHP'nin `strtoupper` ve `strtolower` fonksiyonları Türkçe ile uyumsuzdur. Bu paket, i ve I harflerini bozmadan büyük ve küçük harfe çevirir.

- Verilen Türkçe sözcüğü veya özel ismi, istenen eke göre çekimler. (-e, -i, -in, -de, -den)

## Kurulum

```bash
composer require aozisik/php-turkce
```

## Kullanım

### Basit kullanım:

Büyük/küçük harfe çevirme metotlarının başına `tr_` ekleyerek kullanın.

- `strtoupper` -> `tr_strtoupper`
- `strtolower` -> `tr_strtolower`

### Alternatif kullanım:

```php
// Büyültme
turkce('izmirin ılık ilkbaharları')->buyuk(); // İZMİRİN ILIK İLKBAHARLARI

// Küçültme
turkce('İZMİRİN ILIK İLKBAHARLARI')->kucuk(); // izmirin ılık ilkbaharları

// Başlık
turkce('İZMİRİN ILIK İLKBAHARLARI')->baslik(); // İzmirin Ilık İlkbaharları
```

### İsmin Hallerine Çekimleme

İsimlerin yanına gelen ekleri koda gömersek "Ahmet'nin" veya "Hikmet'ye" gibi Türkçe'ye uygun olmayan ve hiç doğal gözükmeyen bir sonuç elde ederiz. Onun yerine, bırakın Türkçe paketi ismi uygun haline çeksin.

```php
// Çekimleme
turkce('İstanbul')->den(); // "İstanbul'dan"
turkce('Hatice')->i(); // "Hatice'yi"
turkce('Kemal')->in(); // "Kemal'in"
turkce('Kazım')->e(); // "Kazım'a"
turkce('Asu')->de(); // "Asu'da"

// Hatta bunu diğer özelliklerle de birleştirebilirsiniz:
turkce('güzel istanbul')->dan()->baslik(); // "Güzel İstanbul'dan"
```

Kullanılabilen ekler:

- `i` (belirtme)
- `e` (yönelme)
- `de` (bulunma)
- `den` (ayrılma)
- `in` (iyelik)
