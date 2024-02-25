<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class RegisterUserController extends Controller
{
    /**
     * Display the registration view.
     */

public function showRegistrationForm()
{
    return view('auth.register');
}


public function store(Request $request)
{
    // Валидация данных
    $request->validate([
        'name' => 'required|string|max:255',
    'password' => 'required|string|min:8',
    'email' => 'required|string|email|max:255|unique:users',
    'phone' => 'required|string|max:255|unique:users',
    ]);

    // Создание нового пользователя
    $hashedPassword = Hash::make($request->password);

    $user = new User();
    $user->name = $request->name;
    $user->password = $hashedPassword;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->save();

    // Опционально: авторизация пользователя после регистрации
    Auth::login($user);

    // Перенаправление пользователя после успешной регистрации
    return redirect()->route('home');
}

}