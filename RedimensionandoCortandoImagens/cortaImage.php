<?php
  
  // width = largura
  // height = altura

  $arquivo = "image.png";
  $logo = "logo.png";

  $width = 200;
  $height = 200;

  $width_mini = 40;
  $height_mini = 80;

  list($width_original, $height_original) = getimagesize($arquivo);

  $ratio = $width_original / $height_original;

  if($width / $height > $ratio){
      $width = $height_original * $ratio;
  } else {
  	$height = $width / $ratio;
  }

  list($width_logo, $height_logo) = getimagesize($logo);

  $ratio = $width_logo / $height_logo;

  if($width_mini / $height_mini > $ratio){
      $width_mini = $height_logo * $ratio;
  } else {
    $height_mini = $width_mini / $ratio;
  }

  $image_final = imagecreatetruecolor($width, $height);
  $image_logo = imagecreatefrompng($logo);
  $image_original = imagecreatefrompng($arquivo);

  imagecopyresampled($image_final, $image_original, 0, 0, 0, 0, $width, $height, $width_original, $height_original);

  imagecopyresampled($image_final, $image_logo, 160, 70, 0, 0, $width_mini, $height_mini, $width_logo, $height_logo);

  header("Content-Type: image/png");
  imagepng($image_final);
?>

