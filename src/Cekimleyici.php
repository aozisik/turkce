<?php

namespace Aozisik\Turkce;

class Cekimleyici
{
    private $soz;
    private $ek;
    private $sonHece;
    private $kosulHafizasi;
    private $kaynastirma = '';

    public static function yeni($soz)
    {
        return new self($soz);
    }

    public function __construct($soz)
    {
        $this->kosulHafizasi = [];
        $this->soz = $soz;
        $this->sonHece = new SonHece($soz);
    }

    public function kaynastirma($harf)
    {
        if ($this->sonHece->sonHarfUnlu()) {
            $this->kaynastirma = $harf;
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

    public function ozelIsimMi()
    {
        $sozler = explode(' ', $this->soz);
        $sonSoz = $sozler[count($sozler) - 1];

        $ilkHarf = mb_substr($sonSoz, 0, 1);
        // Sözcüğün ilk harfi büyükse, özel isimdir.
        return tr_strtoupper($ilkHarf) === $ilkHarf;
    }

    public function sonuc()
    {
        return new Sozcuk(sprintf(
            '%s%s%s%s',
            $this->soz,
            $this->ozelIsimMi() ? '\'' : '',
            $this->kaynastirma,
            $this->ek
        ));
    }
}
