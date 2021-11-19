<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
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
            "id" =>$this->id,
            "name"=>$this->name,
            "phone"=>$this->phone,
            "address"=>$this->address,
            "status"=>$this->status,
            "date_in"=>$this->date_in,
            "date_out"=>$this->date_out,
            "created_at"=>(string) $this->created_at,
            "updated_at"=>(string) $this->updated_at
        ];
    }
}
