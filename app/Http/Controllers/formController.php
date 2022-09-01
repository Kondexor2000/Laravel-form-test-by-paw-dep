<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class formController extends Controller
{
    public function show() {
        // pokazuje formularz
        return view('form.index');
    }
    public function save(Request $request) {
        // zapisuje do bazy danych
        $imie = $request->input('imie');
        $nazwisko = $request->input('nazwisko');
        $email = $request->input('email');
        $phone = $request->input('phone');
        DB::insert('INSERT INTO users VALUES(null, ?, ?, ?, ?)', [$imie, $nazwisko, $email, $phone]);

        /**
         * Tabela wygląda następująco:
         * 
         * 'id'         int     auto_increment  primary
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
