<?php
namespace Aozisik\Turkce;

class SonHece
{
    public $sonHarfUnlu;

    private $soz;
    private $sonHarf;
    private $sonUnluHarf;

    private $unluler = ['a', 'e', 'ı', 'i', 'o', 'ö', 'u', 'ü'];

    public function __construct($soz)
    {
        $soz = $this->sonSoz($soz);
        $soz = str_replace(['i', 'I'], ['İ', 'ı'], $soz);
        $soz = mb_strtolower($soz, 'UTF-8');

        $this->soz = $soz;
        $this->sonHarf = mb_substr($soz, -1);
        $this->sonUnluHarf = $this->sonUnluHarfiBul();
    }

    private function sonSoz($soz)
    {
        $sozler = explode(' ', $soz);
        return end($sozler);
    }

    private function sonUnluHarfiBul()
    {
        $regex = '/' . implode('|', $this->unluler) . '/';
        preg_match_all($regex, $this->soz, $matches);
        if (!$matches) {
            return false;
        }
        return end($matches[0]);
    }

    public function sonHarfUnlu()
    {
        return in_array($this->sonHarf, [
            'a', 'e', 'ı', 'i', 'o', 'ö', 'u', 'ü'
        ]);
    }

    public function sert()
    {
        // Fıstıkçı şahap :)
        return in_array($this->sonHarf, [
            'f', 's', 't', 'k', 'ç', 'ş', 'h', 'p'
        ]);
    }

    public function yumusak()
    {
        return !$this->sert();
    }

    public function kalin()
    {
        $istisnalar = [
            'mal',
            'lal',
            'hal'
        ];
        // Kemal, Bilal, Zuhal gibi istisnalar için...
        if (in_array(substr($this->soz, -3), $istisnalar)) {
            return false;
        }

        return in_array($this->sonUnluHarf, [
            'a', 'ı', 'u', 'o'
        ]);
    }

    public function ince()
    {
        return !$this->kalin();
    }

    public function yuvarlak()
    {
        return in_array($this->sonUnluHarf, [
            'o', 'ö', 'u', 'ü'
        ]);
    }

    public function duz()
    {
        return !$this->yuvarlak();
    }
}
