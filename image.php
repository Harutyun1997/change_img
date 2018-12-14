<?php


require_once('ImageEditor.php');

class Image extends ImageEditor
{
    function __construct($imagePath)
    {
        $this->src = $imagePath;
    }

    public function open()
    {
        header('Content-Type: image/jpg');
        imagejpeg($this->source);
        imagedestroy($this->source);
    }

   public function save($src){

        imagejpeg( $this->source, $src);
   }

   }
       
$img1 = new Image('image/CMS_Creative_164657191_Kingfisher.jpg');
$img2 = new Image('image/Codero_Hosting_Logo_(100px).jpg');

$img1->resize(400, 400);
$img1->watermarked($img2);
$img1->rotate(90);
$img1->save('image/nkar151.png');
$img1->open();