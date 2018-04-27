<?php
namespace Aozisik\Turkce;

class Sozcuk
{
    private $soz;
    private $sonHece;

    public function __construct($soz)
    {
        $this->soz = $soz;
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

    public function de()
    {
        return Cekimleyici::yeni($this->soz)
            ->kural('sert,ince', 'te')
            ->kural('sert,kalin', 'ta')
            ->kural('yumusak,ince', 'de')
            ->kural('yumusak,kalin', 'da')
            ->sonuc();
    }

    public function den()
    {
        return $this->de() . 'n';
    }

    public function kucuk()
    {
        $str = str_replace(['i', 'I'], ['İ', 'ı'], $this->soz);
        return mb_strtolower($str, 'UTF-8');
    }

    public function buyuk()
    {
        $str = str_replace(['i', 'I'], ['İ', 'ı'], $this->soz);
        return mb_strtoupper($str, 'UTF-8');
    }

    public function baslik()
    {
        $str = str_replace(['i', 'I'], ['İ', 'ı'], $this->soz);
        return mb_convert_case($str, MB_CASE_TITLE, 'UTF-8');
    }
}
