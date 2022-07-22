<?php

namespace App\Http\Controllers;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    //
    public function getEvents()
    {
         $getEvents = Schedule::query()->select(
            'title',
            'start_time',
            'end_time'
            )
            ->get();

        $events = [];

        foreach ($getEvents as $values) {
            $event = [];
            $startTime = Carbon::parse($values->start_time)->format("Y-m-d H:s");
            $endTime = Carbon::parse($values->end_time)->format("Y-m-d H:s");
            $startTime = Carbon::parse($startTime)->timezone("Asia/Ho_Chi_Minh");
            $endTime = Carbon::parse($endTime)->timezone("Asia/Ho_Chi_Minh");

            $values->start_time = $startTime;
            $values->end_time = $endTime;

            $event['id'] = $values->eventid;
            $event['title'] = $values->notes;
            $event['start'] = $values->start_time;
            $event['end'] = $values->end_time;
            $event['allDay'] = false;
            $events[] = $event;
        }

        return response()->json($events);
    }
}
