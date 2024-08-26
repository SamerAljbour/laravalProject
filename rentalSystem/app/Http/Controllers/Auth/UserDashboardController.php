<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $bookings = $user->bookings;  // Fetch bookings made by the user
        $reviews = $user->reviews;    // Fetch reviews made by the user

        return view('auth.user_dashboard', compact('user', 'bookings', 'reviews'));
    }
}
