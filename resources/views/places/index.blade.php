@extends('layouts.app')

@section('title', 'Places')

@section('content')

  <main class="p-20 bg-black text-white">
    <h1 class="text-4xl font-bold">Places</h1>
    <p>Whatever you are looking for, you'll find what you want!</p>

{{--    <p>{{count($places)}} places.</p>--}}

    <div class="mt-10 grid grid-cols-2 gap-5">
      @foreach($places as $place)
        <a href="{{route('places.show', $place)}}">
          <article>
            <h2 class="text-xl font-bold">{{$place->name}}</h2>
            <p>{{$place->description}}</p>
          </article>
        </a>
      @endforeach
    </div>

    {{$places->links()}}

  </main>

@endsection
