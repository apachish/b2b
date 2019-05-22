<?php

namespace App;

use App\Traits\UploadImage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use UploadImage;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','username', 'email', 'password','portal_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getDisplayName(){
        $user = auth()->user();
        return $user->first_name." ".$user->last_name;
    }

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
    public function banners()
    {
        return $this->hasMany(Banner::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();//withPivot(['created_at'])//change pivot to tag
    }
    public function sellers()
    {
        return $this->belongsToMany(Seller::class)->withTimestamps();//withPivot(['created_at'])//change pivot to tag
    }
}
