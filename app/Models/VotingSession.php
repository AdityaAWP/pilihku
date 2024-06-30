<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotingSession extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function candidates() {
        return $this->hasMany(\App\Models\Candidate::class);
    }

    public function studyCases() {
        return $this->hasMany(\App\Models\StudyCase::class);
    }

    public function quizzes() {
        return $this->hasMany(\App\Models\Quiz::class);
    }
}
