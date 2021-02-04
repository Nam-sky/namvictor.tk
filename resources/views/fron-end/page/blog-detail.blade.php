@extends('fron-end.master')
@section('title')
    {{$data->blog_name}}
@endsection
@section('meta-seo')
<meta property="og:image" content="http://namvictor.tk/public/upload/blog/{{$data->thumbnail}}">
    <meta property="og:url" content="http://namvictor.tk/blog/{{$data->blog_id}}-{{$data->blog_slug}}.html">
    <meta property="og:image:alt" content="Nam Victor">
    <meta property="og:title" content="{{$data->blog_name}} - Nam Victor">
    <meta property="og:type" content="article">
    <meta property="og:description" content="{{$data->mota}}">
@endsection


@section('main')
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0" nonce="vr23FzEI"></script>
        <div class="container bg-white mt-5">
            
            <div class="category-blog">
                <h5 class="pt-3">{{$data->cate_name}}</h5>
            </div>
            <div class="row">
                <div class="content col-sm-8">
                    
                    <div class="title-blog">
                        <h2>{{$data->blog_name}}</h2>
                        <p><i class="far fa-clock"></i> {{$data->updated_at}} - {{$data->views}} lượt xem</p>
                        <div class="fb-share-button pt-2 mb-2" data-href="https://namvictor.tk/blog/{{$data->blog_id}}-{{$data->blog_slug}}.html" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fnamvictor.tk%2Fblog%2F{{$data->blog_id}}-{{$data->blog_slug}}.html&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                        <div class="fb-like" data-href="http://namvictor.tk/blog/{{$data->blog_id}}-{{$data->blog_slug}}.html" data-width="" data-layout="standard" data-action="like" data-size="large" data-share="false"></div>
                    </div>
                    
                    <div class="content-blog">
                        <h5 class="font-weight-bold mt-3">{{$data->mota}}</h5>
                        <p>{!!$data->content!!}</p>
                    </div>
                    <div>
                        <h2 class="pt-4 font-weight-bold">Bình luận</h2>
                        <form data-url="{{route('home.comment')}}" id="form_com">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->blog_id}}">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name">
                                @if($errors->has('name'))
                                 <p class="text-danger">{{$errors->first('name')}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email">
                                @if($errors->has('email'))
                                 <p class="text-danger">{{$errors->first('email')}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="content">Nội dung:</label>
                                <textarea class="form-control" rows="5" id="content" name="content"></textarea>
                                @if($errors->has('content'))
                                 <p class="text-danger">{{$errors->first('content')}}</p>
                                @endif
                            </div>
                            <button type="submit" id="com-submit" class="btn btn-primary">Bình luận</button>
                        </form>
                        <div class="alert alert-success" style="display:none"></div>
                    </div>
                    <div class="pt-5">
                    <div id="comment"></div>
                    <script type="text/javascript">
                            $(document).ready(function(){
                                $('#form_com').submit(function(event){
                                    event.preventDefault();
                                    var data = $('#form_com').serialize();
                                    var url = $(this).attr('data-url');
                                    $.ajax({
                                        url: url,
                                        method: 'POST',
                                        data: data,
                                        success: function(result){
                                            var html = '';
                                            html += '<div>'+
                                               '<h5 class="font-weight-bold m-0">'+result.name+'</h5>'+
                                               '<small>'+result.date+'</small>'+ 
                                               '<p class="show-content" style="font-size:25px">'+result.content+'</p>'+
                                            '</div>';
                                            $("#comment").html(html);
                                            $("#form_com")[0].reset()
                                        }
                                    });
                                });
                            });  
                        </script>
                    @foreach($data2 as $value)
                        <h5 class="font-weight-bold m-0">{{$value->com_name}}</h5>
                        <small>{{$value->created_at}}</small>
                        <p style="font-size:25px">{{$value->com_content}}</p>
                        <hr>
                    @endforeach
                    <div aria-label="Page navigation" class="d-block mx-auto">
                    {{$data2->links()}}
                    </div>
                    </div>
                    <div class="blog-other">
                        <h5 class="title-blog-other">BÀI VIẾT CÙNG CHUYÊN MỤC</h5>
                        <div class="row skill-item-blog pt-4">
                        @foreach($data1 as $value)
                            <div class="col-sm-4">
                                <a href="blog/{{$value->blog_id}}-{{($value->blog_slug)}}.html">
                                    <div class="img-wrapper2"><img src="public/upload/blog/{{$value->thumbnail}}" alt=""></div>
                                    <h5>{{$value->blog_name}}</h5>
                                </a>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="category-other col-sm-4">
                    <div class="category-other-blog">
                        <h5 class="pt-3">Chuyện đời</h5>
                        <div class="pt-3">
                        @foreach($chuyendoi as $value)
                            <div class="row mb-3">
                                <img class="col-sm-4 w-100" src="public/upload/blog/{{$value->thumbnail}}" alt="">
                                <div class="col-sm-8">
                                    <p><a href="blog/{{$value->blog_id}}-{{($value->blog_slug)}}.html">{{$value->blog_name}}</a></p>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection