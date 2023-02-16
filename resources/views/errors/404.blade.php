@extends('layouts.app')

@section('content')
  <div class="flex flex-col justify-center items-center h-full my-4">
    <img src="{{asset('images/dog.jpg')}}" alt="Dog barking" class="w-3/4 lg:w-2/4 rounded">
    <h1 class="text-3xl font-bold mt-5">Ooops!</h1>
    <p>It seems you are lost! <a href="{{route('home')}}" class="underline">Come Back</a></p>
  </div>
@endsection
