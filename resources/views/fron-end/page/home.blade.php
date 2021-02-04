@extends('fron-end.master')
@section('title')
Trang chủ - Nam Victor
@endsection
@section('meta-seo')
<meta name="description" content="Đây là blog cá nhân của Nam Victor, hãy bấm vào để hiểu hơn về Nam Victor nhé !">
<meta property="og:url" content="http://namvictor.tk">
<meta property="og:image" content="https://namvictor.tk/public/upload/library/1.jpg">
<meta property="og:image:alt" content="Nam Victor">
<meta property="og:title" content="Nam Victor">
<meta property="og:type" content="article">
<meta property="og:description" content="Đây là blog cá nhân của Nam Victoc, hãy bấm vào để hiểu hơn về Nam Victor nhé !">
@endsection
@section('main')
<div id="demo" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
            </ul>
            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="public/source/image/slider/nam 2.png" alt="Nguyễn Nam 1" width="1100" height="300">
                </div>
                <div class="carousel-item">
                <img src="public/source/image/slider/nam vs diep van.png" alt="Nguyễn Nam 2" width="1100" height="300">
                </div>
            </div>
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
<section class="intro pt-4 container-fluid">
                <div class="row">
                    <div class="info col-sm-4 col-xs-4">
                        <img src="public/source/image/info/2.jpg" alt="" class="mx-auto d-block">
                        <div class="info-left">
                            <h4 class="text-white text-center pt-2">Nguyễn Nam</h4>
                            <p>Họ và Tên: Nguyễn Văn Nam</p>
                            <p>Ngày Sinh: 13/10/1997</p>
                            <p>Quê Quán: Tam Đảo - Vĩnh Phúc</p>
                            <p>Học Cơ Điện Tử tại HVKT Quân Sự</p>
                            <p>Câu nói yêu thích:
                                <i>"Có làm thì mới có ăn,không làm thì chỉ ăn cứt"</i>
                            </p>
                            <p>Quan điểm trong tình yêu: <i>"Nếu không yêu thì xin đừng thịt nhau"</i></p>
                            <p>Cuốn sách yêu thích: <i>"Cô giáo Thảo"</i></p>
                        </div>
                    </div>
                    <div class="skill col-sm-7 col-xs-7">
                        <h2><i class="fas fa-heart"></i> Tình yêu</h2>
                        <div class="bg bg-white progaming">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" style="width:96%; height: 30px;">Mức độ hạnh phúc ở thời điểm hiện tại - 96,69%</div>
                        </div>
                        <div class="row skill-item-blog pt-4">
                        @foreach($tinhyeu as $value)
                            <div class="col-sm-4">
                                <a href="blog/{{$value->blog_id}}-{{($value->blog_slug)}}.html">
                                    <div class="img-wrapper"><img src="public/upload/blog/{{$value->thumbnail}}" alt=""></div>
                                    <h5>{{$value->blog_name}}</h5>
                                </a>
                            </div>
                        @endforeach
                        </div>
                        <h2 class="pt-5"><i class="fas fa-shoe-prints"></i></i> Chuyện đời</h2>
                        <div class="bg bg-white progaming">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" style="width:69%; height: 30px;">Mức độ hài lòng với cuộc sống hiện tại - 69,96%</div>
                        </div>
                        <div class="row skill-item-blog pt-4">
                            @foreach($chuyendoi as $value)
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
        </section>
        <section class="life bg bg-white">
            <h3 class="text-center pt-5 font-weight-bold title">TIN CÔNG NGHỆ</h3>
            <div class="line-title">
            </div>
            <div class="container tin-cong-nghe pt-5">
            @foreach($tincongnghe as $value)
                <div class="row">
                    <img class="col-sm-4 w-100" src="public/upload/blog/{{$value->thumbnail}}" alt="">
                    <div class="col-sm-8">
                        <h3><a href="blog/{{$value->blog_id}}-{{($value->blog_slug)}}.html">{{$value->blog_name}}</a></h3>
                        <small>{{$value->updated_at}}</small>
                        <p>{{$value->mota}}</p>
                    </div>
                </div>
                <hr>
            @endforeach
            <div aria-label="Page navigation" class="d-block mx-auto pb-2">
                {{$tincongnghe->links()}}
            </div>
            </div>
        </section>
        <section class="container bg-white mt-3 pb-3">
        <div class="shadow-sm p-2 mb-4 bg-white">
            <h3 class="text-center pt-2 font-weight-bold" style="color:#78b43d">BÀI VIẾT NHIỀU NGƯỜI ĐỌC</h3>
        </div>
        <div class="skill-item-blog">
            <div class="row">
                @foreach($topview as $value)
                    <div class="col-sm-4 shadow-lg p-3 mb-5 bg-white">
                        <a href="blog/{{$value->blog_id}}-{{($value->blog_slug)}}.html">
                            <div class="img-wrapper2"><img src="public/upload/blog/{{$value->thumbnail}}" alt=""></div>
                            <h5 class="text-dark">{{$value->blog_name}}</h5>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        </section>
        <section class="do-hop-namvictor p-5 mt-3">
            <h3 class="text-center pt-5 font-weight-bold title text-white">CÙNG XEM BẠN VÀ NAMVICTOR HỢP NHAU KHÔNG NHÉ !</h3>
            <div class="line-title">
            </div>
            <div class="container text-center">
                <form id="form_contact" data-url="{{route('contact.store')}}">
                @csrf
                    <div class="form-group row check-do-hop">
                        <label for="name" class="col-sm-3 col-form-label">Tên của bạn</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên của bạn" require>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="age" class="col-sm-3 col-form-label">Tuổi của bạn</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" id="age" name="age" placeholder="Nhập tuổi của bạn" require>
                        </div>
                      </div>
                    <button type="submit" class="btn btn-primary mx-auto d-block">XEM NGAY</button>
                    <h5 class="text-white mt-3" id="name_check"></h5>
                    <h4 id="check" class="text-white mt-3"></h4>
                    
                  </form>
                  <script>
                  $(document).ready(function(){
                        $("#form_contact").submit(function( event ) {
                            event.preventDefault();
                            var name = $('#name').val();
                            var age = $('#name').val();
                            if(name==0 || age==0){
                                $('#name_check').text('Vui lòng nhập đủ thông tin !');
                            }else{
                                var data = $("#form_contact").serialize();
                                var url = $(this).attr('data-url');
                                $.ajax({
                                    type:'post',
                                    url: url,
                                    data: data,
                                    success: function (result){
                                        if(result.status == false){
                                            swal("Error!", result.message, "error");
                                        }else{
                                            swal("Thành công!", result.message + result.random + '%', "success");
                                        }
                                        $("#form_contact")[0].reset()
                                    }
                                })
                            }
                        });
                    });
                  </script>
            </div>
        </section>
@endsection