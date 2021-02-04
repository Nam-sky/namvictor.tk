@extends('back-end.master')
@section('title')
Danh sách comment bài viết
@endsection
@section('main')
<div class=" p-5">
    <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Danh sách comment bài viết</h2>
    <div class="row">
        <div class="col-sm-12">
            <table class="table list-cate">
                <thead>
                <tr>
                    <th style="text-align:center" scope="col">STT</th>
                    <th style="text-align:center" scope="col">Tên</th>
                    <th style="text-align:center" scope="col">Email</th>
                    <th style="text-align:center" scope="col">Nội dung</th>
                    <th style="text-align:center" scope="col">Bài viết</th>
                    <th style="text-align:center" scope="col">Ngày bình luận</th>
                    <th style="text-align:center" scope="col">Hành động</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1;?> 
                @foreach($comments as $comment)
                <tr>
                    <th style="text-align:center" scope="row">{{$i++}}</th>
                    <td style="text-align:center">{{$comment->com_name}}</td>
                    <td style="text-align:center">{{$comment->com_email}}</td>
                    <td style="text-align:center;width:25%">{{$comment->com_content}}</td>
                    <td style="text-align:center;width:25%"><a target="_blank" href="/blog/{{$comment->blog->blog_id}}-{{$comment->blog->blog_slug}}.html">{{$comment->blog->blog_name}}</a></td>
                    <td style="text-align:center">{{$comment->created_at}}</td>
                    <td style="text-align:center"><button class="btn btn-danger" onclick="remove({{$comment->com_id}})"><i class="fas fa-trash-alt"></i></button></td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div aria-label="Page navigation" class="d-block mx-auto text-center">
                {{$comments->links()}}
            </div>
        </div>
    </div>
</div>
<script>
    function remove(id){
            $.ajax({
                type:'get',
                url: 'admin/destroy-comment',
                data: {
                    id : id,
                },
                success: function (data){
                    swal("Thành công!", data.message, "success");
                    setTimeout(function () { location.reload(true); }, 1000);
                }
            })
        }
</script>
@endsection