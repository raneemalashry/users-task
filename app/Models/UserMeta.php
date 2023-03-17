<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    use HasFactory;
    protected $table = 'user_metas';
    protected $guarded=['id'];
    protected $dates = [ 'birth_date' ];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
