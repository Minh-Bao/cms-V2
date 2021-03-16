<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;

class RegistrationTest extends TestCase
{

   /**
    * @test
    */
    public function can_register(){
        
        Livewire::test('auth.register')
            ->set('name', 'chichoo')
            ->set('email', 'phillipzee@erty.fr')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertRedirect('/login');
    }

}
