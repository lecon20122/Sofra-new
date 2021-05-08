<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
 use HasFactory;

    protected $table = 'categories';
    public $timestamps = false;



    protected $fillable = array('name', 'parent_id');

    public function restaurants()
    {
        return $this->belongsToMany('App\Models\Restaurant');
    }

    public function children()
    {
        return $this->hasMany(Category::class , 'parent_id' , 'id');
    }

}
