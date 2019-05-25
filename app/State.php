<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['name', 'name_fa'
        , 'country_id'];

    public function getName()
    {
        if (app()->getLocale() == 'fa')
            if ($this->name_fa)
                return $this->name_fa;
        return $this->name;
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
