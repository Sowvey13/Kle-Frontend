<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş yap</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
</head>
<body style="display:flex; align-items:center; justify-content:center;">
<div class="login-page">
   

        
    </div>
    <div class="form ">
        <form class="login-form" method="POST" action="{{ route('login.post') }}">
            @csrf
            <h2>Giriş yap</h2>
            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert-fail">{{ $error }}</div>
            @endforeach
        @endif
        @if(session()->has("fail"))
            <div  class="alert-fail ">{{ session("fail") }}</div>
        @endif

        @if(session()->has("success"))
            <div class="alert-success ">{{ session("success") }}</div>
        @endif
            <input type="email" name="email" placeholder="Email Giriniz" />
            @error('name')
            @enderror
            <input type="password" name="password" placeholder="Şifre Giriniz" />
            <button type="submit" class="btn">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Giriş Yap
            </button>
            <p class="message">Kayıt olmadın mı? / <a href="{{ route('registration') }}">Kayıt Ol</a></p>
            
        </form>
    </div>
    
        
      
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/message.js') }}"></script>
</body>
</html>
