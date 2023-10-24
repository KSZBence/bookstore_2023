<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller{
    public function store (Request $request){
        $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max: 255', 'unique:users'],
        'password' => ['required', 'confirmed', Password::defaults()],
        'permission' => ['integer']
        ]);

        $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'permission' => 1
        ]);
    }

    public function filterByUser(){
        $user = Auth::user();	//bejelentkezett felhasználó
        $books = Book::with('user')->where('user_id','=',$user->id)->get();
        return $books;
    }

}

