<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\User;

class HomeController extends Controller
{
    public function home()
    {
        if(\Auth::check() && \Auth::user()->role_id == 1){
            return redirect('/dashboard');
        }else{
            $products = Products::paginate(20);

            return view('welcome', compact('products'));
        }
    }

    public function dashboard(){
        $users = User::all()->count();
        $products = Products::all()->count();

        return view('dashboard', compact('users', 'products'));
    }
}
