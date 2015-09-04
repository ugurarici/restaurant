<?php

function __autoload($className)
{
    require_once "model/" . $className . ".php";
}
function dd($var)
{
    echo "<pre>";
    die(var_dump($var) . "</pre>");
}
function fixTags($text){
    $text = htmlspecialchars($text);
    $text = preg_replace("/=/", "=\"\"", $text);
    $text = preg_replace("/&quot;/", "&quot;\"", $text);
    $tags = "/&lt;(\/|)(\w*)(\ |)(\w*)([\\\=]*)(?|(\")\"&quot;\"|)(?|(.*)?&quot;(\")|)([\ ]?)(\/|)&gt;/i";
    $replacement = "<$1$2$3$4$5$6$7$8$9$10>";
    $text = preg_replace($tags, $replacement, $text);
    $text = preg_replace("/=\"\"/", "=", $text);
    return $text;
}
function redirect($url)
{
    header("Location: $url");
    exit;
}
