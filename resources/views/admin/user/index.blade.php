@extends('admin.layouts.master')

@section('content')

    <h3>用户管理主页</h3>
    当前路由:{{ Route::currentRouteName() }}
    @endsection