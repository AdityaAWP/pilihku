<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function index() {
        $query = Candidate::query(); 

        if (auth()->hasUser()) {
            $query->with(['userVotes' => function ($q) {
                $q->where('user_id', auth()->user()->id);
            }]);
        }
        
        $candidates = $query->orderBy('candidate_no')->get();
        
        $isUserHasVoted = false;
        if (auth()->user() && count($candidates) > 0) {
            $isUserHasVoted = auth()->user()
                ->userVotes()
                ->where('voting_session_id', $candidates[0]->voting_session_id)
                ->exists();
        }
    
        return view('pages.voting', ['candidates' => $candidates, 'isUserHasVoted' => $isUserHasVoted]);
    }

    public function store($id)
    {
        $candidate = Candidate::findOrFail($id);

        $user = auth()->user();
        $votingExists = $user
            ->userVotes()
            ->where('voting_session_id', $candidate->voting_session_id)
            ->exists();
        if ($votingExists) {
            alert()->error('Gagal', 'Anda sudah memberikan vote pada pemilihan ini.');
            return redirect()->route('voting');
        }

        $user->userVotes()->create([
            'voting_session_id' => $candidate->votingSession->id,
            'candidate_id' => $candidate->id
        ]);

        alert()->success('Berhasil', 'Anda berhasil memberikan vote pada kandidat '.$candidate->candidate_no);
        return redirect()->route('home');
    }
}
