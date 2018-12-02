<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->home();
    }

    public function store()
    {
        /* Attempt to authenticate the user */
        /* If so, sign them in */
        if ( ! auth()->attempt(request(['email', 'password']))) { // if false, auto sign in
            /* If not, redirect back */
            return back()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ]);
        }

        /* Redirect to ... page */
        return redirect()->home();

    }
}
