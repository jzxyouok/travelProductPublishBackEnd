<?php

namespace App\Presenters;

use Route;

class AppPresenter {

    public function appMenuCurrentActive($routeName)
    {
        $currentRouteName = Route::currentRouteName();

        if ($currentRouteName == $routeName) {
            return 'active';
        } else {
            return '';
        }

//        $names = explode('.', $currentRouteName);
//        if (isset($names) && $names[0] == $routeName) {
//            return 'active';
//        }

    }
    
}