<?php
  
  $width = isset($_GET['height']) ? max($_GET['height'], 120) : 240;
  $height = isset($_GET['width']) ? max($_GET['width'], 30) : 60;
  
  $image = @imagecreatetruecolor($width, $height) or die("Cannot Initialize new GD image stream");

  $background = imagecolorallocate($image, rand(240,255), rand(240,255), rand(240,255));
  imagefill($image, 0, 0, $background);

  // draw random lines on canvas
  for($i=0; $i < 3; $i++) {
	$linecolor = imagecolorallocate($image, rand(200,230), rand(200,230),rand(200,230));
    imagesetthickness($image, rand(0,3));
    imageline($image, 0, rand(0,$height), $width, rand(0,$height), $linecolor);
  }

  session_start();

  // add random digits to canvas
  $digit = '';
  for($x = 25; $x <= $width-25; $x += 40) {
	$textcolor = imagecolorallocate($image, rand(0,127), rand(0,127), rand(0,127));
    $digit .= ($num = rand(0, 9));
    imagechar($image, rand(4,5), rand($x-5,$x+5), rand(20,$height-20), $num, $textcolor);
  }
  // record digits in session variable
  $_SESSION['captcha'] = $digit;

  // display image and clean up
  header('Content-type: image/png');
  imagepng($image);
  imagedestroy($image);
  
?>