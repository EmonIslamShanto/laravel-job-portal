<?php

// Input error checking

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
// check profile completion
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
