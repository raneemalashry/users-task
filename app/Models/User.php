<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use  HasFactory;
    protected $table='users';
    protected $guarded=['id'];
    public $timestamps = true;
    public function userMeta()
    {
        return $this->hasOne(UserMeta::class);
    }
    public function certificate()
    {
        return $this->hasOne(Certificate::class);
    }
}
