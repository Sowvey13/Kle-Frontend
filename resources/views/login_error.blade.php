<!doctype html>
<html lang="en">
<head>
  <title>Giriş Hatası</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body class="bg-dark">
  <div class="container">
    <center><h1 class="mt-5 text-light">Giriş Hatası</h1></center>
    <center><p class="lead text-light">Giriş yapmadan bu sayfaya erişemezsiniz. Lütfen giriş yapın veya kayıt olun.</p></center>
    <div class="row display:flex; align-items-center; justify-content-center; "><center>
      <a class="btn btn-primary col-2 ms-3 me-3" href="{{ route('login') }}">Giriş Yap</a>
      <a class="btn btn-success ms-3 me-3 col-2" href="{{ route('registration') }}">Kayıt Ol</a>
    </center>
    </div>
    
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>
</html>
