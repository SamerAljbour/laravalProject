<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:lessor,renter'],
        ]);

        if ($validator->fails()) {
            return redirect('/login_register')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Optionally, you can log in the user automatically after registration
        // Auth::login($user);

        return redirect('/login_register')->with('success', 'Registration successful.');
    }

    /**
     * Check if email already exists.
     */
public function checkEmail(Request $request)
{
    $email = $request->input('email');
    $exists = User::where('email', $email)->exists();

    return response()->json(['exists' => $exists]);
}

}
