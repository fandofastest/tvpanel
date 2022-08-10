<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChannelResource extends JsonResource
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
            'title' => $this->title,
            'category' => $this->category,
            'thumnails' => url('storage/thumbnails/'.$this->thumnails),
            'country' => $this->country,
            'channelurl' => $this->channelurl,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
