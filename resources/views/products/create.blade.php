@extends('products.layout')

@section('title', 'Ürün Oluştur')

@section('contents')
  <title>Ürün Oluşturma</title>
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
  <div class="container">
    <div class="row mb-4">
      <div class="col-12 d-flex justify-content-between align-items-center">
        <h2><strong> Bir Ürün Ekleyin</strong></h2>
        
      </div>
    </div>
    <div class="row">
      @if ($errors->any())
  <div class=" alert alert-danger alert-fail col-12">
    <strong>Ürün oluşturmada eksiklikler var.</strong><br><br>
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
      <div class="col-lg-12">
        <form action="{{ route('create') }}" method="POST">
          @csrf
          <div class="form-group">
            <strong>İsim:</strong>
            <input type="text" name="name" class="form-control bg-danger " placeholder="İsim">
          </div>
          <div class="form-group">
            <strong>Fiyat:</strong>
            <input type="number" name="price" class="form-control bg-danger" placeholder="Fiyat">
            
          </div>
          <div class="form-group">
            <strong>Detay:</strong>
            <textarea class="form-control bg-danger" style="height:150px;" name="detail" placeholder="Detay"></textarea>
          </div><br><br>
        <center><button type="submit"  class="btn btn-danger">Oluştur</button></center>
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/message.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
@endsection
