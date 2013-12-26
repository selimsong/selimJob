<?php

$userImg = new Imagick('e-card.jpg');

/* Create some objects */
$image = new Imagick('inset.png');
$draw = new ImagickDraw();
$draw->setTextEncoding('utf-8');

/* Black text */
$draw->setFillColor('black');

/* Font properties */
$draw->setFont('/var/www/hanyi.ttf');
$draw->setFontSize( 30 );

$draw->setGravity(1);

/* Create text */
$image->annotateImage($draw, 100, 200, -10, utf8_decode('我们 the lazy dog1'));

$userImg->compositeImage($image, Imagick::COMPOSITE_DEFAULT, 0, 0);
/* Give image a format */
//$image->setImageFormat('jpg');

/* Output the image with headers */
header('Content-type: image/jpg');
//echo $image;
echo $userImg;
