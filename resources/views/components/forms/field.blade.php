<div {{$attributes}}>
  <label>
    <span class="block font-bold mb-1">{{$label}}</span>
    <div class="field-container">
{{--      <input {{ $attributes->merge(['class' => 'w-full border rounded-md p-1']) }}/>--}}
      {{$slot}}
    </div>
  </label>
</div>
