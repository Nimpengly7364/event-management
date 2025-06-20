<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('date', 'asc')->get();
        return view('dashboard', compact('events'));
    }
}
