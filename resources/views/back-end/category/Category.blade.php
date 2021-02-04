@extends('back-end.master')
@section('title')
Danh sách danh mục
@endsection
@section('main')
<div class="container pt-5">
    <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Danh mục bài viết</h2>
    <div class="row">
        <div class="col-sm-8">
        <h4 class="text-center font-weight-bold">Danh sách danh mục</h4>
        @if (session('message1'))
        <div class="alert alert-success text-center">
            <strong>{{session('message1')}}</strong>
        </div>
        @endif
        <table class="table list-cate">
            <thead>
            <tr>
                <th style="text-align:center" scope="col">STT</th>
                <th style="text-align:center" scope="col">Tên danh mục</th>
                <th style="text-align:center" scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; foreach($data as $value) { ?>
            <tr>
                <th style="text-align:center" scope="row">{{$i++}}</th>
                <td style="text-align:center">{{$value->cate_name}}</td>
                <td style="text-align:center"><a  onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục ?');" href="admin/delete-category/{{$value->cate_id}}">Xóa</a></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
        <div class="col-sm-4 border-left">
        <h4 class="text-center font-weight-bold">Thêm danh mục mới</h4>
        <form action="{{Route('cate.store')}}" method="POST">
            @csrf
            <div class="form-group">
            <label for="nameCate">Tên danh mục</label>
            <input type="text" class="form-control" id="nameCate" placeholder="Tên danh mục" name="nameCate" required>
            </div>
            <input class="btn btn-info d-block mx-auto" type="submit" value="Thêm">
        </form>
        <div class="alert text-center text-info">
                <strong>{{session('message')}}</strong>
        </div>
        </div>
    </div>
</div>
@endsection