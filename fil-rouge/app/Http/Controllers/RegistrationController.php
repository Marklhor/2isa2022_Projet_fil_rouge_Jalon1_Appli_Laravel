<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration.index');
    }

    public function save()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::create(request(['name', 'email', 'password']));

        return redirect()->to('/login/index');
    }
}
