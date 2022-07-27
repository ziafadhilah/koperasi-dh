<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {
        return view('/auth/login');
    }

    public function authenticate(Request $request)
    {
        // $credentials = $request->only('email', 'password');

        $username = $request->username;
        $password = $request->password;

        // if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
        //     //user sent their email 
        //     Auth::attempt(['email' => $username, 'password' => $password]);
        // } else {
        //     //they sent their username instead 
        //     Auth::attempt(['username' => $username, 'password' => $password]);
        // }

        Auth::attempt(['username' => $username, 'password' => $password]);

        // if (Auth::check()) {
        //     //send them where they are going 
        //     $request->session()->regenerate();

        //     $employee = Employee::find(Auth::id());

        //     $userLoginPermissions = [];

        //     if ($employee !== null) {
        //         $userLoginPermissions = json_decode($employee->role->role_permissions);
        //     }

        //     $request->session()->put('userLoginPermissions', $userLoginPermissions);
        //     // return redirect()->intended('home');
        //     return response()->json([
        //         'status' => 'OK',
        //         'message' => 'logged on',
        //         'code' => 200
        //     ]);
        //     // return redirect('/employee');
        // }

        return response()->json([
            'status' => 'Oops',
            'message' => 'incorrect username or password',
            'code' => 400
        ], 400);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
