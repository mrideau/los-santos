@extends('layouts.app')

@section('content')

  <main class="flex flex-col md:flex-row gap-5 p-10 h-full">
    <section class="flex-1 h-96">
      <img
        class="w-full h-full object-cover rounded"
        src="{{asset('images/map.png')}}"
        alt="Los Santos Map"
      >
    </section>
    <section class="flex-1">
{{--      <p class="">You are looking to join us?</p>--}}
      <h1 class="font-bold text-3xl">Let's have a contact!</h1>
      <p class="mt-2">Regarding the number of requests we receive every day, we are only able to respond within 7 to 15 days.</p>

      <form
        class="mt-10"
        method="POST"
        action="{{route('contact')}}"
        enctype="multipart/form-data"
      >
        @csrf

        <x-forms.input label="Name" type="text" name="name" required></x-forms.input>
        <x-forms.input label="Email" type="email" name="email" required></x-forms.input>
        <x-forms.input label="Phone (optionnal)" type="tel" name="phone"></x-forms.input>

        <x-inputs.button type="submit" class="mt-5">Submit</x-inputs.button>
      </form>
    </section>
  </main>

@endsection
