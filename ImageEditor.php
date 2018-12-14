<?php

class ImageEditor
{
    protected $src;
    protected $resize;
    protected $rotate;
    protected $source;

    public function resize($new_width, $new_height)
    {       
        $this->source = imagecreatefromjpeg($this->src);
        list($width, $height) = getimagesize($this->src);
        $this->resize = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($this->resize, $this->source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        $this->source = $this->resize;
    }

    public function watermarked($watermark_img)
    {
        if(!isset($this->source)){
        $this->source = imagecreatefromjpeg($this->src);
        }
        $watermark = imagecreatefrompng($watermark_img->src);
        $watermarkX = imagesx($watermark);
        $watermarkY = imagesy($watermark);
        imagecopy($this->source, $watermark, (imagesx($this->source) + $watermarkX) / 3, (imagesy($this->source)+ $watermarkY) / 3, 0, 0, $watermarkX, $watermarkY);
    }

    public function rotate($angle)
    {
        if(!isset($this->source)){
        $this->source = imagecreatefromjpeg($this->src);
        }
        $this->rotate = imagerotate($this->source, $angle, 0);
        $this->source = $this->rotate;
    }
}