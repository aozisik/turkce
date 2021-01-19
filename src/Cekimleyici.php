<?php

namespace Aozisik\Turkce;

class Cekimleyici
{
    private $ek;
    private $sonHece;
    private $kosulHafizasi;

    public static function yeni($soz)
    {
        return new self($soz);
    }

    public function __construct($soz)
    {
        $this->kosulHafizasi = [];
        $this->sonuc = $soz . '\'';
        $this->sonHece = new SonHece($soz);
    }

    public function kaynastirma($harf)
    {
        if ($this->sonHece->sonHarfUnlu()) {
            $this->sonuc .= $harf;
        }

        return $this;
    }

    public function kural($kosullar, $ek)
    {
        if ($this->ek) {
            // İsabetli kural bulundu, başka kontrole gerek yok
            return $this;
        }
        $kosullar = explode(',', $kosullar);
        foreach ($kosullar as $kosul) {
            if (! $this->kosulUyumu($kosul)) {
                // Bir koşul sağlanmadığında bitir.
                return $this;
            }
        }
        $this->ek = $ek;

        return $this;
    }

    private function kosulUyumu($kosul)
    {
        if (! isset($this->kosulHafizasi[$kosul])) {
            $this->kosulHafizasi[$kosul] = $this->sonHece->$kosul();
        }

        return $this->kosulHafizasi[$kosul];
    }

    public function sonuc()
    {
        return new Sozcuk($this->sonuc . $this->ek);
    }
}
