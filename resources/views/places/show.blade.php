@extends('layouts.app')

@section('title', $place->name)

@section('content')
  <div class="h-96 bg-bottom bg-cover" style="background-image: url('{{asset('storage/' . $place->image_path)}}')">

  </div>

  <div class="p-10 md:p-20">
    <h1 class="text-4xl font-bold">{{$place->name}}</h1>

    <div class="mt-5">
      @if(isset($place))
        {!! $place->description !!}
      @else
        <p>No description.</p>
      @endif
    </div>

  </div>

@endsection
