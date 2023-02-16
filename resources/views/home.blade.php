@extends('layouts.app')

@section('content')

  <section class="relative h-screen">
    <div class="absolute w-full h-full bg-no-repeat bg-cover bg-center bg-fixed"
         style="background-image: url('{{asset('images/bg-01.jpg')}}')"></div>
    <div
      class="absolute h-full xl:w-3/4 px-10 md:px-40 py-20 text-white bg-gradient-to-r from-black to-transparent break-words">
      <h1 class="text-7xl">
        Welcome to <span class="font-bold block text-6xl md:text-8xl uppercase">Los Santos!</span>
      </h1>
      <p class="text-2xl mt-5"><span class="font-bold">Los Santos</span> is the destination you have always been
        dreaming about. What are you waiting for?</p>
      <a href="{{route('places.index')}}" class="block mt-10 text-gray-200 hover:underline">Discover</a>
    </div>
  </section>

  {{--  <section class="bg-black opacity-90 text-white p-10">--}}
  {{--    <div class="text-center">--}}
  {{--      <h2 class="text-2xl tracking-wider font-bold uppercase">The dream meets your reality</h2>--}}
  {{--      <p>Lorem ipsum dolor sit amet.</p>--}}
  {{--    </div>--}}
  {{--    <div class="mt-10 flex gap-5">--}}
  {{--      <article class="flex-1">--}}
  {{--        <h3 class="text-2xl font-bold mb-5">Events</h3>--}}
  {{--        <div class="relative rounded-lg overflow-hidden h-80">--}}
  {{--          <img src="{{asset('images/president.jpg')}}" alt="" class="w-full h-full object-cover">--}}
  {{--          <div class="absolute bottom-0 w-full bg-gradient-to-t from-black to-transparent p-5">--}}
  {{--            <h4 class="text-lg font-bold">Diamond Casino</h4>--}}
  {{--            <p class="text-sm opacity-60">Description</p>--}}
  {{--          </div>--}}
  {{--        </div>--}}
  {{--      </article>--}}
  {{--      <article class="flex-1">--}}
  {{--        <h3 class="text-2xl font-bold mb-5">Places</h3>--}}
  {{--        <div class="relative rounded-lg overflow-hidden h-80">--}}
  {{--          <img src="{{asset('images/city.jpg')}}" alt="" class="w-full h-full object-cover">--}}
  {{--          <div class="absolute bottom-0 w-full bg-gradient-to-t from-black to-transparent p-5">--}}
  {{--            <h4 class="text-lg font-bold">Diamond Casino</h4>--}}
  {{--            <p class="text-sm opacity-60">Description</p>--}}
  {{--          </div>--}}
  {{--        </div>--}}
  {{--      </article>--}}
  {{--      <article class="flex-1">--}}
  {{--        <h3 class="text-2xl font-bold mb-5">Activities</h3>--}}
  {{--        <div class="relative rounded-lg overflow-hidden h-80">--}}
  {{--          <img src="{{asset('images/golf.jpg')}}" alt="" class="w-full h-full object-cover">--}}
  {{--          <div class="absolute bottom-0 w-full bg-gradient-to-t from-black to-transparent p-5">--}}
  {{--            <h4 class="text-lg font-bold">Diamond Casino</h4>--}}
  {{--            <p class="text-sm opacity-60">Description</p>--}}
  {{--          </div>--}}
  {{--        </div>--}}
  {{--      </article>--}}
  {{--    </div>--}}
  {{--  </section>--}}

  <section class="relative h-screen bg-cover bg-center" style="background-image: url('{{asset('images/map.png')}}')">
    <div class="absolute top-0 left-0 bottom-0 right-0 bg-black opacity-30 backdrop-blur"></div>
    <a
      class="absolute w-full h-full text-white flex flex-col items-center justify-center"
      href="{{route('places.index')}}"
    >
      <span class="font-bold text-3xl uppercase">Open the map</span>
    </a>
  </section>



  {{--<div class="flex gap-5 snap-x snap-mandatory overflow-x-auto">--}}
  {{--  <div class="snap-start flex-shrink-0">--}}
  {{--    <img src="https://images.unsplash.com/photo-1604999565976-8913ad2ddb7c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&h=160&q=80" />--}}
  {{--  </div>--}}
  {{--  <div class="snap-start flex-shrink-0">--}}
  {{--    <img src="https://images.unsplash.com/photo-1540206351-d6465b3ac5c1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&h=160&q=80" />--}}
  {{--  </div>--}}
  {{--  <div class="snap-start flex-shrink-0">--}}
  {{--    <img src="https://images.unsplash.com/photo-1622890806166-111d7f6c7c97?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&h=160&q=80" />--}}
  {{--  </div>--}}
  {{--  <div class="snap-start flex-shrink-0">--}}
  {{--    <img src="https://images.unsplash.com/photo-1590523277543-a94d2e4eb00b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&h=160&q=80" />--}}
  {{--  </div>--}}
  {{--  <div class="snap-start flex-shrink-0">--}}
  {{--    <img src="https://images.unsplash.com/photo-1575424909138-46b05e5919ec?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&h=160&q=80" />--}}
  {{--  </div>--}}
  {{--  <div class="snap-start flex-shrink-0">--}}
  {{--    <img src="https://images.unsplash.com/photo-1559333086-b0a56225a93c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&h=160&q=80" />--}}
  {{--  </div>--}}
  {{--</div>--}}

@endsection
