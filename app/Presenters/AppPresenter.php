<?php

namespace App\Presenters;

use Route;

class AppPresenter {

    public function appMenuCurrentActive($routeName)
    {
        $currentRouteName = Route::currentRouteName();
        $names = explode('.', $currentRouteName);

        if (isset($names) && $names[1] == $routeName) {
            return 'active';
        }

    }
    
}