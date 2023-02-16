@extends('layouts.app')

@section('title', 'Edit Place')

@section('content')

  <div class="p-10 lg:p-20">
    <h1 class="text-2xl font-bold">New Place</h1>

    @if(isset($place))
      <form
        id="delete"
        method="POST"
        action="{{ route('places.destroy', $place) }}"
        enctype="multipart/form-data"
      >
        @method('DELETE')
        @csrf
      </form>
    @endif

    <form
      class="flex flex-col lg:flex-row gap-4 mt-5"
      method="POST"
      action="{{isset($place) ? route('places.update', $place) : route('places.store')}}"
      enctype="multipart/form-data"
    >
      @csrf

      @if(isset($place))
        @method('PUT')
      @endif

      <div class="lg:flex-auto lg:order-2">
        <div class="w-full h-64 lg:h-full">
          <x-map class="rounded"></x-map>
        </div>
      </div>

      <div class="flex flex-col gap-2 flex-1">
        <x-forms.field
          label="Image"

        >
          <input
            type="file"
            name="image"
            accept="image/*"
            value="{{$place->name ?? old('image')}}"
          />
        </x-forms.field>

        <x-forms.input
          label="Name"
          type="text"
          name="name"
          value="{{$place->name ?? old('name')}}"
        ></x-forms.input>

        <x-forms.field
          label="Description"
        >
          <textarea
            class="editor"
            name="description"
          >{{$place->description ?? old('description')}}</textarea>
        </x-forms.field>

        <div class="flex gap-2">
          <input
            type="text"
            id="latitude"
            name="latitude"
            value="{{$place->latitude ?? old('latitude')}}"

          />

          <input
            type="text"
            id="longitude"
            name="longitude"
            value="{{$place->longitude ?? old('longitude')}}"

          />
        </div>

        <label>
          <input type="file" class="hidden">
        </label>

        <div class="">
          @if(isset($place))
            <x-inputs.button type="submit" form="delete" class="btn-danger">Delete</x-inputs.button>
          @endif

          <x-inputs.button type="submit" class="btn-success">Save</x-inputs.button>
        </div>
      </div>

    </form>

    @if($errors->any())
      {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif

  </div>
  {{--  @if(session()->has('success'))--}}
  {{--    {{ session()->get('success') }}--}}
  {{--  @endif--}}

@endsection

@push('scripts')
  <script>
    const latElement = document.querySelector('#latitude'),
      lngElement = document.querySelector('#longitude');

    let place;

    @if(isset($place))
      place = {{\Illuminate\Support\Js::from($place)}};
    @endif

    let marker;

    function createMarker(latitude, longitude) {
      marker = L.marker([latitude, longitude], {
        draggable: true
      });
      marker.on('drag', (e) => {
        updateLatLng(e.latlng)
      });
      marker.addTo(map);
    }

    if (place != null) {
      createMarker(place.latitude, place.longitude);
      map.setView([place.latitude, place.longitude], 4);
    }

    map.on('click', (e) => {
      if (marker == null) {
        createMarker(e.latlng.lat, e.latlng.lng)
      }

      updateLatLng(e.latlng);
      updateMarkerPos(e.latlng);
    });

    function updateMarkerPos(latlng) {
      marker.setLatLng([latlng.lat, latlng.lng]);
    }

    function updateLatLng(latlng) {
      latElement.value = latlng.lat;
      lngElement.value = latlng.lng;
    }
  </script>

{{--  Tiny MCE Editor --}}
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <script type="text/javascript">

    tinymce.init({
      selector: 'textarea.editor',
      height: 300,
      menubar: false,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount', 'image'
      ],

      tolbar: 'undo redo | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
      content_css: '//www.tiny.cloud/css/codepen.min.css'
    });
  </script>
@endpush
