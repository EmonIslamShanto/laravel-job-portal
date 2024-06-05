<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GeneralSettingsUpdateRequest;
use App\Models\SiteSetting;
use App\Services\Notify;
use App\Services\SiteSettingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    public function index(): View
    {
        return view('admin.site-settings.index');
    }

    function updateGeneralSetting(GeneralSettingsUpdateRequest $request): RedirectResponse{

        $validated = $request->validated();

        foreach($validated as $key => $value){
            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingService = app(SiteSettingService::class);
        $settingService->clearCacheSettings();

        Notify::updatedNotification();
        return redirect()->back();
    }
}
