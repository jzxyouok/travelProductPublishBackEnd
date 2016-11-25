<?php

namespace App\Presenters;

use App\Models\Permission;
use Route;

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

        $firstLevelMenus = Permission::where('fid', '=', '0')->where('is_menu', true)->get();

        $html = '';

//        {"id":2,"fid":0,"is_menu":1,"name":"admin.home","display_name":"Dashboard\u63a7\u5236\u53f0","description":"\u6682\u65f6\u4e3a\u7a7a","created_at":"2016-11-25 06:06:49","updated_at":"2016-11-25 06:06:49"},

        $html = $html."<ul class=\"sidebar-menu\"><li class=\"header\">HEADER</li>";
        foreach ($firstLevelMenus as $firstLevelMenu) {

            $display_name = $firstLevelMenu->display_name;
            $menu = '';
            if (count($firstLevelMenu->sub_permission) > 0) {
                //有子菜单
                $sub_permissions = $firstLevelMenu->sub_permission;
                $menu = $menu."<li class=\"treeview\">
                <a href=\"#\"><i class=\"fa fa-link\"></i> <span>$display_name</span>
                    <span class=\"pull-right-container\">
              <i class=\"fa fa-angle-left pull-right\"></i>
            </span>
                </a>
                <ul class=\"treeview-menu\">";

                foreach ($sub_permissions as $sub_permission) {

                    //如果路由为#
                    $routeUrlStr = $sub_permission['name'] == '#' ? '' : route($sub_permission->name);
                    $menu = $menu.sprintf('<li><a href="%s" class="active">%s</a></li>', $routeUrlStr, $sub_permission->display_name);

                }

                $menu = $menu."</ul></li>";


            } else {
                //无二级菜单
                $menu = sprintf('<li><a href="%s"><i class="fa fa-link"></i>%s<span></span></a></li>', route('users.index'), $display_name);
            }

            $html = $html.$menu;
        }

        $html = $html.'</ul>';

        return $html;

    }
    
}