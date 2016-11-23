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

        //创建权限
        $permissionUser = new Permission();
        $permissionUser->name = 'admin.user';
        $permissionUser->display_name = '管理用户';
        $permissionUser->description = '可以对用户 curd';
        $permissionUser->save();

        $permissionProduct = new Permission();
        $permissionProduct->name = 'admin.product';
        $permissionProduct->display_name = '管理产品';
        $permissionProduct->description = '可以对产品 curd';
        $permissionProduct->save();

        //添加权限到角色
        $roleOwner->attachPermissions([$permissionUser, $permissionProduct]);//项目管理者拥有所有权限
        $roleAdmin->attachPermission($permissionProduct);//admin 可以对产品增删改查

    }
}
