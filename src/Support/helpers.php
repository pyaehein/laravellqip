<?php

if (! function_exists('lqip')) {

    function lqip($path)
    {
        /*if(is_array($path)) {
            return app('LQIP')->multipleImage($path);
        }*/

        return app('LQIP')->singleImage($path);
    }
}