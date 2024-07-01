<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{
    public function index(Request $request)
    {
        $quizzes = Quiz::where('voting_session_id', $request->votingSession->id)->paginate(10);
        return view('admin.quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        return view('admin.quizzes.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required'
        ]);

        $validatedData['voting_session_id'] = $request->votingSession->id;

        Quiz::create($validatedData);

        alert()->success('Berhasil', 'Berhasil menambah pertanyaan kuis');
        return redirect()->route('admin.quizzes.index', $request->organization->slug);
    }


    public function edit(string $organizationSlug, string $id, Request $request)
    {
        $quiz = Quiz::where('voting_session_id', $request->votingSession->id)->findOrFail($id);

        return view('admin.quizzes.edit', compact('quiz'));
    }

    public function update(string $organizationSlug, string $id, Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required'
        ]);

        Quiz::findOrFail($id)->update($validatedData);

        alert()->success('Berhasil', 'Berhasil menyimpan pertanyaan kuis');
        return redirect()->back();
    }

    public function destroy(string $organizationSlug, string $id)
    {
        Quiz::findOrFail($id)->delete();

        alert()->success('Berhasil', 'Berhasil menghapus pertanyaan kuis');
        return redirect()->back();
    }
}
