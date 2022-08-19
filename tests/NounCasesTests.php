<?php

use PHPUnit\Framework\TestCase;

class NounCasesTests extends TestCase
{
    private function assertSuffix($expected, $word, $suffix)
    {
        $this->assertEquals($expected, turkce($word)->$suffix()->yap());
    }

    /**
     * @test
     */
    public function i_hali()
    {
        $this->assertSuffix('Suat\'ı', 'Suat', 'i');

        $this->assertSuffix('Asu\'yu', 'Asu', 'i');

        $this->assertSuffix('Ümmü\'yü', 'Ümmü', 'i');
        $this->assertSuffix('Ahmet\'i', 'Ahmet', 'i');
        $this->assertSuffix('Kemal\'i', 'Kemal', 'i');
        $this->assertSuffix('Orhon\'u', 'Orhon', 'i');
        $this->assertSuffix('Topal\'ı', 'Topal', 'i');
        $this->assertSuffix('Tuğrul\'u', 'Tuğrul', 'i');
        $this->assertSuffix('Şükran\'ı', 'Şükran', 'i');
        $this->assertSuffix('Kamile\'yi', 'Kamile', 'i');
        $this->assertSuffix('Şefika\'yı', 'Şefika', 'i');
    }

    /**
     * @test
     */
    public function iyelik()
    {
        $this->assertSuffix('Asu\'nun', 'Asu', 'in');
        $this->assertSuffix('Suat\'ın', 'Suat', 'in');
        $this->assertSuffix('Ümmü\'nün', 'Ümmü', 'in');
        $this->assertSuffix('Ahmet\'in', 'Ahmet', 'in');
        $this->assertSuffix('Kemal\'in', 'Kemal', 'in');
        $this->assertSuffix('Orhon\'un', 'Orhon', 'in');
        $this->assertSuffix('Tuğrul\'un', 'Tuğrul', 'in');
        $this->assertSuffix('Şükran\'ın', 'Şükran', 'in');
        $this->assertSuffix('Kamile\'nin', 'Kamile', 'in');
        $this->assertSuffix('Şefika\'nın', 'Şefika', 'in');
    }

    /**
     * @test
     */
    public function e_hali()
    {
        $this->assertSuffix('Asu\'ya', 'Asu', 'e');
        $this->assertSuffix('Suat\'a', 'Suat', 'e');
        $this->assertSuffix('Ümmü\'ye', 'Ümmü', 'e');
        $this->assertSuffix('Ahmet\'e', 'Ahmet', 'e');
        $this->assertSuffix('Kemal\'e', 'Kemal', 'e');
        $this->assertSuffix('Tuğrul\'a', 'Tuğrul', 'e');
        $this->assertSuffix('Şükran\'a', 'Şükran', 'e');
        $this->assertSuffix('Kamile\'ye', 'Kamile', 'e');
        $this->assertSuffix('Şefika\'ya', 'Şefika', 'e');
    }

    /**
     * @test
     */
    public function de_hali()
    {
        $this->assertSuffix('Asu\'da', 'Asu', 'de');
        $this->assertSuffix('Suat\'ta', 'Suat', 'de');
        $this->assertSuffix('Ümmü\'de', 'Ümmü', 'de');
        $this->assertSuffix('Ahmet\'te', 'Ahmet', 'de');
        $this->assertSuffix('Kemal\'de', 'Kemal', 'de');
        $this->assertSuffix('Orhon\'da', 'Orhon', 'de');
        $this->assertSuffix('Tuğrul\'da', 'Tuğrul', 'de');
        $this->assertSuffix('Şükran\'da', 'Şükran', 'de');
        $this->assertSuffix('Kamile\'de', 'Kamile', 'de');
        $this->assertSuffix('Şefika\'da', 'Şefika', 'de');
    }

    /**
     * @test
     */
    public function den_hali()
    {
        $this->assertSuffix('Asu\'dan', 'Asu', 'den');
        $this->assertSuffix('Suat\'tan', 'Suat', 'den');
        $this->assertSuffix('Ümmü\'den', 'Ümmü', 'den');
        $this->assertSuffix('Ahmet\'ten', 'Ahmet', 'den');
        $this->assertSuffix('Kemal\'den', 'Kemal', 'den');
        $this->assertSuffix('Tuğrul\'dan', 'Tuğrul', 'den');
        $this->assertSuffix('Şükran\'dan', 'Şükran', 'den');
        $this->assertSuffix('Kamile\'den', 'Kamile', 'den');
        $this->assertSuffix('Şefika\'dan', 'Şefika', 'den');
    }

    /**
     * @test
     */
    public function ozel_genel_ism_ayrimi()
    {
        $this->assertSuffix('Kemal\'den', 'Kemal', 'den');
        $this->assertSuffix('hammaldan', 'hammal', 'den');
    }

    /**
     * @test
     */
    public function unlu_yumusamasi()
    {
        $this->assertSuffix('Kemal\'den', 'Kemal', 'den');
        $this->assertSuffix('İkmal\'den', 'İkmal', 'den');
        $this->assertSuffix('Asal\'dan', 'Asal', 'den');
    }

    /**
     * @test
     */
    public function den_hali_ve_baslik()
    {
        $this->assertEquals(
            'Güzel İstanbul\'dan',
            turkce('güzel istanbul')->baslik()->den()->yap(),
        );
    }
}
