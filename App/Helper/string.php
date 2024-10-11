<?php
function dotToSlash(string $value):string {
    return str_replace(".","/",$value);
}
function isEmptyString(string $value):bool {
    return $value==="";
}
function slugify(string $value):string {
    $value = trim($value);
    return str_replace(" ","-",$value);
}
function stringOrDefault(?string $value , string $default):string {
    return $value ?? $default;
}
function randomAlphabetChar():string
{
    $asciiCode = null;
    $random = (bool) rand(0,1);
    if ($random)
        $asciiCode = rand(65,90);
    else
        $asciiCode = rand(97,122) ;
    return chr($asciiCode);
}
function randomString(int $length):string {
    $string = "";
    for ($counter = 1 ; $counter<=$length;$counter++)
        $string.=randomAlphabetChar();
    return $string;
}
