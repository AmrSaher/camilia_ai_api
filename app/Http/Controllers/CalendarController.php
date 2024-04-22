<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        $date = Carbon::parse($request->input('date'));

        $events = Event::where('user_id', auth()->id())
            ->whereDate('start', '>=', $date)
            ->whereDate('start', '<', $date->addDay(1))
            ->get();

        return response()->json($events, 200);
    }

    public function store(EventRequest $request)
    {
        $attrs = $request->validated();

        Event::create([
            ...$attrs,
            'start' => Carbon::parse($attrs['start']),
            'end' => Carbon::parse($attrs['end']),
            'user_id' => auth()->id(),
            'image' => 'https://picsum.photos/id/' . rand(1, 100) . '/200',
        ]);

        return response()->json([
            'message' => 'Event created successfully!',
        ]);
    }

    public function update(EventRequest $request, Event $event)
    {
        $attrs = $request->validated();

        $event->update([
            ...$attrs,
            'start' => Carbon::parse($attrs['start']),
            'end' => Carbon::parse($attrs['end']),
        ]);

        return response()->json([
            'message' => 'Event updated successfully!',
        ]);
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return response()->json([
            'message' => 'Event deleted successfully!',
        ]);
    }
}
