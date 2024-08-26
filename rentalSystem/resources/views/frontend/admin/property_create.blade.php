@extends('layouts.dash')
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
            <h4 class="card-title">Properties Table</h4>
            <p class="card-description">
                Add class <code>.table</code> for styling.
            </p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Address</th>
                            <th>Location</th>
                            <th>Price per Day</th>
                            <th>Availability</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($properties as $prop)
                            <tr>
                                <td>{{ $prop->title }}</td>
                                <td>{{ $prop->address }}</td>
                                <td>{{ $prop->location }}</td>
                                <td>${{ $prop->price_per_day }}</td>

                                <td>
                                    @php
                                        $today = \Carbon\Carbon::today();
                                        $isBooked = $prop->bookings()->where('status', 'accepted')
                                                                     ->where('start_date', '<=', $today)
                                                                     ->where('end_date', '>=', $today)
                                                                     ->exists();
                                    @endphp

                                    @if($isBooked)
                                        <label class="badge badge-danger">Not Available</label>
                                    @else
                                        <label class="badge badge-success">Available</label>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
  </div>
@endsection
