<?php
namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Exports\EventsExport;

class EventController extends Controller
{
    public function index()
    {
        return response()->json(Event::all());
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return response()->json($event);
    }
    public function store(Request $request)
    {
        $request->validate([
            'eventDate' => 'required|date',
            'phoneNumber' => 'required',
            'eventTitle' => 'required',
            'request' => 'required',
        ]);
    
        $event = Event::create([
            'user_id' => auth()->user()->id,
            'eventDate' => $request->input('eventDate'),
            'phoneNumber' => $request->input('phoneNumber'),
            'eventTitle' => $request->input('eventTitle'),
            'request' => $request->input('request'),
        ]);
    
        return response()->json($event, 201);
    }
    
    

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return response()->json(['message' => 'Event deleted']);
    }

    public function exportEvents()
    {
        $user = auth()->user();
    
        if (!$user || !$user->isAdmin) {
            return response()->json(['message' => 'Access denied'], 403);
        }
    
        return Excel::download(new EventsExport, 'events.xlsx');
    }
}
