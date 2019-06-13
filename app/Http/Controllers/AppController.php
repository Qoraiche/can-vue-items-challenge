<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JavaScript;

class AppController extends Controller
{
	/**
     * Put user global javascript vars to the main app view
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        JavaScript::put([
           'user_auth' => Auth::check(),
           'user_data' => Auth::user(),
        ]);

		return view('welcome');

	}
}

