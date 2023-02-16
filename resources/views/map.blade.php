@extends('layouts.app')

@section('title', 'Places')

@section('content')

  <div class="relative h-screen">
    <x-map class="h-full"></x-map>

    {{ app('request')->input('place') }}

    {{--    @if($selectedPlace != null)--}}

    <div
      id="places_container"
      class="
        absolute left-0 bottom-0 w-full
        overflow-x-scroll
        flex gap-5
        snap-x snap-mandatory
        px-5
      "
    >

    </div>

    {{--    @endif--}}
  </div>

@endsection

@push('scripts')

  <script>
    const placesContainer = document.querySelector('#places_container');

    const places = {{\Illuminate\Support\Js::from($places)}};

    places.forEach((place) => {
      const {latitude, longitude} = place;
      const marker = L.marker([latitude, longitude]);

      marker.addTo(map)

      let url = '{{ route("places.show", ":id") }}';
      url = url.replace(':id', place.slug);

      const content = `
        <a href="${url}" class="place" id="place_${place.slug}">
          <article class="relative rounded-lg overflow-hidden h-40">
            <img src="{{asset('storage/')}}/${place.image_path}" alt="" class="w-full h-full object-cover">
            <div class="absolute bottom-0 w-full bg-gradient-to-t from-black to-transparent p-5 text-white">
              <h4 class="text-lg font-bold">${place.name}</h4>
              {{--            <p class="text-sm opacity-60">Description</p>--}}
      </div>
    </article>
  </a>
`;
      placesContainer.insertAdjacentHTML('beforeend', content);
    });

  </script>

@endpush
