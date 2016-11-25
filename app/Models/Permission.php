<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    //
    protected $fillable = ['id', 'fid','is_menu', 'name', 'display_name', 'description'];
    
    //添加获取属性
    protected $appends = ['sub_permission'];

    /*返回子菜单*/
    public function getSubPermissionAttribute()
    {

        return Permission::where('fid', '=', $this->id)->where('is_menu', true)->get();
    }
    
}
