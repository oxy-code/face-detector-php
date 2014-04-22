<?php
 /*
  * Source : http://www.codediesel.com/algorithms/face-detection-in-images-using-php/
  * 
  */
include "FaceDetector.php";
 
/* We now extend the above class so we can add our own methods */
class FaceModify extends Face_Detector {
 
  public function Rotate($index = 0) {
    $canvas = imagecreatetruecolor($this->faces[$index]['w'], $this->faces[$index]['w']);
    imagecopy($canvas, $this->canvas, 0, 0, $this->faces[$index]['x'], 
              $this->faces[$index]['x'], $this->faces[$index]['w'], $this->faces[$index]['w']);
    $canvas = imagerotate($canvas, 180, 0);
    $this->_outImage($canvas);
  }
 
  public function toGrayScale($index = 0) {
    $canvas = imagecreatetruecolor($this->faces[$index]['w'], $this->faces[$index]['w']);
    imagecopy($canvas, $this->canvas, 0, 0, $this->faces[$index]['x'], 
              $this->faces[$index]['x'], $this->faces[$index]['w'], $this->faces[$index]['w']);
    imagefilter ($canvas, IMG_FILTER_GRAYSCALE);
    $this->_outImage($canvas);
  }
 
  public function resizeFace($width, $height, $index = 0) {
	$canvas = imagecreatetruecolor($width, $height);
	imagecopyresized($canvas, $this->canvas, 0, 0, $this->faces[$index]['x'], $this->faces[$index]['y'], $width, $height, $this->faces[$index]['w'], $this->faces[$index]['w']);
	$this->_outImage($canvas);
  }
 
  private function _outImage($canvas) {
    header('Content-type: image/jpeg');
    imagejpeg($canvas);
  }
}
?>
