@inject('appPresenter', 'App\Presenters\AppPresenter')
<nav class="col-lg-2">

    <ul class="nav nav-pills nav-stacked">
        <li role="presentation" class="{{ $appPresenter->appMenuCurrentActive('user') }}"><a href="#">用户管理</a></li>
        <li><a>用户管理</a></li>
        <li><a>用户管理</a></li>
    </ul>

</nav>