<?php

if (! function_exists('clear_body_post')) {
    function clear_body_post($text)
    {
        return trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', ' ', urldecode(html_entity_decode(strip_tags($text))))));
    }
}
