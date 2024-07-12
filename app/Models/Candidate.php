<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function votingSession() {
        return $this->belongsTo(VotingSession::class);
    }

    public function userVotes() {
        return $this->hasMany(UserVote::class);
    }
}
