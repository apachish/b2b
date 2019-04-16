<?php

namespace App\Http\Resources;

use App\Lead;
use Illuminate\Http\Resources\Json\JsonResource;

class Category extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        $id = $this->id;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'name_fa' => $this->name_fa,
            'image' => $this->image,
            'image_thumb' => $this->image_thumb,
            'description' => $this->description,
            'description_fa' => $this->description_fa,
            'sort_order' => $this->sort_order,
            'status' => $this->status,
            'meta_title' => $this->meta_title,
            'meta_keywords' => $this->meta_keywords,
            'meta_description' => $this->meta_description,
            'title' => app()->getLocale()=='fa'?$this->name_fa:$this->name_fa,
            'noProduct' => Lead::with('categories')
                ->whereHas('categories', function($q) use ($id) {
                    $q->where('category_id', $id);
                })->count(),
            'noSubCategory' =>  \App\Category::descendantsOf($id)->count(),
            'url'=> url('admin/category')
        ];
    }
}
