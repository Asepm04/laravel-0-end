<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return 
            [
                "id" => $this->id,
                "nama"=> $this->nama,
                "created"=>$this->created_at->toJson(),
                "updated"=>$this->updated_at->toJson()


            ];
    }
}
