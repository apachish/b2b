<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    public $language;

    public function __construct($resource , $language)
    {
        $this->language = $language;
        parent::__construct($resource);
    }
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
