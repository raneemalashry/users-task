<?php
namespace App\Services;

use App\Models\Certificate;
use Carbon\Carbon;


class UploadFiles {
    public static function inArray($key, $array, $value)
    {
        $return = array_key_exists($key, $array) ? $array[$key] : $value;
        return $return;
    }

   public function upload($file,$folder_name, $options=[] )
   {
    $folder_name = $folder_name . '/' . Carbon::now()->toDateString();
    $title= self::inArray('title', $options, 'null');

    $path = null;
    $disk = 'public';
    $path = 'storage/' . $file->store($folder_name, $disk);
    $certificate = Certificate::create([
        'path' => $path,
        'title' => $title,
    ]);


   return $certificate ;
   }
}
