<?php

namespace App\Traits;




trait UploadImage
{

   public static $path="";
   public static $url="";
   public static $width= '150';  
   public static $height= '150'; 
   public static $section = null;
   public static $id=null;

    public static function upload(UploadedFile $originalImage)
    {
        if(!self::$path){
            self::$path = public_path().'/images/'.self::$section.'/';
            self::$url  = '/images/'.self::$section.'/';
        }
        $image = Image::make($originalImage);
        $extension = $originalImage->getClientOriginalExtension();
        $file_name = null;
        if(self::$id){
            $file_name = self::$id;
        }
        if($file_name){
            $file_name .= "_";
        }
        if(self::$id){
            $file_name = time();
        }
        $file_name .= $extension;
        $thumbnail = 'thumbnail_'.$file_name;
        $image->save(self::$path. $file_name);
        $image->resize(self::$width, self::$height);
        $image->save(self::$path.$thumbnail);


        return $file_name;
    }


}

