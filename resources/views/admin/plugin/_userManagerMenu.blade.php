@inject('appPresenter', 'App\Presenters\AppPresenter')
<nav class="col-lg-1 col-sm-1">

    <ul class="nav nav-pills nav-stacked">
        <li role="presentation" class="{{ $appPresenter->appMenuCurrentActive('users.index') }}"><a href="{{ route('users.index') }}">用户</a></li>
        <li class="{{ $appPresenter->appMenuCurrentActive('roles.index') }}"><a href="{{ route('roles.index') }}">角色</a></li>
        <li class="{{ $appPresenter->appMenuCurrentActive('permissions.index') }}"><a href="{{ route('permissions.index') }}">权限</a></li>
    </ul>

</nav>