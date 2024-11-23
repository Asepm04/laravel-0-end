<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    // public static $wrap ="data";
    public $additional =
    [
        "author"=> "yadcode auth"
    ];
    
    public function toArray($request)
    {
        return 
        [
            "author" => "yadcode",
            "data" =>
            [
                "id"=>$this->id,
                "name"=>$this->name,
                "email"=>$this->email,
                // "profile"=> new ProfileResource($this->profile)
                "profile"=> new  ProfileResource($this->whenloaded('profile'))
            ]
        ];
    }
}
