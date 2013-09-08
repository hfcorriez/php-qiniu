<?php

namespace Qiniu;

class Util
{
    public static function uriEncode($str)
    {
        return str_replace(array('+', '/'), array('-', '_'), base64_encode($str));
    }
}