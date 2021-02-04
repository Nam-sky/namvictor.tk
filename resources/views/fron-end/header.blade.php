<nav class="navbar navbar-expand-md container navbar-dark">
        <a class="navbar-brand logo" href="{{route('home')}}"><img class=" d-block mx-auto" src="public/source/image/logo.png" alt=""></a>
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('home.library')}}">Thư viện ảnh</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('home.tintuccongnghe')}}">Tin công nghệ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('home.chuyennghenghiep')}}">Chuyện nghề nghiệp</a>
            </li>   
            <li class="nav-item">
                <a class="nav-link" href="{{route('home.chuyendoi')}}">Chuyện đời</a>
            </li>  
            <li class="nav-item">
                <a class="nav-link" href="{{route('home.chuyenlinhtinh')}}">Chuyện linh tinh</a>
            </li>
            </ul>
        </div>  
    </nav>