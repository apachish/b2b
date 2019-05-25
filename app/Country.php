<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'name_fa'
        , 'iso_code_2', 'iso_code_3',
        'flag', 'code', 'status'];

    public function getName()
    {
        if (app()->getLocale() == 'fa')
            if ($this->name_fa)
                return $this->name_fa;
        return $this->name;
    }
}
