<?php

namespace App;

use App\Traits\UploadImage;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use UploadImage;
    use Sluggable;
    use SluggableScopeHelpers;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','username', 'email',
        'password','portal_id','slug','email_verified_at','portal_id','image_path',
        'status','last_modified_by','bio','role','locale','invited_by','company_name',
        'company_logo','category_id','company_details','address','country_id','state_id',
        'city_id','pincode','phone_number','mobile','website','login_type','current_login','last_login_date',
        'ip_address','featured_company','token_key','meta_data'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['last_name', 'first_name'],
                'separator' => '_'
            ],
        ];
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getDisplayName(){
        return $this->first_name." ".$this->last_name;
    }
    public function getCompanyName(){
        return $this->company_name?:$this->first_name." ".$this->last_name;
    }
    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
    public function banners()
    {
        return $this->hasMany(Banner::class);
    }
    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();//withPivot(['created_at'])//change pivot to tag
    }
    public function sellers()
    {
        return $this->belongsToMany(Seller::class)->withTimestamps();//withPivot(['created_at'])//change pivot to tag
    }
    public function viewSellers(){
        return $this->sellers()->map(function ($seller){
            return $seller->title;
        });
    }
}
