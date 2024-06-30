<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VotingSession;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(Request $request) 
    {
        $organization = $request->organization;
        $votingSession = VotingSession::where('organization_id', $organization->id)
            ->with('candidates', 'quizzes')
            ->first();
        $memberCount = User::where('organization_id', $organization->id)->count();

        return view('admin.dashboard', compact('organization', 'votingSession', 'memberCount'));
    }
}
