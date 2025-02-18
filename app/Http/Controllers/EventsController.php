<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventSession;
use App\Models\SessionSpeaker;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function insertEvent(Request $request)
    {
        $event = Event::create([
            'title' => $request->event['title'],
            'description' => $request->event['description'],
            'start_date' => $request->event['start_date'],
            'end_date' => $request->event['end_date'],
            'venue' => $request->event['venue'],
        ]);

        if (!empty($request->event['sessions'])) {
            foreach ($request->event['sessions'] as $sessionData) {
                $session = EventSession::create([
                    'event_id' => $event->id, // Associate with event
                    'title' => $sessionData['title'],
                    'start_time' => $sessionData['start_time'],
                    'end_time' => $sessionData['end_time'],
                    'room_number' => $sessionData['room_number'],
                    'capacity' => $sessionData['capacity'],
                ]);

                if (!empty($sessionData['speakers'])) {
                    foreach ($sessionData['speakers'] as $speakerData) {
                        SessionSpeaker::create([
                            'session_id' => $session->id, // Associate with session
                            'name' => $speakerData['name'],
                            'bio' => $speakerData['bio'] ?? null, // Optional field
                            'presentation_title' => $speakerData['presentation_title'] ?? null,
                            'email' => $speakerData['email'],
                        ]);
                    }
                }
            }
        }

        return response()->json([
            "status" => true,
            'message' => 'Event added successfully!',
            'event_id' => $event->id
        ]);
    }
}
