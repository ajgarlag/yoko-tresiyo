<?php
$save = false;
$im = imagecreatefrompng(__DIR__ . '/geogato.png');
$pngName = array();
if (preg_match('/(\d{2})\.png/', $_SERVER['REQUEST_URI'], $pngName)) {
    $orange = imagecolorallocate($im, 0xFF, 0x80, 0x00);
    $font_file = __DIR__ . '/../fonts/opensans/OpenSans-Bold.ttf';
    imagefttext($im, 10, 0, 14, 22, $orange, $font_file, $pngName[1]);
    $save = true;
} else {
    $location  = substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/'));
    $location .= '/geogato.png';
    header('Location: ' . $location);
}

imagealphablending($im, false);
imagesavealpha($im, true);

if ($save && count($pngName)) {
    imagepng($im, __DIR__ . '/' . $pngName[0], 8);
}

header('Content-Type: image/png');
imagepng($im);
imagedestroy($im);