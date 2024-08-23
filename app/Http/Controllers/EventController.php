<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->authenticated_user;
        $token = $request->get('token');

        $events = Event::all();

        return view('events.index', compact('events', 'user', 'token'));
    }
}