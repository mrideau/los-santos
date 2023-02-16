@extends('layouts.app')

@section('content')
  <div class="flex flex-col justify-center items-center h-full">
    <img src="{{asset('images/dog.jpg')}}" alt="Dog barking" class="w-3/4 lg:w-2/4 rounded">
    <h1 class="text-3xl font-bold mt-5">Trespassing!</h1>
    <p>You are not allowed to go here. Go away!</p>
  </div>
@endsection
