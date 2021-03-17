<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepositoryInterface;

class Register extends Component
{
    
    public $name = '';
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';

    /**
     * validate and submit the register form
     *
     * @return void
     */
    public function register(){

        $data = $this->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6|same:passwordConfirmation'

        ]);

        User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password'])
        ]);


        return redirect('/login', 302);

    }


    public function render()
    {
        return view('livewire.auth.register');
    }
}
