<?php

if (!function_exists('tr')) {
    function tr($soz)
    {
        return new \Aozisik\Turkce\Sozcuk($soz);
    }
}
