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
            'meetings' => Meeting::all(),
            'page' => 'meeting.index'
        ]);
    }

    /**
     * Display create meeting form.
     */
    public function create(Request $request)
    {
        return view('meeting.create', [
            'page' => 'meeting.index'
        ]);
    }

    /**
     * Display edit meeting form.
     */
    public function edit(Request $request, $id)
    {
        $selectedMeeting = Meeting::findOrFail($id);
        dd($selectedMeeting);
        return view('meeting.edit', [
            'page' => 'meeting.index'
        ]);
    }

    /**
     * Business logic for storing data meeting.
     */
    public function store(Request $request)
    {
        $request->validate([
            'meeting_title' => 'required|string|max:255',
            'meeting_description' => 'nullable|string',
            'meeting_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'status' => 'required|in:Dijadwalkan,Berlangsung,Selesai,Dibatalkan,Ditunda,Dijadwalkan Ulang,Menunggu Persetujuan,Draft,Ditolak,Dikonfirmasi',
            'location' => 'required|string|max:255',
        ]);

        // Code to create the meeting
        Meeting::create([
            'id' => (string) \Illuminate\Support\Str::uuid(),
            'meeting_title' => $request->meeting_title,
            'meeting_description' => $request->meeting_description,
            'meeting_date' => $request->meeting_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => $request->status,
            'location' => $request->location,
        ]);

        return redirect()->route('meeting.index')->with('success', 'Rapat Baru berhasil di Buat');

    }
}
