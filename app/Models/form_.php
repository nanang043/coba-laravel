<?php

namespace App\Models;



class form 
{
   private static $forms = [
    [
        'nama' => 'nanang suhendar',
        'slug' => 'nanang-suhendar',
        'title' => 'website',
        'deskripsi' => '  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'  
    ],
     [
        'nama' => 'cecep',
        'slug' => 'cecep',
        'title' => 'form login',
        'deskripsi' => '  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'  
    ]
    
];

   public static function all()
   {

    return collect(self::$forms);

   }

   public static function find($slug)
   {

    $catatan = static::all();
 return $catatan->firstWhere('slug',  $slug);

   }





}
