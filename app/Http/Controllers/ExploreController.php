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
        $whoFollows = User::whereRaw('username like ?', [$username])->get();
        //$whoFollows = DB::table('users')->whereRaw('username like ?', [$username])->get();

        return view('profiles/explore', compact('whoFollows'));
    }
}
