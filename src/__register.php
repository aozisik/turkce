<?php

if (! function_exists('turkce')) {
    function turkce($sozcuk)
    {
        return new \Aozisik\Turkce\Sozcuk($sozcuk);
    }
}

if (! function_exists('tr_strtoupper')) {
    function tr_strtoupper($sozcuk)
    {
        return (new \Aozisik\Turkce\Sozcuk($sozcuk))
            ->buyuk();
    }
}

if (! function_exists('tr_strtolower')) {
    function tr_strtolower($sozcuk)
    {
        return (new \Aozisik\Turkce\Sozcuk($sozcuk))
            ->kucuk();
    }
}
