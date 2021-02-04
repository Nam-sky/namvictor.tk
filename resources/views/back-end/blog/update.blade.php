@extends('back-end.master')
@section('title')
Update bài viết
@endsection
@section('main')
<div class="container pt-2">
    <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Sửa bài viết</h2>
    @if (session('message'))
    <div class="alert alert-success text-center">
        <strong>{{session('message')}}</strong>
    </div>
    @endif
    <form action="{{Route('blog.postUpdate')}}" method="POST" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="id" value="{{$blogData->blog_id}}">
        <div class="form-group">
            <label for="nameBlog" class="font-weight-bold">Tên bài viết</label>
            <input type="text" class="form-control" id="nameBlog" placeholder="Tên bài viết" name="nameBlog" value="{{$blogData->blog_name}}" required>
        </div>
        <div class="form-group mb-4">
            <label for="category" class="font-weight-bold">Danh mục</label>
            <select class="form-control" id="category" name="category">
                <?php foreach($cateData as $value) { 
                    $selected = $value->cate_id == $blogData->cate_blog ? 'selected' : '';?>
                <option {{$selected}} value="{{$value->cate_id}}">{{$value->cate_name}}</option>
                <?php } ?>
            </select>
        </div>
        <p class="font-weight-bold">Thumbnail</p>
        <img src="public/upload/blog/{{$blogData->thumbnail}}" style="height:200px" alt=""> <br>
        <label class="font-weight-bold mt-3">Update Thumbnail mới</label>
        <div class="custom-file w-25">
            <input type="file" class="custom-file-input" id="fileToUpload" name="fileToUpload">
            <label class="custom-file-label" for="fileToUpload">Chọn ảnh</label>
            <input type="hidden" name="image_current" value="{{$blogData->thumbnail}}">
            </div>
        <div class="form-group mt-3">
            <label for="mota" class="font-weight-bold">Mô tả ngắn</label>
            <input type="text" class="form-control" id="mota" placeholder="Mô tả của bài viết" name="mota" value="{{$blogData->mota}}" required>
        </div>
        <div class="form-group">
            <label for="content" class="font-weight-bold">Nội dung bài viết</label>
            <textarea class="form-control ckeditor" id="content" rows="3" name="content" required>{{$blogData->content}}"</textarea>
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
        <input class="btn btn-info d-block mx-auto" type="submit" value="Sửa bài viết">
        </form>
</div>
@endsection