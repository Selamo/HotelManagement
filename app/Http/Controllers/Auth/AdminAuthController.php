<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{

    // Show the admin login form
    public function showLoginForm()
    {
        return view('auth.admin-login'); // Ensure this view exists
    }

    public function index()
    {
        return view('admin.dashboard'); // Ensure this view exists
    }

    // Handle the login request
    public function login(Request $request)
    {
        // Validate the login request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Check if the user is an admin
            if (Auth::user()->is_admin) {
                return redirect()->intended('/admin/dashboard'); // Redirect to admin dashboard
            } else {
                Auth::logout(); // Log out if not an admin
                return redirect()->back()->with('error', 'You are not authorized to access this area.');
            }
        }

        // If login fails
        return redirect()->back()->with('error', 'Invalid credentials.');
    }

    // Handle admin logout
    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login'); // Redirect to login after logout
    }
    // Show the admin registration form
public function showRegistrationForm()
{
    return view('auth.admin-register'); // Ensure this view has been created
}

// Handle the registration request
public function register(Request $request)
{   // Validate the registration request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'role' => 'required|string|in:admin,staff,customer',
        ], [
            'name.required' => 'A name is required.',
            'email.required' => 'An email address is required.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'A password is required.',
            'password.confirmed' => 'Passwords do not match.',
            'role.required' => 'Please select a role.',
            'role.in' => 'The role must be either admin, staff, or customer.',
        ]);

        // Create the new user with the specified role
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
            'role' => $request->role,
        ]);

        // Optionally log in the user
        Auth::login($user); // Only if you want to log them in immediately

        // Redirect to the admin dashboard or back to the login page with success message
        return redirect()->intended('/admin/dashboard'); // Change if you decide to log out users after registration
    }
}
