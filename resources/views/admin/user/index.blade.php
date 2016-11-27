@extends('admin.layouts.master')

@section('content')

    <div class="row">

        @include('admin.plugin._userManagerMenu')
        <div class="col-lg-10 col-sm-9">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Responsive Hover Table</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>创建</th>
                            <th>手机</th>
                            <th>操作</th>
                        </tr>

                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td><span class="label label-success">{{ $user->mobile }}</span></td>
                            <td>
                                @include('admin.user.edit')
                                <label onclick="userEdit()" id="label_edit" class="label label-primary">编辑</label>
                                <label for="" class="label label-danger">删除</label>
                            </td>
                        </tr>
                        @endforeach

                        </tbody></table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    @endsection

@section('js')
    <script>

        function userEdit() {
            alert(1);
        }

    </script>

    @endsection