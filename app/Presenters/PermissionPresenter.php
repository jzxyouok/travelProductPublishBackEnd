<?php

namespace App\Presenters;

use App\Models\Permission;

class PermissionPresenter {

    private $permission;
    
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    /**
     * 用户根据权限可见的菜单
     * return
     */
    public function menu()
    {
        


    }
    
}