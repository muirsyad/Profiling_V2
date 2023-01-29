<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css','resources/js/app.js'])
  
</head>
<body class="h-screen m-0 bg-gradient-to-b from-green-500 to-green-900">
    <div class="md:container ">
      
        @yield('content')
    </div>
</body>
</html>