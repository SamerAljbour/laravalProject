<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light grey background for the page */
            overflow-x: hidden; /* Prevent horizontal scroll */
        }
        .container {
            margin-top: 50px;
        }
        .card {
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Soft shadow for cards */
        }
        .card-header {
            background-color: rgb(0, 200, 158); /* Custom color for the header */
            color: #fff; /* White text color for the header */
            font-weight: bold; /* Make the text bold */
        }
        h2 {
            color: rgb(0, 200, 158); /* Custom color for the heading */
            font-weight: bold; /* Bold heading */
            margin-bottom: 30px; /* Extra spacing below the heading */
        }
        ul {
            list-style-type: none; /* Remove default list styling */
            padding: 0;
        }
        ul li {
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef; /* Light grey divider between items */
        }
        ul li:last-child {
            border-bottom: none; /* Remove the divider from the last item */
        }
        .card-body p {
            margin-bottom: 0.5rem; /* Adjust spacing between paragraphs */
        }
        .btn-custom {
            background-color: rgb(0, 200, 158);
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin-right: 10px;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #009e8b;
        }
        .profile-image-container img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            object-fit: cover;
        }
        /* Sidebar styles */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            color: #fff;
            padding-top: 20px;
            transition: transform 0.3s ease;
        }
        .sidebar a {
            color: #fff;
            padding: 15px 20px;
            display: block;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .sidebar a:hover {
            background-color: rgb(0, 200, 158);
        }
        .sidebar .active {
            background-color: rgb(0, 200, 158);
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        .profile-image-only {
            display: block;
        }
        .hide-image {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">Dashboard</h4>
        <a href="#" class="nav-link" data-target="profile-info">Profile Information</a>
        <a href="#" class="nav-link" data-target="bookings">Your Bookings</a>
        <a href="#" class="nav-link" data-target="reviews">Your Reviews</a>
        <a href="#" class="nav-link" data-target="edit-profile">Edit Profile</a>
    </div>

    <div class="main-content">
        <div class="container">
            <h2 class="text-center">User Dashboard</h2>

            <!-- User Profile Picture -->
            <div class="card tab-content profile-info active">
                <div class="card-header">
                    Profile Picture
                </div>
                <div class="card-body text-center">
                    <div class="profile-image-container profile-image-only">
                        @if(auth()->user()->profile_picture)
                            <img src="{{ Storage::url(auth()->user()->profile_picture) }}" alt="Profile Picture">
                        @else
                            <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile Picture">
                        @endif
                    </div>
                </div>
            </div>

            <!-- User Information -->
            <div class="card tab-content profile-info active">
                <div class="card-header">
                    Profile Information
                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $user->id }}</p>
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Profile Created At:</strong> {{ $user->created_at }}</p>
                </div>
            </div>

            <!-- Bookings Section -->
            <div class="card tab-content bookings">
                <div class="card-header">
                    Your Bookings
                </div>
                <div class="card-body">
                    @if($bookings->isEmpty())
                        <p>You have no bookings.</p>
                    @else
                        <ul>
                            @foreach($bookings as $booking)
                                <li>Booking ID: {{ $booking->id }} - Created At: {{ $booking->created_at }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <!-- Reviews Section -->
            <div class="card tab-content reviews">
                <div class="card-header">
                    Your Reviews
                </div>
                <div class="card-body">
                    @if($reviews->isEmpty())
                        <p>You have not written any reviews.</p>
                    @else
                        <ul>
                            @foreach($reviews as $review)
                                <li>Review ID: {{ $review->id }} - Created At: {{ $review->created_at }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <!-- Edit Profile Section -->
            <div class="card tab-content edit-profile">
                <div class="card-header">
                    Edit Profile
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Profile Picture -->
                        <div class="form-group">
                            <label for="profile_picture">Profile Picture</label>
                            <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                            @if(auth()->user()->profile_picture)
                                <img src="{{ Storage::url(auth()->user()->profile_picture) }}" alt="Profile Picture" class="img-thumbnail mt-2" width="120">
                                <!-- Commented out delete button -->
                                <!-- <button type="button" class="btn btn-danger mt-2" id="delete-profile-picture">Delete Profile Picture</button> -->
                            @else
                                <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile Picture" class="img-thumbnail mt-2" width="120">
                            @endif
                        </div>

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <small class="form-text text-muted">Leave blank if you do not want to change the password.</small>
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-custom">Save Changes</button>
                    </form>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="text-center mt-4">
                <a href="{{ url('/home') }}" class="btn btn-custom">Back to Home</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.nav-link').on('click', function(event) {
                event.preventDefault();
                var target = $(this).data('target');
                
                // Hide all tab contents
                $('.tab-content').removeClass('active');
                
                // Show the selected tab content
                $('.' + target).addClass('active');
                
                // Highlight the active link
                $('.nav-link').removeClass('active');
                $(this).addClass('active');
            });

        });
    </script>
</body>
</html>
