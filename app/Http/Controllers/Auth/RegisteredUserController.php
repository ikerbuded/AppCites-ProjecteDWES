<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'birthdate' => ['required', 'date'],
            'gender' => ['required', 'string'],
            'hair_color' => ['required', 'string'],
            'eye_color' => ['required', 'string'],
        ]);

        $imagePath = "";
        if ($request->gender == 'home') {
            $imagePath = 'usuarisImatges/defaultHombre.webp';
        } elseif ($request->gender == 'dona') {
            $imagePath = 'usuarisImatges/defaultMujer.webp';
        } else {
            $imagePath = 'usuarisImatges/default.webp';
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'data_naixement' => $request->birthdate,
            'sexe' => $request->gender,
            'color_cabell' => $request->hair_color,
            'color_ulls' => $request->eye_color,
            'imatge' => $imagePath
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('user.modificarfotos');
        // return redirect(route('dashboard', absolute: false));
    }
}
