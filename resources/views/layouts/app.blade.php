<!doctype html>
<html class="h-full">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    @hasSection('title')
      @yield('title')
       -
    @endif
    Los Santos
  </title>

  @vite(['resources/sass/app.scss'])

  @stack('styles')
</head>
<body class="relative h-full flex flex-col">

@include('layouts.header')

<div class="flex-1">
  <main class="relative ">
    @yield('content')
  </main>

  @include('layouts.footer')
</div>

@stack('scripts')

</body>
</html>
