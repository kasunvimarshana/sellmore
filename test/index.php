<?php
//$data = file_get_contents($url);
$data = "http://localhost/site01/test/image.jpg";
$image = @imagecreatefromjpeg($data);
header("Content-Type: image/jpeg");
imageinterlace($image, true);
imagejpeg($image, NULL, 100);
imagedestroy($image);
?>