<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $users = User::with('role')->get();
        return view('users.index', compact('roles', 'users'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|regex:/^[6-9]\d{9}$/',
            'description' => 'required',
            'role_id' => 'required|exists:roles,id',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $imagePath = $request->file('profile_image')->store('profile-images', 'public');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => "+91 $request->phone",
            'description' => $request->description,
            'role_id' => $request->role_id,
            'profile_image' => $imagePath
        ]);

        $user->load('role');

        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user
        ]);
    }
} 