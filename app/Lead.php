<?php

namespace App;

use App\Traits\UploadImage;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    use UploadImage;

    protected $fillable = ['user_id', 'name', 'ad_type', 'no_of_visits', 'product_friendly_url', 'description', 'detail_description', 'status'
        , 'approval_status', 'push_request', 'sort_order', 'publish_at', 'meta_data', 'city_id', 'locale', 'meta_keywords'];
    const STATUS_NEW    = 0;
    const STATUS_INACTIVE    = -1;
    const STATUS_ACTIVE       = 1;

    const APPROVAL_STATUS_PENDING    = 1;
    const APPROVAL_STATUS_APPROVED       = 2;
    const APPROVAL_STATUS_REJECTED     = 3;
    public static function typeApprovalStatus($type=null)
    {
        $approval_status = [
            self::APPROVAL_STATUS_PENDING    => __('messages.Pending'),
            self::APPROVAL_STATUS_APPROVED       => __('messages.Approved'),
            self::APPROVAL_STATUS_REJECTED     => __('messages.Rejected'),

        ];
        if($type == 'key') return array_keys($approval_status);
        if($type && array_key_exists($type,$approval_status)) return $approval_status[$type];
        return [];
    }
    public static function typeStatus($type=null)
    {
        $type_status = [
            self::STATUS_NEW    => __('messages.New'),
            self::STATUS_INACTIVE    => __('messages.Inactive'),
            self::STATUS_ACTIVE       =>  __('messages.Active'),
        ];
        if($type == 'key') return array_keys($type_status);
        if($type && array_key_exists($type,$type_status)) return $type_status[$type];
        return '';
    }
    public function getStatus(){
        $type_status = [
            self::STATUS_NEW    => __('messages.New'),
            self::STATUS_INACTIVE    => __('messages.Inactive'),
            self::STATUS_ACTIVE       =>  __('messages.Active'),
        ];
        return $type_status[$this->status];
    }
    public function getApprovalStatus(){
        $approval_status = [
            self::APPROVAL_STATUS_PENDING    => __('messages.Pending'),
            self::APPROVAL_STATUS_APPROVED       => __('messages.Approved'),
            self::APPROVAL_STATUS_REJECTED     => __('messages.Rejected'),

        ];
        return $approval_status[$this->approval_status];

    }
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();//withPivot(['created_at'])//change pivot to tag
    }


    public function medias()
    {
        return $this->belongsToMany(Media::class)->withTimestamps();//withPivot(['created_at'])//change pivot to tag
    }

    public function pagePositions()
    {
        return $this->belongsToMany(PagePosition::class,'page_position_model','id_model');//withPivot(['created_at'])//change pivot to tag
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function featured(){
        return $this->belongsToMany(PagePosition::class,'page_position_model','id','id_model')->where('model',PagePosition::TYPE_MODEL_LEAD);
    }
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'product_friendly_url' => [
                'source' => 'name'
            ],
        ];
    }
}
