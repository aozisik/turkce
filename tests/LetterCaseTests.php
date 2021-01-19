<?php

use PHPUnit\Framework\TestCase;

class LetterCaseTests extends TestCase
{
    /**
     * @test
     */
    public function kucuk_harfe_cevir()
    {
        $this->assertEquals('çılgın koşu', turkce('ÇIlgın KoŞu')->kucuk());
        $this->assertEquals('iyelik ekleri', turkce('İyelİk eklerİ')->kucuk());
        $this->assertEquals('ılık rüzgarlar', turkce('ıLIK RÜZGARLAR')->kucuk());
        $this->assertEquals('izmir\'de ılık ilkbahar akşamı', turkce('İzmir\'de Ilık İlkbahar akşamı')->kucuk());
    }

    /**
     * @test
     */
    public function buyuk_harfe_cevir()
    {
        $this->assertEquals('IĞDIR\'DA ILIK İLKBAHAR AKŞAMI', turkce('Iğdır\'da Ilık İlkbahar akşamı')->buyuk());
    }

    /**
     * @test
     */
    public function baslik_gibi_yap()
    {
        $this->assertEquals('Çılgın Koşu', turkce('ÇILgın koŞu')->baslik());
        $this->assertEquals('İyelik Ekleri', turkce('iYelik eklerİ')->baslik());
        $this->assertEquals('Ilık Rüzgarlar', turkce('ıLIK RÜZGARLAR')->baslik());
        $this->assertEquals('Iğdır\'da Ilık İlkbahar Akşamı', turkce('ığdIr\'da ılIk ilkbAhar Akşamı')->baslik());
    }
}
