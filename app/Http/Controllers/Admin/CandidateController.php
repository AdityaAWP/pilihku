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
            'name_2' => 'nullable',
            'photo_2' => 'nullable|image|file|max:10240',
            'bio_2' => 'nullable',
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

        if ($request->hasFile('photo_2')) {
            $fileName2 = time() . '_' . $request->photo_2->getClientOriginalName();
            $request->photo_2->storeAs('candidates', $fileName2, 'public');

            $validatedData['photo_2'] = $fileName2;
        }

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
            'name_2' => 'nullable',
            'photo_2' => 'nullable|image|file|max:10240',
            'bio_2' => 'nullable',
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
            if (Storage::disk('public')->exists('candidates/'.$candidate->photo)) {
                Storage::disk('public')->delete('candidates/'.$candidate->photo);
            }
            $fileName = time() . '_' . $request->photo->getClientOriginalName();
            $request->photo->storeAs('candidates', $fileName, 'public');

            $validatedData['photo'] = $fileName;
        }

        if ($request->file('photo_2')) {
            if (Storage::disk('public')->exists('candidates/'.$candidate->photo_2)) {
                Storage::disk('public')->delete('candidates/'.$candidate->photo_2);
            }
            $fileName2 = time() . '_' . $request->photo_2->getClientOriginalName();
            $request->photo_2->storeAs('candidates', $fileName2, 'public');

            $validatedData['photo_2'] = $fileName2;
        }

        $candidate->update($validatedData);

        alert()->success('Berhasil', 'Berhasil mengubah kandidat');
        return redirect()->back();
    }

    public function destroy(string $organizationSlug, string $id)
    {
        $candidate = Candidate::findOrFail($id);

        if (Storage::disk('public')->exists('candidates/'.$candidate->photo)) {
            Storage::disk('public')->delete('candidates/'.$candidate->photo);
        }
        if (Storage::disk('public')->exists('candidates/'.$candidate->photo_2)) {
            Storage::disk('public')->delete('candidates/'.$candidate->photo_2);
        }

        $candidate->delete();

        alert()->success('Berhasil', 'Berhasil menghapus kandidat');
        return redirect()->back();
    }
}
