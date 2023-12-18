<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    
    public function registerPage(){
        return view('auth.register');

    }
    public function loginPage()
    {
        return view('auth.login');
    }


    
    public function logout(){
        auth()->logout();
        return redirect('/auth/register');
        

}

public function login(Request $request){
    $incomingFields = $request->validate([
        'loginemail' => ['required'],
        'loginpassword' => ['required', 'min:8', 'max:200'],
    ]);

    if (auth()->attempt(['email' => $incomingFields['loginemail'], 'password' => $incomingFields['loginpassword']])) {
        // dd($request);
        $request->session()->regenerate();

    }
    return redirect('/tasks');

}

   public function register(Request $request){
    // dd($request);
    $incomingFields = $request->validate([
        'name' => ['required', 'min:3', 'max:15', Rule::unique('users', 'name')],
        'email' => ['required', 'email', Rule::unique('users', 'email')],
        'password' =>  ['required', 'min:8', 'max:200', 'confirmed'],


    ]);


    $incomingFields['password'] = bcrypt($incomingFields['password']);


    $user = User::create($incomingFields);
    auth()->login($user); 

    return redirect('/tasks');
   }
}
