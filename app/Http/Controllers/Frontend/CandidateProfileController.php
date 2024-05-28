<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CandidateProfileBasicUpdateRequest;
use App\Http\Requests\Frontend\CandidateProfileInfoUpdateRequest;
use App\Models\Candidate;
use App\Models\CandidateExperience;
use App\Models\CandidateLanguage;
use App\Models\CandidateSkill;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Profession;
use App\Models\Skill;
use App\Services\Notify;
use App\Traits\FileUploadTrait;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CandidateProfileController extends Controller
{
    use FileUploadTrait;
    function index(): View{
        $experienceLevels = Experience::all();
        $professions = Profession::all();
        $candidate = Candidate::with(['skills'])->where('user_id', auth()->user()->id)->first();
        $candidateExperiences = CandidateExperience::where('candidate_id', $candidate->id)->orderBy('id', 'DESC')->get();
        $skills = Skill::all();
        $languages = Language::all();
        return view('front-end.candidate-dashboard.profile.index', compact('candidate', 'experienceLevels', 'professions', 'skills', 'languages', 'candidateExperiences'));
    }

    function basicInfoUpdate(CandidateProfileBasicUpdateRequest $request): RedirectResponse{

        $imagePath = $this->uploadFile($request, 'profile_picture');
        $cvPath = $this->uploadFile($request, 'CV');

        $data = [];
        if(!empty($imagePath)) $data['image'] = $imagePath;
        if(!empty($cvPath)) $data['cv'] = $cvPath;
        $data['email'] = $request->email;
        $data['full_name'] = $request->full_name;
        $data['title'] = $request->title;
        $data['experience_id'] = $request->experience_level;
        $data['website'] = $request->website;
        $data['birth_date'] = $request->dob;

        Candidate::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $data
        );

        Notify::updatedNotification();

        return redirect()->back();
    }

    function profileInfoUpdate(CandidateProfileInfoUpdateRequest $request): RedirectResponse{

        $data = [];
        $data['gender'] = $request->gender;
        $data['marital_status'] = $request->marital_status;
        $data['profession_id'] = $request->profession;
        $data['status'] = $request->status;
        $data['bio'] = $request->bio;

        Candidate::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $data
        );

        $candidate = Candidate::where('user_id', auth()->user()->id)->first();

        CandidateLanguage::where('candidate_id', $candidate->id)->delete();
        foreach ($request->language as $lang){
            $candidateLan = new CandidateLanguage();
            $candidateLan->candidate_id = $candidate->id;
            $candidateLan->language_id = $lang;
            $candidateLan->save();
        }

        CandidateSkill::where('candidate_id', $candidate->id)->delete();
        foreach ($request->skill as $sk){
            $candidateSk = new CandidateSkill();
            $candidateSk->candidate_id = $candidate->id;
            $candidateSk->skill_id = $sk;
            $candidateSk->save();
        }





        Notify::updatedNotification();

        return redirect()->back();
    }
}
