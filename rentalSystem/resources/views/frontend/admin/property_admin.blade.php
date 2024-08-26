


@extends('layouts.dashB')



@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">
                            @if(Auth::check())
                                Welcome, {{ Auth::user()->name }}!
                            @else
                                Welcome, Guest!
                            @endif
                        </h3>
                    </div>
                </div>
            </div>
        </div>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add New Property</h4>
        <p class="card-description">
          all field is required
        </p>
        <form class="forms-sample" action="{{ isset($property) ? route('properties.update', $property->id) : route('properties.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($property))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ old('title', $property->title ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="4" required>{{ old('description', $property->description ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{ old('address', $property->address ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" name="location" id="location" placeholder="Location" value="{{ old('location', $property->location ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="price_per_day">Price per Day</label>
                <input type="number" step="0.01" class="form-control" name="price_per_day" id="price_per_day" placeholder="Price per Day" value="{{ old('price_per_day', $property->price_per_day ?? '') }}" required>
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="availability" id="availability" value="1" {{ old('availability', $property->availability ?? true) ? 'checked' : '' }}>
                <label class="form-check-label" for="availability">Available</label>
            </div>

            <div class="form-group">
                <label for="photos">Upload Photos</label>
                <input type="file" name="photos[]" class="file-upload-default" multiple>
                {{-- <div class="input-group col-xs-12"> --}}
                    <input type="file" class="form-control file-upload-info" name="photo_url" placeholder="Upload Image">
                    {{-- <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span> --}}
                {{-- </div> --}}
            </div>

            <button type="submit" class="btn btn-primary mr-2">{{ isset($property) ? 'Update Property' : 'Create Property' }}</button>
            <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
@endsection
