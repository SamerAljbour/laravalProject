@extends('layouts.dash')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">@if(Auth::check())
                    Welcome, {{ Auth::user()->name }}!
                @else
                    Welcome, Guest!
                @endif</h3>
            </div>
          </div>
        </div>
      </div>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Your Profile</h4>
            <p class="card-description">
                Update your profile information
            </p>
            <form class="forms-sample" action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank if you don't want to change">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm New Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your new password">
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="lessor" {{ $user->role == 'lessor' ? 'selected' : '' }}>Lessor</option>
                        <option value="renter" {{ $user->role == 'renter' ? 'selected' : '' }}>Renter</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="profile_picture">Profile Picture</label>
                    @if($user->profile_picture)
                        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" width="100">
                    @endif
                    <input type="file" name="profile_picture" class="file-upload-default">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Update Profile</button>
                <a href="{{ route('dashboard') }}" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
