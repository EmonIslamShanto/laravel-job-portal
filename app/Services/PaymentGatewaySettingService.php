<?php

namespace App\Services;

use App\Models\PaymentSetting;
use Cache;

class PaymentGatewaySettingService {
    function getSettings(){
        return Cache::remember('gatewaySettings', 60, function(){
            return PaymentSetting::pluck('value', 'key')->toArray();
        });
    }

    function setGlobalSettings(){
        $settings = $this->getSettings();
        config()->set('gatewaySettings', $settings);
    }

    function clearCacheSettings(): void{
        Cache::forget('gatewaySettings');
    }
}
