<?php

namespace App\Http\Controllers;

use App\EventRegistration;
use App\Http\Resources\EventRegistrationResource;
use App\Http\Resources\EventRegistrations;
use App\Marker;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = EventRegistration::all();
        return new EventRegistrations($events);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if (!empty($data['event_day'])) {
            $eventStart          = new Carbon($data['event_day'] . ' ' . $data['start_time']);
            $eventEnd            = new Carbon($data['event_day'] . ' ' . $data['end_time']);
            $data['event_start'] = $eventStart;
            $data['event_end']   = $eventEnd;
        }
        unset($data['event_day']);
        $eventRegistration = EventRegistration::create($data);
        return new EventRegistrationResource($eventRegistration);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = EventRegistration::find($id);

        return new EventRegistrationResource($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ids = explode(',', $id);
        $blacklist         = [
            'event_day',
            'id',
            '_method'
        ];
        $data              = $request->all();

        foreach ($ids as $id) {
            $eventRegistration = EventRegistration::find($id);
            if (!empty($data['event_day'])) {
                $data['event_start'] = new Carbon($data['event_day'] . ' ' . $data['event_start']);
                $data['event_end']   = new Carbon($data['event_day'] . ' ' . $data['event_end']);
            }

            foreach($blacklist as $field) {
                unset($data[$field]);
            }

            $eventRegistration->fill($data);
            $eventRegistration->save();
        }

        return $eventRegistration;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
