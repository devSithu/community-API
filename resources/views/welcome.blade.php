<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=2">

  {{-- <title>Laravel</title> --}}

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body>
  <div class="img">
    <img class="icon" src="../images/logo.png">
  </div>
  <div class="label">
    <label>Community အပလီကေးရှင်းကိုရယူမည်။</label>
  </div>
  <div class="btn">
    <a href="https://play.google.com/store/apps/details?id=com.cgmgl.community">
      <button class="btn-download">
        <p class="down">Download</p>
      </button>
    </a>
  </div>
</body>

</html>