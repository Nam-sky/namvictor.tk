@extends('back-end.master')
@section('title')
Danh sách bài viết
@endsection
@section('main')
<div class="container pt-5">
    <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Danh sách bài viết</h2>
    @if (session('message'))
    <div class="alert alert-success text-center">
        <strong>{{session('message')}}</strong>
    </div>
    @endif
    <table class="table list-cate">
    <thead>
        <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên bài viết</th>
        <th scope="col">Views</th>
        <th scope="col">Danh mục</th>
        <th scope="col">Ngày viết</th>
        <th scope="col">Hành động</th>
        </tr>
    </thead>
    <tbody>
    <?php $i=1; foreach($data as $value) { ?>
        <tr>
            <th scope="row">{{$i++}}</th>
            <td>{{$value->blog_name}}</td>
            <td class="text-center">{{$value->views}}</td>
            <td>{{$value->cate_name}}</td>
            <td>{{$value->created_at}}</td>
            <td><a class="btn btn-info"  href="admin/update-blog/{{$value->blog_id}}"><i class="fas fa-edit"></i></a><a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết ?');" href="admin/delete/{{$value->blog_id}}"><i class="fas fa-trash-alt"></i></a></td>
        </tr>
    <?php } ?>
    </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6" aria-label="Page navigation">
            {{$data->links()}}
        </div>
        <div class="col-sm-6 w-100" style="display: flex;align-items: center;">
            <p class="text-left font-weight-bold">{{count($data)}} trong tổng số {{count($data2)}}</p>
        </div>
    </div>
</div>
@endsection