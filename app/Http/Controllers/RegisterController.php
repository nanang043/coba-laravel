<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('registrasi.index', [

            'title' => 'register'

        ]);
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([

            'name' => 'required | max:255',
            'username' => 'required | min:6 | max:255 | unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required | min:5 | max:255'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        // $request->session()->flash();

        return redirect('/login')->with('success', 'Registration successfull! Pleas Login');
    }
}
