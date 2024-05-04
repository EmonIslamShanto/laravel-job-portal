<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CompanyFoundationInfoUpdate;
use App\Http\Requests\Frontend\CompanyInfoUpdateRequest;
use App\Models\Company;
use App\Traits\FileUploadTrait;
use Auth;
use Illuminate\Validation\Rules;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyProfileController extends Controller
{
    use FileUploadTrait;
    function index(): View
    {
        $company = Company::where('user_id', auth()->id())->first();
        return view('front-end.company-dashboard.profile.index', compact('company'));
    }

    function updateCompanyInfo(CompanyInfoUpdateRequest $request): RedirectResponse
    {
        $logoPath = $this->uploadFile($request, 'logo');
        $bannerPath = $this->uploadFile($request, 'banner');

        $data = [];
        if (!empty($logoPath)) $data['logo'] = $logoPath;
        if (!empty($bannerPath)) $data['banner'] = $bannerPath;
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

    function updateFoundationInfo(CompanyFoundationInfoUpdate $request): RedirectResponse
    {
        Company::updateOrCreate(
            ['user_id' => auth()->id()],
            [
                'industry_type_id' => $request->industry_type,
                'organization_type_id' => $request->organization_type,
                'team_size_id' => $request->team_size,
                'establishment_date' => $request->establishment_date,
                'website' => $request->website,
                'email' => $request->email,
                'phone' => $request->phone,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'address' => $request->address,
                'map_link' => $request->map_link,
            ]

        );

        notify()->success('Updated Successfully', 'Success!!');
        return redirect()->back();
    }

    function updateAccountInfo(Request $request): RedirectResponse
    {
        $DataValidate=$request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email'],
        ]);

        Auth::user()->update($DataValidate);

        notify()->success('Updated Successfully', 'Success!!');
        return redirect()->back();
    }

    function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Auth::user()->update([
            'password' => bcrypt($request->password)
        ]);

        notify()->success('Updated Successfully', 'Success!!');
        return redirect()->back();
    }
}
