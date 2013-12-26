<?php

$userImg = new Imagick('e-card.jpg');

/* Create some objects */
$image = new Imagick('inset.png');
$draw = new ImagickDraw();


/* Black text */
$draw->setFillColor('black');

/* Font properties */
$draw->setFont('Bookman-DemiItalic');
$draw->setFontSize( 30 );

$draw->setGravity(1);

/* Create text */
$image->annotateImage($draw, 100, 200, -10, 'The quick brown fox jumps over the lazy dog');

$userImg->compositeImage($image, Imagick::COMPOSITE_DEFAULT, 0, 0);
/* Give image a format */
//$image->setImageFormat('jpg');

/* Output the image with headers */
header('Content-type: image/jpg');
//echo $image;
echo $userImg;
