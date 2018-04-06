<?php

namespace App\Http\Resources;

use App\EventRegistration;
use Illuminate\Http\Resources\Json\Resource;

class EventRegistrationResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function with($request)
    {

    }
}
