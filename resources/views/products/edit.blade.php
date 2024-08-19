@extends("products.layout")

@section("contents")
<title>Ürün düzenleme</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="{{ asset('css/create/styles.css') }}">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+DK+Uloopet:wght@100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<style>
  .form-control::placeholder {
        color: white; 
        opacity: 1; 
    }
</style>

  
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

<div class="row mb-3">
    <div class="col-lg-12 ">
        <center><h2>Ürünü Düzenle</h2></center>   
    </div>
    
</div>



<form action="{{ route('products.update', $products['id']) }}" method="post">
    @csrf
    @method("PUT")
    <div class="container">
    <div class="row">
        @if ($errors->any())
    <div class="alert alert-danger alert-fail">
        <strong>Ürün düzenlemede eksikler var.</strong>
        <br><br>
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="col-xs-12 col-sm-12 col-md-6 mb-3">
            <div class="form-group">
                <strong>İsim:</strong>
                <input type="text" name="name" value="{{ $products["name"] }}" class="form-control bg-danger" placeholder="İsim">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 mb-3">
            <div class="form-group">
                <strong>Fiyat:</strong>
                <input type="number" name="price" value="{{ $products["price"] }}" class="form-control bg-danger" placeholder="Fiyat">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Detay:</strong>
                <textarea name="detail" class="form-control bg-danger" style="height:150px" placeholder="Detay">{{ $products["detail"] }}</textarea>
            </div>
        </div><br><br>
        <div class="col-xs-12 col-sm-12 col-md-12 ">
           <center> <button type="submit" class="btn btn-danger">Gönder</button></center>
        </div>
    </div>
    
</form>
<br>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/message.js') }}"></script>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
@endsection
