<?php

function asset($filename)
{
    $baseDir = $_SERVER['DOCUMENT_ROOT'] . "/public/$filename";
    $path = explode($_SERVER['DOCUMENT_ROOT'], $baseDir);

    return $path[1];
}