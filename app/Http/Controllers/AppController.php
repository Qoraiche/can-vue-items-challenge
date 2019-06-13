<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JavaScript;

class AppController extends Controller
{
    public function home()
    {
        JavaScript::put([
           'user_auth' => Auth::check(),
           'user_data' => Auth::user(),
        ]);

		return view('welcome');

	}
}
