<?php
namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return response()->json(Event::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'eventDate' => 'required|date',
            'phoneNumber' => 'required',
            'eventTitle' => 'required',
            'request' => 'required',
        ]);

        $event = Event::create($request->all());
        return response()->json($event, 201);
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return response()->json(['message' => 'Event deleted']);
    }
}
