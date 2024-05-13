<?php

// Input error checking
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
