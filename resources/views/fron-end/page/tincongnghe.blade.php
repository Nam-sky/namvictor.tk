@extends('fron-end.master')
@section('title')
    Tin công nghệ
@endsection
@section('meta-seo')
<meta name="description" content="Các tin tức về công nghệ mới và HOT nhất hiện nay ! ">
<meta property="og:url" content="https://namvictor.tk/tin-tuc-cong-nghe">
<meta property="og:image" content="https://namvictor.tk/public/upload/avatar-page/tin-cong-nghe.jpg">
<meta property="og:image:alt" content="Nam Victor">
<meta property="og:title" content="Tin tức công nghệ - Nam Victor">
<meta property="og:type" content="article">
<meta property="og:description" content="Các tin tức về công nghệ mới và HOT nhất hiện nay !">
@endsection
@section('main')
<div class="container bg-white pt-5">
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