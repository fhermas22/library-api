<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Create a new user.
     */
    public function register(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // Create & Store data
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Response
        return response()->json(
            ['message' => "Inscription faite avec succès"],
            200
        );
    }

    /**
     * Login an existing user.
     */
    public function login(Request $request)
    {
        // Validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Verify if user exist
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages(['email' => ["Les informations sont incorrectes."]]);
        }

        // Create Session Token
        $token = $user->createToken('user-token')->plainTextToken;

        // User infos
        $user_infos = [
            'name' => $user->name,
            'email' => $user->email,
            'token' => $token,
        ];

        // Response
        return response()->json(
            ['user' => $user_infos, 'message' => "Connecté avec succès"],
            200
        );
    }

    /**
     * Logout a connected user.
     */
    public function logout(Request $request)
    {
        // Get connected user
        $user = $request->user();

        // Verify user and his token before Logout
        if ($user && $user->currentAccessToken()) {
            $user->currentAccessToken()->delete();
            return response()->json(
                ['message' => "Déconnecté avec succès"],
                200
            );
        }

        // Return 401 if user is not authenticated
        return response()->json(['message' => "Non authentifié"], 401);
    }
}
