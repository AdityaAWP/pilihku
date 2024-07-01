<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudyCase;
use Illuminate\Http\Request;

class StudyCaseController extends Controller
{
    public function index(Request $request)
    {
        $cases = StudyCase::where('voting_session_id', $request->votingSession->id)->paginate(10);
        return view('admin.study-cases.index', compact('cases'));
    }

    public function create()
    {
        return view('admin.study-cases.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required'
        ]);

        $validatedData['voting_session_id'] = $request->votingSession->id;

        StudyCase::create($validatedData);

        alert()->success('Berhasil', 'Berhasil menambah contoh studi kasus');
        return redirect()->route('admin.study-cases.index', $request->organization->slug);
    }


    public function edit(string $organizationSlug, string $id, Request $request)
    {
        $case = StudyCase::where('voting_session_id', $request->votingSession->id)->findOrFail($id);

        return view('admin.study-cases.edit', compact('case'));
    }

    public function update(string $organizationSlug, string $id, Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required'
        ]);

        StudyCase::findOrFail($id)->update($validatedData);

        alert()->success('Berhasil', 'Berhasil menyimpan contoh studi kasus');
        return redirect()->back();
    }

    public function destroy(string $organizationSlug, string $id)
    {
        StudyCase::findOrFail($id)->delete();

        alert()->success('Berhasil', 'Berhasil menghapus contoh studi kasus');
        return redirect()->back();
    }
}
