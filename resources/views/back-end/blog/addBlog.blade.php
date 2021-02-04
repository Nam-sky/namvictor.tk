@extends('back-end.master')
@section('title')
Thêm bài viết mới
@endsection
@section('main')
<div class="container pt-2">
    <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Thêm bài viết mới</h2>
    @if (session('message'))
    <div class="alert alert-success text-center">
        <strong>{{session('message')}}</strong>
    </div>
    @endif
    <form action="{{Route('blog.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="nameBlog" class="font-weight-bold">Tên bài viết</label>
            <input type="text" class="form-control" id="nameBlog" placeholder="Tên bài viết" name="nameBlog">
            @if($errors->has('nameBlog'))
                <p class="text-danger">{{$errors->first('nameBlog')}}</p>
            @endif
        </div>
        <div class="form-group mb-4">
            <label for="category" class="font-weight-bold">Danh mục</label>
            <select class="form-control" id="category" name="category">
                <?php foreach($data as $value) { ?>
                <option value="{{$value->cate_id}}">{{$value->cate_name}}</option>
                <?php } ?>
            </select>
        </div>
        <label class="font-weight-bold">Thumbnail bài viết</label>
        <div class="custom-file w-25">
            <input type="file" class="custom-file-input" id="fileToUpload" name="fileToUpload">
            <label class="custom-file-label" for="fileToUpload">Chọn ảnh</label>
            </div>
            @if($errors->has('fileToUpload'))
                <p class="text-danger">{{$errors->first('fileToUpload')}}</p>
            @endif
        <div class="form-group mt-3">
            <label for="mota" class="font-weight-bold">Mô tả ngắn</label>
            <input type="text" class="form-control" id="mota" placeholder="Mô tả của bài viết" name="mota">
            @if($errors->has('mota'))
                <p class="text-danger">{{$errors->first('mota')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="content" class="font-weight-bold">Nội dung bài viết</label>
            <textarea class="form-control ckeditor" id="content" rows="3" name="content"></textarea>
            @if($errors->has('content'))
                <p class="text-danger">{{$errors->first('content')}}</p>
            @endif
            <script>
                var editor = CKEDITOR.replace('content',{
                    language: 'vi',
                    filebrowserImageBrowseUrl: 'public/editor/ckfinder/ckfinder.html?Type=Image',
                    filebrowserFlashBrowseUrl: 'public/editor/ckfinder/ckfinder.html?Type=Flash',
                    filebrowserImageUploadUrl: 'public/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl: 'public/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                });
            </script>
        </div>
        <input class="btn btn-info d-block mx-auto" type="submit" value="Thêm bài viết">
        </form>
</div>
@endsection