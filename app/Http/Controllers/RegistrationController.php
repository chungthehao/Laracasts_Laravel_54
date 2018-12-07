<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        /* Validate the form */
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|max:32|confirmed'
        ]);

        /* Create & save the user */
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        /* Sign them in */
        auth()->login($user);

        # Send a welcome email
        // Tự động lấy trường email trong đối tượng $user
        \Mail::to($user)->send(new Welcome($user));

        /* Redirect to ... page */
        return redirect()->home(); // <=> redirect('/')

    }
}
