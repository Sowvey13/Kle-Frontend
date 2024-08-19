@extends('products.layout')


@section("contents")
<title>Ürünler</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="{{ asset('css/create/styles.css') }}">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+DK+Uloopet:wght@100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<style>
   td {
        word-wrap: break-word;
        word-break: break-all;
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
        <li class="nav-item"><a class="nav-link text-light" href="{{ route('products.product') }}"><strong>Ürünler</strong></a></li>
       
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
    <div class="m-3 d-flex justify-content-center">
        <h2>Ürünler</h2>
    </div>
   
       
    <br><br>
</div>
</div>

@if ($message = Session::get("success"))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif
<table class="table table-bordered border-white  ">
<tr>
    <th class=" bg-black text-white">ID</th>
    <th class=" bg-black text-white"><center>İsim</center></th>
    <th class="bg-black text-white"><center>Fiyat</center></th>
    <th class="bg-black text-white"><center>Detay</center></th>
    <th class="bg-black text-white"><center>İşlemler</center></th>
</tr>
@foreach ($product as $produc)
<tr>
<td class="bg-black text-white"  ><center>{{$produc->id}}</center></td>
<td class="bg-black  text-white" ><center>{{$produc->name}}</center></td>
<td class="bg-black  text-white" ><center>{{$produc->price}}$</center></td>
<td class="bg-black  text-white" ><center>{{$produc->detail}}</center></td>
<td class="bg-black">
       <form action="{{route("products.destroy",$produc->id)}}" method="POST">
        <a style="white-space: nowrap" class="btn m-2 btn-sm btn-info " href="{{route("products.show",$produc->id)}}">Görüntüle</a>
        <a class="btn m-2 btn-sm btn-primary" href="{{route("products.edit",$produc->id)}}">Düzenle</a>
        @csrf
        @method("DELETE")
        <button type="submit" class="btn m-2 px-4 btn-sm btn-danger">Sil</button>
    </form>
</td>
</tr>
@endforeach
</table>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
@endsection