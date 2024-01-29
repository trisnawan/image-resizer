<?php 

namespace Trisnawan\ImageResizer;

class ImageResizer {
    private $imagick = null;

    public function __construct(string $path){
        $this->imagick = new \Imagick(realpath($path));
    }

    public function maxWidth(int $width){
        if(!$this->imagick ?? null) return false;
        if($this->imagick->getImageWidth() > $width){
            $this->imagick->resizeImage($width,0,\Imagick::FILTER_LANCZOS,1);
        }
        return true;
    }

    public function cropCenter(){
        $w = $this->imagick->getImageWidth();
        $h = $this->imagick->getImageHeight();
        $newSize = ($w > $h) ? $h : $w;
        $y = ($w > $h) ? 0 : ($h-$w) / 2;
        $x = ($h > $w) ? 0 : ($w-$h) / 2;
        $this->imagick->cropImage($newSize, $newSize, $x, $y);
    }

    public function cropTop(){
        $w = $this->imagick->getImageWidth();
        $h = $this->imagick->getImageHeight();
        $newSize = ($w > $h) ? $h : $w;
        $y = ($w > $h) ? 0 : ($h-$w) / 2;
        $x = ($h > $w) ? 0 : ($w-$h) / 2;
        $this->imagick->cropImage($newSize, $newSize, $x, 0);
    }

    public function writeImage($filename){
        $this->imagick->writeImage($filename);
    }

    public function getBlob(){
        if(!$this->imagick ?? null) return null;
        return $this->imagick->getImageBlob();
    }
}
?>