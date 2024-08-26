<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Details</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <style>
        /* General body styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f0f0;
        }

        /* Styles for the container */
        .container {
            max-width: 800px; /* Increased width for larger form */
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px; /* Increased padding for larger form */
            margin: 20px;
            width: 100%;
            box-sizing: border-box;
        }

        /* Styles for the profile image section */
        .profile-image-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-image-container img {
            border-radius: 50%;
            width: 150px; /* Increased size for profile image */
            height: 150px; /* Increased size for profile image */
            object-fit: cover;
            margin-bottom: 10px;
        }

        /* Styles for profile info */
        .profile-info {
            margin-bottom: 30px; /* Increased margin */
        }

        .profile-info p {
            margin: 10px 0; /* Increased margin for better spacing */
        }

        /* Styles for buttons */
        .btn {
            display: inline-block;
            padding: 12px 24px; /* Larger padding for buttons */
            border-radius: 4px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            font-size: 1rem; /* Larger font size for better readability */
            transition: background-color 0.3s ease;
            margin: 5px;
        }

        .btn-primary {
            background-color: #00C89E; /* Button color */
        }

        .btn-primary:hover {
            background-color: #009e8b; /* Darker shade for hover effect */
        }

        .btn-secondary {
            background-color: #f8f9fa; /* Light background for the back button */
            color: #333;
            border: 1px solid #ddd;
        }

        .btn-secondary:hover {
            background-color: #e2e6ea; /* Darker shade for hover effect */
        }

        /* Center content horizontally and vertically */
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- PROFILE DETAILS SECTION -->
        <h2 class="text-center mb-4">Profile Details</h2>

        <div class="profile-image-container">
            @if(auth()->user()->profile_picture)
                <img src="{{ Storage::url(auth()->user()->profile_picture) }}" alt="Profile Picture">
            @else
                <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile Picture">
            @endif
        </div>

        <div class="profile-info">
            <p><strong>ID:</strong> {{ auth()->user()->id }}</p>
            <p><strong>Created At:</strong> {{ auth()->user()->created_at->format('Y-m-d H:i:s') }}</p>
            <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
            <p><strong>Role:</strong> {{ auth()->user()->role }}</p>
            @if(auth()->user()->address)
                <p><strong>Address:</strong> {{ auth()->user()->address }}</p>
            @endif
            @if(auth()->user()->phone)
                <p><strong>Phone:</strong> {{ auth()->user()->phone }}</p>
            @endif
        </div>

        <div class="text-center">
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
            <a href="{{ route('home') }}" class="btn btn-secondary">Home</a>
        </div>
    </div>
</body>
</html>
