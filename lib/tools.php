<?php

function linesToArray(string $string) {
    return explode(PHP_EOL, $string);
}

function slugify($text, string $divider = '-')
{
    $text = preg_replace('~[^\pL\d.]+~u', $divider, $text);

    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    $text = trim($text, $divider);

    $text = preg_replace('~-+~', $divider, $text);

    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';

    }
    return $text;
}