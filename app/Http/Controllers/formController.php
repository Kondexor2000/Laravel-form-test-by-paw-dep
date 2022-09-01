<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class formController extends Controller
{
    public function show() {
        // pokazuje formularz
        return view('form.index');
    }
    public function save(Request $request) {
        // zapisuje do bazy danych
        // ale najpierw sprawdzamy, czy ktoś z takim numerem lub nazwą istnieje

        $login = $request->input('login');
        $phone = $request->input('phone');

        $foundUsers = DB::table('users')->where('telefon', '=', $phone)->whereOr('login', '=', $login)->count();
        if(!$foundUsers) {
            // nie znalazło, więc niech zapisze
            $password = md5(sha1($request->input('password')));
            $imie = $request->input('imie');
            $nazwisko = $request->input('nazwisko');
            $email = $request->input('email');
            DB::insert('INSERT INTO users VALUES(null, ?, ?, ?, ?, ?, ?)', [$login, $password, $imie, $nazwisko, $email, $phone]);
        }

        return Redirect::route('form.list', ['status' => ($foundUsers ? 'user-already-exists' : 'success')]);


        /**
         * Tabela wygląda następująco:
         * 
         * 'id'         int     auto_increment  primary
         * 'login'      text
         * 'password'   text
         * 'imie'       text
         * 'nazwisko'   text
         * 'email'      text
         * 'telefon     text
         */

    }
    public function list() {
        $results = DB::select('SELECT * FROM users');
        return view('form.list', ['users' => $results]);
    }
}
