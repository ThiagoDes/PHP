<?php
  
  // width = largura
  // height = altura

  $arquivo = "image.png";

  $width = 200;
  $height = 200;

  list($width_original, $height_original) = getimagesize($arquivo);

  $ratio = $width_original / $height_original;

  if($width / $height > $ratio){
      $width = $height_original * $ratio;
  } else {
  	$height = $width / $ratio;
  }

  $image_final = imagecreatetruecolor($width, $height);
  $image_original = imagecreatefrompng($arquivo);

  imagecopyresampled($image_final, $image_original, 0, 0, 0, 0, $width, $height, $width_original, $height_original);

  header("Content-Type: image/png");
  imagepng($image_final);
?>

