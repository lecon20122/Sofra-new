<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Restaurant extends Authenticatable implements JWTSubject
{

    protected $table = 'restaurants';
    public $timestamps = true;

    use SoftDeletes, Notifiable, HasFactory;
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $dates = ['deleted_at'];
    protected $fillable = array('name',  'pin_code', 'email', 'phone', 'password', 'image', 'is_active', 'district_id', 'min_order', 'delivery_fees', 'is_approved');

    public function district()
    {
        return $this->belongsTo('App\Models\District');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }


    public function payments()
    {
        return $this->hasMany('App\Models\Payment');
    }

    public function offers()
    {
        return $this->hasMany('App\Models\Offer');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
    ////////////MORPH///////////
    /**
     * Get all of the tags for the post.
     */
    public function tokens()
    {
        return $this->morphMany(Token::class, 'tokenable');
    }
    public function notifications()
    {
        return $this->morphMany('App\Models\Notification', 'notificationable');
    }
    ////////////MORPH///////////



    //Mutator for the Password - Hashing the password
    public function setPasswordAttribute($pass)
    {

        $this->attributes['password'] = Hash::make($pass);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    function scopeApproved(Builder $collection = null)
    {
        $collection->where('is_approved' , true);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
