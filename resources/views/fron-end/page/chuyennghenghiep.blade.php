@extends('fron-end.master')
@section('title')
    Chuyện nghề nghiệp
@endsection
@section('meta-seo')
<meta name="description" content="Những câu chuyện về công việc trong cuộc sống thường ngày !">
<meta property="og:url" content="https://namvictor.tk/chuyen-nghe-nghiep">
<meta property="og:image" content="https://namvictor.tk/public/upload/avatar-page/chuyen-nghe-nghiep.png">
<meta property="og:image:alt" content="Nam Victor">
<meta property="og:title" content="Chuyện nghề nghiệp - Nam Victor">
<meta property="og:type" content="article">
<meta property="og:description" content="Những câu chuyện về công việc trong cuộc sống thường ngày !">
@endsection
@section('main')
<div class="blog-title container pt-4">
    <h4 class="font-weight-bold"><i>"Ai rồi cũng đến lúc phải đưa ra cho mình những quyết định quan trọng, quyết định chọn trường, quyết định kết hôn. Nhưng có lẽ, quyết định chọn nghề bao giờ cũng khó khăn nhất. Nhiều người may mắn lựa chọn cho mình được một cái nghề theo đam mê, nhưng vài người khác có thể phải dành cả thanh xuân để “trả giá” cho sự lựa chọn của mình. Còn bạn thì sao, trước ngưỡng cửa nghề nghiệp, bạn đã bao giờ đặt câu hỏi giữa con tim và lý trí, bên nào nặng hơn?"</i></h4>
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