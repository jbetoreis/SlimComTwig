<?php
namespace app\src;

class Load{
    public static function file($file){
        $file = path() . $file;
        if(!file_exists($file)){
            throw new \Exception("Arquivo {$file} não existe");
        }

        return require $file;
    }
}
?>