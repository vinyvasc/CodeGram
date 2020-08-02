<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class ExploreController extends Controller
{
    public function index(Request $request) {
        $username = $request->input('username');
        $username = '%' . $username . '%';
        $whoFollows = User::where('username', 'like', $username)->get();

        return $request->input('username') == ''?
            view('profiles/explore'): view('profiles/explore', compact('whoFollows'));
    }
}
