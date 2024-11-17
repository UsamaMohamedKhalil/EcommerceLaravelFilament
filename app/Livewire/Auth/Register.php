<?php

// First To Authentication for user panel

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title("Register - Buy Or Die")]
class Register extends Component
{
    public $name;
    public $email;
    public $password;

    //register user
    public function save(){

        //Validate data from user
        $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6|max:255'
        ]);

        //save user to DB
        $user= User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        //login user 
        auth()->login($user);

        return redirect()->intended();
    }
    public function render()
    {
        return view('livewire.auth.register');
    }
}
