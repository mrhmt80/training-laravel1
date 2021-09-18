<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Category extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
        
            'id' => $this->id,
            'cat_name' => $this->cat_name,
            'parent_id' => $this->parent_id,
            'img' => url(''). '/assets/images/' . $this->img,

        ];
    }
}
