<header class="px-16 py-7 bg-white flex justify-between">
  <a href="{{route('home')}}" class="mr-10 font-bold text-2xl">
{{--    <img src="{{asset('images/logo.webp')}}" alt="Los Santos logo" class="h-20">--}}
    Los Santos
  </a>
  <ul class="flex">
    <li class="">
      <a href="{{route('home')}}" class="p-5 {{ Route::currentRouteNamed('home') ? 'font-bold' : '' }}">Home</a>
    </li>
    <li>
      <a href="{{route('places.index')}}" class="p-5 {{ Route::currentRouteNamed('places.index') ? 'font-bold' : '' }}">Places</a>
    </li>
    <li>
      <a href="{{route('contact')}}" class="p-5 {{ Route::currentRouteNamed('contact') ? 'font-bold' : '' }}">Contact</a>
    </li>
    <li>
      @auth()
        <a href="{{route('logout')}}" class="bg-slate-200 p-2 rounded">Logout</a>
      @endif
    </li>
  </ul>
</header>
