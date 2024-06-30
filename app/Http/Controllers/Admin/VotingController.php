<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VotingSession;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function create(Request $request) {
        $organization = $request->organization;

        return view('admin.voting-sessions.create', compact('organization'));
    }

    public function store(Request $request) {
        $rules = [
            'title' => 'required',
            'description' => 'nullable',
            'voting_date' => 'required|date|date_format:Y-m-d',
            'start' => 'required|date_format:H:i',
            'end' => 'required|date_format:H:i'
        ];

        $isVotingExists = VotingSession::where('organization_id', $request->organization->id)->exists();
        if ($isVotingExists) {
            alert()->error('Gagal', 'Sesi voting sudah ada.');
            return redirect()->route('admin.dashboard');
        }

        $request->validate($rules);

        VotingSession::create([
            'organization_id' => $request->organization->id,
            'title' => $request->title,
            'description' => $request->description,
            'voting_start' => $request->voting_date . ' ' .$request->start.':00',
            'voting_end' => $request->voting_date . ' ' .$request->end.':00',
            'is_enabled' => true,
            'is_finished' => false
        ]);

        alert()->success('Berhasil', 'Berhasil menyimpan sesi voting');
        return redirect()->route('admin.dashboard', $request->organization->slug);
    }
}
