

@extends("products.layout")


@section("contents")
<title>Ürün detayı</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="{{ asset('css/create/styles.css') }}">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+DK+Uloopet:wght@100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: red;">
    <div class="container px-4">
      <a class="navbar-brand" href="/index">
        <span style="color:#ffffff; font-size:26px; font-weight:bold; letter-spacing: 1px;">KLE</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
          class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link text-light" href="{{ route('index') }}"><strong>Anasayfa</strong></a></li>

          <li class="nav-item"><a class="nav-link text-light" href="{{ route('products.create') }}"><strong>Ürün Ekle</strong></a></li>
          <li class="nav-item"><a class="nav-link text-light" href="{{ route('products.store') }}"><strong>Ürünler</strong></a></li>
          
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
  <br>

    <div class="row">
        <div class="col-lg-12 ">
            <div ><br><br><br>
                <center><h2>Ürün İncelemesi</h2></center>
            </div><br><br><br>
            
            <center><div class="card text-bg-dark mb-3" style="max-width: 30rem;" >
                <div class="card-header"><strong>İsim:</strong>
                    {{$products['name']}}</div>
                <div class="card-body">
                  <h5 class="card-title"><strong>Fiyat:</strong>
                    {{$products['price']}}</h5><br>
                  <p class="card-text">
                    <strong>Detaylar:</strong>
                {{$products['detail']}}
                  </p>
                </div>
              </div>
            </center>
                
           
        </div>
    </div>
   
</div><br><br>
<center><a class="btn btn-danger" href="{{route("products.store")}}">Geri dön</a></center>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
@endsection