<?php

if (!function_exists('produto_asset')) {
    function produto_asset($path = '')
    {
        return asset('img/produto/' . $path);
    }
}
