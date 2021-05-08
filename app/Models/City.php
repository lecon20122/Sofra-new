<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{

    protected $table = 'cities';
    public $timestamps = true;

    use SoftDeletes,HasFactory;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name');

    public function districts()
    {
        return $this->hasMany('App\Models\District');
    }

}
