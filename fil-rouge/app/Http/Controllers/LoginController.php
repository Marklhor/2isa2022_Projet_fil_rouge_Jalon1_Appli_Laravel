<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function checkErrors()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }

        return redirect()->to('/topic/index');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->to('/topic/index');
    }
}
