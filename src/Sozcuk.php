<?php

namespace Aozisik\Turkce;

class Sozcuk
{
    private $soz;

    public function __construct($soz)
    {
        $this->soz = (string) $soz;
    }

    public function i()
    {
        return Cekimleyici::yeni($this->soz)
            ->kaynastirma('y')
            ->kural('duz,ince', 'i')
            ->kural('duz,kalin', 'ı')
            ->kural('yuvarlak,ince', 'ü')
            ->kural('yuvarlak,kalin', 'u')
            ->sonuc();
    }

    public function in()
    {
        return Cekimleyici::yeni($this->soz)
            ->kaynastirma('n')
            ->kural('duz,ince', 'in')
            ->kural('duz,kalin', 'ın')
            ->kural('yuvarlak,ince', 'ün')
            ->kural('yuvarlak,kalin', 'un')
            ->sonuc();
    }

    public function e()
    {
        return Cekimleyici::yeni($this->soz)
            ->kaynastirma('y')
            ->kural('ince', 'e')
            ->kural('kalin', 'a')
            ->sonuc();
    }

    public function a()
    {
        return $this->e();
    }

    public function de()
    {
        return Cekimleyici::yeni($this->soz)
            ->kural('sert,ince', 'te')
            ->kural('sert,kalin', 'ta')
            ->kural('yumusak,ince', 'de')
            ->kural('yumusak,kalin', 'da')
            ->sonuc();
    }

    public function da()
    {
        return $this->de();
    }

    public function den()
    {
        return new self(Cekimleyici::yeni($this->soz)
            ->kural('sert,ince', 'ten')
            ->kural('sert,kalin', 'tan')
            ->kural('yumusak,ince', 'den')
            ->kural('yumusak,kalin', 'dan')
            ->sonuc());
    }

    public function dan()
    {
        return $this->den();
    }

    public function kucuk()
    {
        $str = str_replace(['i', 'I'], ['İ', 'ı'], $this->soz);
        $str = mb_convert_case($str, MB_CASE_LOWER);

        return new self(str_replace('i̇', 'i', $str));
    }

    public function buyuk()
    {
        $str = str_replace(['i', 'I'], ['İ', 'ı'], $this->soz);

        return new self(mb_convert_case($str, MB_CASE_UPPER));
    }

    public function baslik()
    {
        $str = str_replace(['i', 'I'], ['İ', 'ı'], $this->soz);
        $str = mb_convert_case($str, MB_CASE_TITLE);

        return new self(str_replace('i̇', 'i', $str));
    }

    public function yap()
    {
        return $this->soz;
    }

    public function __toString()
    {
        return $this->yap();
    }
}
