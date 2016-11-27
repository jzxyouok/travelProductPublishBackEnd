<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class EntrustController extends Controller
{
    //
    public function test() {
        /* 'name', 'email', 'password', 'mobile', 'avatar', 'birth',*/
        //创建用户
        $userAdmin = new User();
        $userAdmin->name = 'admin';
        $userAdmin->email = 'admin@admin.com';
        $userAdmin->password = bcrypt('admin');
        $userAdmin->mobile = '18916550105';
        $userAdmin->avatar = null;
        $userAdmin->birth = '1993-01-05';
        $userAdmin->save();

        $userOwner = new User();
        $userOwner->name = 'owner';
        $userOwner->email = 'owner@owner.com';
        $userOwner->password = bcrypt('owner');
        $userOwner->mobile = '15252272062';
        $userOwner->avatar = null;
        $userOwner->birth = '1993-01-05';
        $userOwner->save();

        //创建角色
        $roleOwner = new Role();
        $roleOwner->name         = 'owner';
        $roleOwner->display_name = 'Project Owner'; // optional
        $roleOwner->description  = 'User is the owner of a given project'; // optional
        $roleOwner->save();

        $roleAdmin = new Role();
        $roleAdmin->name         = 'admin';
        $roleAdmin->display_name = 'User Administrator'; // optional
        $roleAdmin->description  = 'User is allowed to manage and edit other users'; // optional
        $roleAdmin->save();

        //添加角色给用户
        $userOwner->attachRole($roleOwner);
        $userAdmin->attachRole($roleAdmin);

        /*主页控制台菜单*/
        $permissionHome = new Permission();
        $permissionHome->id = '2';
        $permissionHome->fid = '0';
        $permissionHome->is_menu = true;
        $permissionHome->name = 'admin.home';
        $permissionHome->display_name = 'Dashboard控制台';
        $permissionHome->description = '暂时为空';
        $permissionHome->save();

        /*产品管理菜单*/
        $permissionProduct = new Permission();
        $permissionProduct->id = '5';
        $permissionProduct->fid = '0';
        $permissionProduct->is_menu = true;
        $permissionProduct->name = 'admin.product';
        $permissionProduct->display_name = '产品管理';
        $permissionProduct->description = '暂时为空';
        $permissionProduct->save();


        /*创建系统管理菜单*/
        $permissionMenu = new Permission();
        $permissionMenu->id = '10';
        $permissionMenu->fid = '0';
        $permissionMenu->is_menu = true;
        $permissionMenu->name = 'admin.menu';
        $permissionMenu->display_name = '系统管理';
        $permissionMenu->description = '可以对用户，角色，权限 curd';
        $permissionMenu->save();

        //创建管理用户权限菜单
        $permissionUserManager = new Permission();
        $permissionUserManager->fid = '10';
        $permissionUserManager->is_menu = true;
        $permissionUserManager->name = 'admin.user.manager';
        $permissionUserManager->display_name = '用户权限管理';
        $permissionUserManager->description = '可以看到用户，角色，权限 选项';
        $permissionUserManager->save();

        //创建管理用户 curd 权限
        $permissionUser = new Permission();
        $permissionUser->fid = '10';
        $permissionUser->is_menu = false;
        $permissionUser->name = 'admin.user';
        $permissionUser->display_name = '用户管理';
        $permissionUser->description = '页面';
        $permissionUser->save();

        //创建管理角色权限
        $permissionRole = new Permission();
        $permissionRole->fid = '10';
        $permissionRole->is_menu =  false;
        $permissionRole->name = 'admin.role';
        $permissionRole->display_name = '管理角色';
        $permissionRole->description = '可以访问角色管理路由 curd';
        $permissionRole->save();

        //创建管理权限分配权限
        $permissionPermission = new Permission();
        $permissionPermission->fid = '10';
        $permissionPermission->is_menu =  false;
        $permissionPermission->name = 'admin.permission';
        $permissionPermission->display_name = '管理权限';
        $permissionPermission->description = '可以访问权限路由 curd';
        $permissionPermission->save();


        //添加权限到角色
        $roleOwner->attachPermissions([$permissionHome, $permissionProduct, $permissionMenu, $permissionUserManager, $permissionRole, $permissionPermission]);//项目管理者拥有所有权限
        $roleAdmin->attachPermissions([$permissionHome, $permissionProduct]);//admin 可以对产品增删改查

    }
}
