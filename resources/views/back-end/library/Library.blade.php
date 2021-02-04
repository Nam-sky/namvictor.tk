@extends('back-end.master')
@section('title')
Library
@endsection
@section('main')
<div class="container pt-5">
        <div class="text-center">
            <h4 class="text-center font-weight-bold mb-4">Thêm ảnh mới</h4>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                <label>Chọn ảnh</label>
                <input type="file" id="image" name="image" multiple >
                </div>
                @if($errors->has('image'))
                <p class="text-danger">{{$errors->first('image')}}</p>
                @endif
                <input class="btn btn-info d-block mx-auto" type="submit" value="Thêm">
            </form>
            @if (session('message'))
            <div class="alert alert-success text-center">
                <strong>{{session('message')}}</strong>
            </div>
            @endif
        </div>
        <hr>
        <h4 class="text-center font-weight-bold">Thư viện ảnh</h4>
        @if (session('message1'))
        <div class="alert alert-success text-center">
            <strong>{{session('message1')}}</strong>
        </div>
        @endif
        <div class="container library">
            <ul class="text-center">
                @foreach($data as $value)
                <li>
                    <img  src="public/upload/library/{{$value->library_name}}" alt="">
                    <div><a onclick="return confirm('Bạn có chắc chắn muốn xóa ảnh ?');" href="admin/library-delete/{{$value->library_id}}">Xóa</a></div>
                </li>
                @endforeach
            </ul>
        </div>
        <div aria-label="Page navigation">
        {{$data->links()}}
        </div>
</div>
@endsection