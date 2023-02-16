@extends('layouts.app')

@section('content')

  <div class="flex items-center justify-center">
    <form method="POST" action="" enctype="multipart/form-data" class="p-10 rounded">
      @csrf

      <x-forms.input label="Email" name="email" type="email" required></x-forms.input>

      @error('email')
      <p>{{ __($message) }}</p>
      @enderror

      <x-forms.input label="Password" type="password" name="password"></x-forms.input>

      @error('password')
      <p>{{ __($message) }}</p>
      @enderror

      <x-inputs.button type="submit" class="right">Login</x-inputs.button>
    </form>
  </div>

@endsection
