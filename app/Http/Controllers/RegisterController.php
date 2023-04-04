<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('session.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'app' => ['required', 'max:50'],
            'apm' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:20'],
            'phone' => ['required', 'max:10'],
            'role_id' => ['required'],
            'address' => ['required'],
        ]);
        $attributes['password'] = bcrypt($attributes['password'] );



        session()->flash('Excelente', 'Tu cuenta ha sido creada satisfactoriamente.');
        $user = User::create($attributes);
        Auth::login($user);
        if($user->role_id == 1){
            return redirect('/dashboard');
        }else{
            return redirect('/productos');
        }
        // return redirect('/dashboard');
    }
}
