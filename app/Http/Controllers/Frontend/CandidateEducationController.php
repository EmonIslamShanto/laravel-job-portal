<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CandidateEducationStoreRequest;
use App\Models\CandidateEducation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CandidateEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidateEducations = CandidateEducation::where('candidate_id', auth()->user()->candidateProfile->id)->orderBy('id', 'DESC')->get();
        return view('front-end.candidate-dashboard.profile.education-table', compact('candidateEducations'))->render();
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
    public function store(CandidateEducationStoreRequest $request)
    {
        $education = new CandidateEducation();
        $education->candidate_id = auth()->user()->candidateProfile->id;
        $education->level = $request->level;
        $education->degree = $request->degree;
        $education->year = $request->year;
        $education->institute = $request->institute;
        $education->note = $request->note;
        $education->save();

        return response(['message' => 'Education added successfully'], 200);

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
        $education = CandidateEducation::findOrFail($id);
        return response($education, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CandidateEducationStoreRequest $request, string $id)
    {
        $education = CandidateEducation::findOrFail($id);
        if ($education->candidate_id !== auth()->user()->candidateProfile->id) {
            abort(404, 'You are not authorized to update this experience');
        }
        $education->level = $request->level;
        $education->degree = $request->degree;
        $education->year = $request->year;
        $education->institute = $request->institute;
        $education->note = $request->note;
        $education->save();

        return response(['message' => 'Education updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $education= CandidateEducation::findOrFail($id);
            if ($education->candidate_id !== auth()->user()->candidateProfile->id) {
                abort(404, 'You are not authorized to update this education');
            }
            $education->delete();
            return response(['massage' => 'Delete successfully'], 200);

        } catch (\Exception $e) {
            logger($e);
            return response(['massage' => 'Something went wrong! Please, try again.'], 500);
        }
    }
}
