<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CandidateProfileBasicUpdateRequest;
use App\Models\Candidate;
use App\Models\Experience;
use App\Models\Profession;
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
        $candidate = Candidate::where('user_id', auth()->user()->id)->first();
        return view('front-end.candidate-dashboard.profile.index', compact('candidate', 'experienceLevels', 'professions'));
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
}
