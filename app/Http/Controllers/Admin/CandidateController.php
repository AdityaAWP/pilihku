<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\VotingSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    public function index(Request $request)
    {
        $candidates = Candidate::where('voting_session_id', $request->votingSession->id)->orderBy('candidate_no')->paginate(10);
        return view('admin.candidates.index', compact('candidates'));
    }

    public function create()
    {
        return view('admin.candidates.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'photo' => 'required|image|file|max:10240',
            'bio' => 'nullable',
            'candidate_no' => 'required|numeric|min:1',
        ]);

        $isCandidateNoExists = Candidate::where('voting_session_id', $request->votingSession->id)->where('candidate_no', $request->candidate_no)->exists();
        if ($isCandidateNoExists) {
            alert()->error('Gagal', 'Nomor kandidat sudah diambil');
            return redirect()->back();
        }

        $fileName = time() . '_' . $request->photo->getClientOriginalName();
        $request->photo->storeAs('candidates', $fileName, 'public');

        $validatedData['photo'] = $fileName;
        $validatedData['voting_session_id'] = $request->votingSession->id;

        Candidate::create($validatedData);

        alert()->success('Berhasil', 'Berhasil menambah kandidat');
        return redirect()->route('admin.candidates.index', $request->organization->slug);
    }

    public function show(string $id, Request $request)
    {
        $candidate = Candidate::where('voting_session_id', $request->votingSession->id)->findOrFail($id);

        return view('admin.candidates.edit', compact('candidate'));
    }


    public function edit(string $organizationSlug, string $id, Request $request)
    {
        $candidate = Candidate::where('voting_session_id', $request->votingSession->id)->findOrFail($id);

        return view('admin.candidates.edit', compact('candidate'));
    }

    public function update(string $organizationSlug, string $id, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'photo' => 'nullable|image|file|max:10240',
            'bio' => 'nullable',
            'candidate_no' => 'required',
        ]);

        $candidate = Candidate::findOrFail($id);

        $isCandidateNoExists = Candidate::where('voting_session_id', $request->votingSession->id)
            ->where('candidate_no', $request->candidate_no)
            ->whereNot('id', $id)
            ->exists();
        if ($isCandidateNoExists) {
            alert()->error('Gagal', 'Nomor kandidat sudah diambil');
            return redirect()->back();
        }

        if ($request->file('photo')) {
            if (Storage::disk('public')->exists('candidates/'.$candidate->phoyo)) {
                Storage::disk('public')->delete('candidates/'.$candidate->photo);
            }
            $fileName = time() . '_' . $request->photo->getClientOriginalName();
            $request->photo->storeAs('candidates', $fileName, 'public');

            $validatedData['photo'] = $fileName;
        }

        $candidate->update($validatedData);

        alert()->success('Berhasil', 'Berhasil mengubah kandidat');
        return redirect()->back();
    }

    public function destroy(string $organizationSlug, string $id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->delete();

        alert()->success('Berhasil', 'Berhasil menghapus kandidat');
        return redirect()->back();
    }
}
