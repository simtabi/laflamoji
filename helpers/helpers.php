<?php

use Simtabi\Laflamoji\Laflamoji;

if (!function_exists('laflamoji')) {
    function laflamoji(): Laflamoji
    {
        return new Laflamoji();
    }
}
