<?php

namespace App\Services;

use App\Models\SiteSetting;
use Cache;

class SiteSettingService {
    function getSettings(){
        return Cache::remember('settings', 60, function(){
            return SiteSetting::pluck('value', 'key')->toArray();
        });
    }

    function setGlobalSettings(){
        $settings = $this->getSettings();
        config()->set('settings', $settings);
    }

    function clearCacheSettings(): void{
        Cache::forget('settings');
    }
}
