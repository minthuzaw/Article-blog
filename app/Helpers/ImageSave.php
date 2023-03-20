<?php

namespace App\Helpers;

class ImageSave
{
    public static function imageSave($file)
    {
        $name = uniqid().'_'.$file->getClientOriginalName();
        $file->move(public_path('images/'), $name);

        return $name;
    }
}
