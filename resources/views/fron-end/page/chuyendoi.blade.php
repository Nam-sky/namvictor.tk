@extends('fron-end.master')
@section('title')
    Chuyện đời
@endsection
@section('meta-seo')
<meta name="description" content="Những câu chuyện về đời sống hàng ngày của Nam Victor !">
<meta property="og:url" content="https://namvictor.tk/chuyen-doi">
<meta property="og:image" content="https://namvictor.tk/public/upload/avatar-page/chuyen-doi.jpg">
<meta property="og:image:alt" content="Nam Victor">
<meta property="og:title" content="Chuyện đời - Nam Victor">
<meta property="og:type" content="article">
<meta property="og:description" content="Những câu chuyện về đời sống hàng ngày của Nam Victor !">
@endsection
@section('main')
<div class="blog-title container pt-4">
    <h4 class="font-weight-bold"><i>"
        Có người đến, có người đi và có người ở lại </br>
        Có lúc khôn và cũng có lần nhỡ dại </br>
        Có lúc tủi, có lúc vinh và có lúc thăng hoa </br>
        Có ngày cười, có ngày khóc và có ngày hoan ca </br>
        Đời cho ta quá nhiều thứ </br>
        Ta chưa cho đời được nhiều </br>
        Đến bây giờ vẫn chưa học được cách làm sao để lời được nhiều </br>
        Mười năm như một bức hoạ, cũng may là trời đỡ xám hơn."</i></h4>
        <h5><i>Đời người được mấy lần 10 năm</i></h5>
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