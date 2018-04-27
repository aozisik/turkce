<?php

use PHPUnit\Framework\TestCase;

class LetterCaseTests extends TestCase
{
    /**
     * @test
    */
    public function kucuk_harfe_cevir()
    {
        $this->assertEquals('çılgın koşu', tr('ÇIlgın KoŞu')->kucuk());
        $this->assertEquals('iyelik ekleri', tr('İyelİk eklerİ')->kucuk());
        $this->assertEquals('ılık rüzgarlar', tr('ıLIK RÜZGARLAR')->kucuk());
        $this->assertEquals('izmir\'de ılık ilkbahar akşamı', tr('İzmir\'de Ilık İlkbahar akşamı')->kucuk());
    }

    /**
     * @test
     */
    public function buyuk_harfe_cevir()
    {
        $this->assertEquals('IĞDIR\'DA ILIK İLKBAHAR AKŞAMI', tr('Iğdır\'da Ilık İlkbahar akşamı')->buyuk());
    }

    /**
     * @test
     */
    public function baslik_gibi_yap()
    {
        $this->assertEquals('Çılgın Koşu', tr('ÇILgın koŞu')->baslik());
        $this->assertEquals('İyelik Ekleri', tr('iYelik eklerİ')->baslik());
        $this->assertEquals('Ilık Rüzgarlar', tr('ıLIK RÜZGARLAR')->baslik());
        $this->assertEquals('Iğdır\'da Ilık İlkbahar Akşamı', tr('ığdIr\'da ılIk ilkbAhar Akşamı')->baslik());
    }
}
