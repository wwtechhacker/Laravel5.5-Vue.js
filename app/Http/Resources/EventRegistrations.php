<?php

namespace App\Http\Resources;

use App\EventRegistration;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\DB;

class EventRegistrations extends ResourceCollection
{

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

    public function with($request)
    {
        $eventRegistration = new EventRegistration();
        return [
            'meta' => [
                'fields' => $eventRegistration->getFields()
            ]
        ];
    }
}
