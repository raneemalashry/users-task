<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{

    protected $table = 'certificates';
    protected $guarded=['id'];
    public $timestamps = true;


   public function user()
   {
       return $this->belongsTo(User::class);
   }
}
