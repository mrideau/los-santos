<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use App\Models\Place;
use http\Env\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PlacesController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth')->except('index', 'show');
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
//    $places = Place::query()->paginate();
    $places = Place::all();
    $selectedPlace= null;

    $place = request('place');

    if ($place != null) {
      $selectedPlace = collect($places)->where('slug', $place)->first();
    }

    return view('map', compact('places', 'selectedPlace'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return $this->edit();
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StorePlaceRequest $request)
  {
    $place = new Place();

    $place->fill($request->all());

    $place->slug = Str::slug($place->name);

    $image = $request->file('image');
    $fileName = time() . '.' . $image->getClientOriginalExtension();

    $path = $request->image->storeAs('places', $fileName, 'public');

    $place->image_path = $path;

    $place->save();

    return redirect()->route('places.show', $place);
  }

  /**
   * Display the specified resource.
   */
  public function show(Place $place)
  {
    return view('places.show', compact('place'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Place $place = null)
  {
    return view('places.create-edit', compact('place'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdatePlaceRequest $request, Place $place)
  {
    $place->fill($request->all());

    $place->slug = Str::slug($place->name);

    if (isset($place->image)) {
      if (Storage::exists($place->image_path)) {
        Storage::delete($place->image_path);
      }

      $image = $request->file('image');
      $fileName = time() . '.' . $image->getClientOriginalExtension();

      $path = $request->image->storeAs('places', $fileName, 'public');

      $place->image_path = $path;
    }

    $place->save();

    return redirect()->route('places.show', $place);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Models\Place $place
   * @return \Illuminate\Http\Response
   */
  public function destroy(Place $place)
  {
    if (Storage::exists($place->image_path)) {
      Storage::delete($place->image_path);
    }

    $place->deleteOrFail();

    return redirect()->route('admin.dashboard');
  }
}
