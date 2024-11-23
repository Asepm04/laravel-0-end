<?php

namespace App\Http\Resources;
use App\Models\Categori;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       return [
        "job"=>$this->job,
        "id"=>$this->id,
        "user"=>$this->user_id
        // "categori"=> CategoriResource::collection(Categori::all())
       ];
    }
}
