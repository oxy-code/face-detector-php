<?php
	include "FaceModify.php";
	$detector = new FaceModify('detection.dat');
	$detector->face_detect('demo.jpg');
	//$detector->toJpeg();
	//$detector->cropFace();
	$detector->resizeFace(150,150);
?>
