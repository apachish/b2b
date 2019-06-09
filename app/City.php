<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'name_fa', 'country_id', 'state_id', 'latitude', 'longitude', 'is_popular',
        'status', 'description'];

    public function countries()
    {
        return $this->belongsTo(Country::class);
    }
    public function states()
    {
        return $this->belongsTo(State::class);
    }
    public function getName()
    {
        if (app()->getLocale() == 'fa')
            if ($this->name_fa)
                return $this->name_fa;
        return $this->name;
    }
}
