<!doctype html>
<html lang="en">

<head>
    <title>Anasayfa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
</head>

<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: red;">
        <div class="container px-4">
            <a class="navbar-brand" href="/index">
                <span style="color:#ffffff; font-size:26px; font-weight:bold; letter-spacing: 1px;">KLE</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link text-light"
                            href="{{ route('products.create') }}"><strong>Ürün Ekle</strong></a></li>
                    <li class="nav-item"><a class="nav-link text-light"
                            href="{{ route('products.store') }}"><strong>Ürünler</strong></a></li>
                    @if (session('token'))
                        <li class="nav-item"><a class="nav-link text-light" href="{{ route('logout') }}"><strong>Çıkış
                                    yap</strong></a></li>
                    @else
                        <li class="nav-item"><a class="nav-link text-light" 
                            href="{{ route('logout') }}"   ><strong>Çıkış yap</strong></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <br><div class="container ">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <center><strong><p>{{ $message }}</p></strong></center>
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-fail">
        <center><strong><p>{{ $message }}</p></strong></center>
    </div>
@endif
</div><br>
    <center>
        <h1>MERHABA</h1>
        <h1>
            @if(session('token'))
            <h1 class="text-danger">{{ session('username') }}</h1>
        @endif
           <br><br>
        </h1>
        <h2>SAYFAMIZA HOŞGELDİN</h2>
        
    </center>
   
        
      
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/message.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
            integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>

</html>
