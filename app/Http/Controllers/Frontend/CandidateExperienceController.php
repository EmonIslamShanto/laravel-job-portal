<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CandidateExperienceStoreRequest;
use App\Models\CandidateExperience;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CandidateExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidateExperiences = CandidateExperience::where('candidate_id', auth()->user()->candidateProfile->id)->orderBy('id', 'DESC')->get();
        return view('front-end.candidate-dashboard.profile.experience-table', compact('candidateExperiences'))->render();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CandidateExperienceStoreRequest $request) : Response
    {
        $experience = new CandidateExperience();
        $experience->candidate_id = auth()->user()->candidateProfile->id;
        $experience->company = $request->company;
        $experience->department = $request->department;
        $experience->designation = $request->designation;
        $experience->start_date = $request->start_date;
        $experience->end_date = $request->end_date;
        $experience->responsibilities = $request->responsibilities;
        $experience->currently_working = $request->filled('currently_working') ? 1 : 0;
        $experience->save();

        return response(['message' => 'Experience added successfully'], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) : Response
    {
        $experience = CandidateExperience::findOrFail($id);
        return response($experience, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CandidateExperienceStoreRequest $request, string $id)
    {
        $experience = CandidateExperience::findOrFail($id);
        if ($experience->candidate_id !== auth()->user()->candidateProfile->id) {
            abort(404, 'You are not authorized to update this experience');
        }
        $experience->company = $request->company;
        $experience->department = $request->department;
        $experience->designation = $request->designation;
        $experience->start_date = $request->start_date;
        $experience->end_date = $request->end_date;
        $experience->responsibilities = $request->responsibilities;
        $experience->currently_working = $request->filled('currently_working') ? 1 : 0;
        $experience->save();

        return response(['message' => 'Experience updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $experience= CandidateExperience::findOrFail($id);
            if ($experience->candidate_id !== auth()->user()->candidateProfile->id) {
                abort(404, 'You are not authorized to update this experience');
            }
            $experience->delete();
            return response(['massage' => 'Delete successfully'], 200);

        } catch (\Exception $e) {
            logger($e);
            return response(['massage' => 'Something went wrong! Please, try again.'], 500);
        }
    }
}
