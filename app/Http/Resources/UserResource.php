<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data= [
            'id' => $this->id,
            'username' => $this->username,
            'bio' => $this->bio,
            'email' => $this->email,
            'type' => $this->type,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
        if($this->type=='third'){
            $data['birth_date']=$this->userMeta?->birth_date;
            $data['latitude']=$this->userMeta?->latitude;
            $data['longitude']=$this->userMeta?->longitude;
        }
        if($this->type=='second'){
            $data['certificate_title']=$this->certificate?->title;
            $data['certificate_file']=asset($this->certificate?->path);
        }
        return $data;
    }
}
