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
            <h4 class="card-title">Edit User</h4>
            <p class="card-description">
                Update the details for {{ $user->name }}
            </p>
            <form class="forms-sample" action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail3">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail3" name="email" placeholder="Email" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword4">Password (Leave blank to keep current password)</label>
                    <input type="password" class="form-control" id="exampleInputPassword4" name="password" placeholder="Password">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword4">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword4" name="password_confirmation" placeholder="Confirm Password">
                </div>

                <div class="form-group">
                    <label for="exampleSelectRole">Role</label>
                    <select class="form-control" id="exampleSelectRole" name="role" required>
                        <option value="lessor" {{ $user->role == 'lessor' ? 'selected' : '' }}>Lessor</option>
                        <option value="renter" {{ $user->role == 'renter' ? 'selected' : '' }}>Renter</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Profile Picture</label>
                    @if($user->profile_picture)
                        <div>
                            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" style="width: 100px; height: 100px;">
                        </div>
                    @endif
                    <input type="file" name="profile_picture" class="file-upload-default">
                    <div class="input-group col-xs-12">
                        <input type="file" class="form-control file-upload-info" name="profile_picture"  placeholder="Upload Image">
                        {{-- <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span> --}}
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Update</button>
                <a href="{{ route('users.index') }}" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
</div>
    </div>
@endsection
