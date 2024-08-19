<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt ol</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        
    </style>
</head>
<body style="display:flex; align-items:center; justify-content:center; height:100vh;">

    
<div class="login-page">
    
    
    <div class="form" style="width: 100%; max-width: 500px;">
        <form class="registration-form" method="POST" action="{{ route('registrationPost') }}">
            @csrf
            <h1>HOŞ GELDİNİZ</h1><br>
            <h2>Kayıt Ol</h2>
            @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert-fail">{{ $error }}</div>
                    @endforeach
                @endif
        
                @if(session()->has("fail"))
                    <div class="alert-fail">{{ session("error") }}</div>
                @endif
        
                @if(session()->has("success"))
                    <div class="alert-success">{{ session("success") }}</div>
                @endif
            <input type="text" name="name" placeholder="İsim Soyisim " oninput="this.value = this.value.toUpperCase();" />
            <input type="email" name="email" placeholder="Email " />
            <input type="password" name="password" placeholder="Şifre " />
            <input type="password" name="password_confirmation" placeholder="Şifre tekrarı " />
            <button type="submit" class="btn">
                Oluştur
            </button>
            <p class="message">Hesabın var mı? / <a href="{{ route('login') }}">Giriş yap</a></p>
           
                
           
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/message.js') }}"></script>
</body>
</html>