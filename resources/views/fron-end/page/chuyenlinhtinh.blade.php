@extends('fron-end.master')
@section('title')
    Chuyện linh tinh
@endsection
@section('meta-seo')
<meta name="description" content="Những câu chuyện linh tinh trong cuộc sống thường ngày !">
<meta property="og:url" content="https://namvictor.tk/chuyen-linh-tinh">
<meta property="og:image" content="https://namvictor.tk/public/upload/avatar-page/chuyen-linh-tinh.jpg">
<meta property="og:image:alt" content="Nam Victor">
<meta property="og:title" content="Chuyện linh tinh - Nam Victor">
<meta property="og:type" content="article">
<meta property="og:description" content="Những câu chuyện linh tinh trong cuộc sống thường ngày !">
@endsection
@section('main')
<div class="blog-title container pt-4">
    <h4 class="font-weight-bold">Chuyện linh tinh</h4>
</div>
<div class="container bg-white mt-5">
    <div class="blog-item">
        @foreach($data as $value)
        <div class="row mb-4">
            <img class="col-sm-4 p-0 w-100" src="public/upload/blog/{{$value->thumbnail}}" alt="">
            <div class="col-sm-8">
                <a href="blog/{{$value->blog_id}}-{{($value->blog_slug)}}.html"><h4 class="font-weight-bold pt-2">{{$value->blog_name}}</h4></a>
                <p><i class="far fa-clock"></i> {{$value->updated_at}}</p>
                <p>{{$value->mota}}</p>
            </div>
        </div>
        <hr>
        @endforeach
        <div aria-label="Page navigation" class="d-block mx-auto">
            {{$data->links()}}
        </div>
    </div>
</div>
@endsection