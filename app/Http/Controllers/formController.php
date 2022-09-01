<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class FormController extends Controller
{
    public function show() {
        // pokazuje formularz
        return view('form.index');
    }
    public function save(Request $request) {
        // zapisuje do bazy danych
        // ale najpierw sprawdzamy, czy ktoś z takim numerem lub nazwą istnieje

        $userInfo = [
            'id' => null,
            'login' => $request->input('login'),
            'password' => Hash::make($request->input('password')),
            'imie' => $request->input('imie'),
            'nazwisko' => $request->input('nazwisko'),
            'email' => $request->input('email'),
            'telefon' => $request->input('phone')
        ];

        $foundUsers = DB::table('users')->where('telefon', '=', $userInfo['telefon'])->whereOr('login', '=', $userInfo['login'])->count();
        if(!$foundUsers) {
            // nie znalazło, więc niech zapisze

            DB::table('users')->insert($userInfo);
        }

        return Redirect::route('form.list', ['status' => ($foundUsers ? 'user-already-exists' : 'success')]);
    }
    public function list() {
        $results = DB::table('users')->get();
        return view('form.list', ['users' => $results]);
    }
}
