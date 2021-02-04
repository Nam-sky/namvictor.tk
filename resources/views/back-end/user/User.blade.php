@extends('back-end.master')
@section('title')
Danh sách quản trị viên
@endsection
@section('main')
<div class="container pt-5">
    <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Quản lý quản trị viên</h2>
    <div class="row">
        <div class="col-sm-8">
        <h4 class="text-center font-weight-bold">Danh sách quản trị viên</h4>
        <table class="table list-cate">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1; ?>
            @foreach($data as $value)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa QTV ?');" href="admin/delete-user/{{$value->id}}">Xóa</a></td>
            </tr>
            @endforeach
            <div aria-label="Page navigation" class="d-block mx-auto">
                 {{$data->links()}}
            </div>
            </tbody>
            @if (session('message1'))
            <div class="alert alert-success text-center">
                <strong>{{session('message1')}}</strong>
            </div>
            @endif
        </table>
        </div>
        <div class="col-sm-4 border-left">
        <h4 class="text-center font-weight-bold">Thêm quản trị viên mới</h4>
        @if (session('message'))
        <div class="alert alert-success text-center">
            <strong>{{session('message')}}</strong>
        </div>
        @endif
        <form action="{{Route('user.create')}}" method="POST">
        @csrf
            <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" class="form-control" id="username" placeholder="User Name" name="username">
                @if($errors->has('username'))
                <p class="text-danger">{{$errors->first('username')}}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                @if($errors->has('email'))
                <p class="text-danger">{{$errors->first('email')}}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                @if($errors->has('password'))
                <p class="text-danger">{{$errors->first('password')}}</p>
                @endif
            </div>
            <input class="btn btn-info d-block mx-auto" type="submit" value="Thêm">
        </form>
        </div>
    </div>
</div>
@endsection