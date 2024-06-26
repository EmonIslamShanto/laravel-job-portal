<?php

// Input error checking

use App\Models\Candidate;
use App\Models\Company;
use PhpParser\Node\Expr\Cast\Bool_;

if (!function_exists('hasError')) {
    function hasError($errors,string $name): ?string
    {
        return $errors->has($name) ? 'is-invalid' : '';
    }
}

// Set Sidebar Active
if (!function_exists('setSidebarActive')) {
    function setSidebarActive(array $routes): ?string
    {
        foreach ($routes as $route) {
            if (Route::is($route)) {
                return 'active';
            }
        }
        return null;
    }
}


// check company profile completion
if (!function_exists('checkComponyProfileCompletion')) {
    function checkComponyProfileCompletion(): bool
    {
        $requireFields = ['logo', 'banner', 'bio', 'vision','name', 'industry_type_id', 'organization_type_id', 'team_size_id', 'establishment_date', 'email', 'phone','country'];
        $company = Company::where('user_id', auth()->user()->id)->first();
        foreach ($requireFields as $field) {
            if (empty($company->$field)) {
                return false;
            }
        }
        return true;
    }

}

// check candidate profile completion
if (!function_exists('checkCandidateProfileCompletion')) {
    function checkCandidateProfileCompletion(): bool
    {
        $requireFields = ['image', 'email', 'full_name', 'experience_id','profession_id', 'birth_date', 'country', 'phone_one', 'bio', 'gender', 'marital_status', 'status'];
        $candidate = Candidate::where('user_id', auth()->user()->id)->first();
        foreach ($requireFields as $field) {
            if (empty($candidate->$field)) {
                return false;
            }
        }
        return true;
    }

}
// formate date
if (!function_exists('formatDate')) {
    function formatDate(?string $date): ?string
    {
        if($date)
        {
            return date('d M, Y', strtotime($date));
        }

        return null;
    }

}


//Store User Plan Session Information
if(!function_exists('storePlanInformation')){
    function storePlanInformation(){
        session()->forget('user_plan');
        session([
            'user_plan' => isset(auth()->user()?->company?->userPlan) ? auth()->user()->company->userPlan : []
        ]);
    }
}
