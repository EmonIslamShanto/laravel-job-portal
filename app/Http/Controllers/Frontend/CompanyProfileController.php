<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CompanyInfoUpdateRequest;
use App\Models\Company;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyProfileController extends Controller
{
    use FileUploadTrait;
    function index() :View{
        $company = Company::where('user_id', auth()->id())->first();
        return view('front-end.company-dashboard.profile.index', compact('company'));
    }

    function updateCompanyInfo(CompanyInfoUpdateRequest $request){
        $logoPath = $this->uploadFile($request, 'logo');
        $bannerPath = $this->uploadFile($request, 'banner');

        $data = [];
        if(!empty($logoPath)) $data['logo'] = $logoPath;
        if(!empty($bannerPath)) $data['banner'] = $bannerPath;
        $data['name'] = $request->name;
        $data['bio'] = $request->bio;
        $data['vision'] = $request->vision;

        Company::updateOrCreate(
            ['user_id' => auth()->id()],
            $data
        );

        notify()->success('Updated Successfully', 'Success!!');
        return redirect()->back();

    }
}
