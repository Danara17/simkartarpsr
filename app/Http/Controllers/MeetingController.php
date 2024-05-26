<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;


class MeetingController extends Controller
{
    /**
     * Display the meeting table.
     */
    public function index(Request $request)
    {
        return view('meeting.index', [
            'meeting' => Meeting::all(),
            'page' => 'meeting.index'
        ]);
    }
}
