<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{

    // use RefreshDatabase;


    public function registration_page_contains_livewire_component(){

        $this->get('/register')->assertSeeLivewire('auth.register');
    }

   /**
    * @test
    */
    public function can_register(){
        
        Livewire::test('auth.register')
            ->set('name', 'chichoo')
            ->set('email', 'lldipzee@erty.fr')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('register')

            ->assertRedirect('/login');

            $this->assertTrue(User::whereEmail('lldipzee@erty.fr')->exists());
            $this->assertEquals(null, Auth::user());
            
    }
    
    /**
    * @test
    */
    public function see_email_hasnt_taken_validation_message_as_user_types(){

        User::create([
            'name' => 'ertyu',
            'email' => 'testy@test.fr',
            'password' => '123456789'
        ]);
        
        Livewire::test('auth.register')
            ->set('email', 'test@test.fr')

            ->assertHasNoErrors()

            ->set('email', 'testy@test.fr')

            ->assertHasErrors(['email' => 'unique']);
    }

    /**
    * @test
    */
    public function email_is_unique(){

        User::create([
            'name' => 'youhou',
            'email' => 'test@test.fr',
            'password' => '123456789'
        ]);
        
        Livewire::test('auth.register')
            ->set('name', 'chichoo')
            ->set('email', 'test@test.fr')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('register')

            ->assertHasErrors(['email' => 'unique']);
    }

    /**
    * @test
    */
    public function email_is_required(){
        
        Livewire::test('auth.register')
            ->set('name', 'chichoo')
            ->set('email', '')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('register')

            ->assertHasErrors(['email' => 'required']);
    }

    /**
    * @test
    */
    public function email_is_valid_email(){
        
        Livewire::test('auth.register')
            ->set('name', 'chichoo')
            ->set('email', 'chichon')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('register')

            ->assertHasErrors(['email' => 'email']);
    }

    /**
    * @test
    */
    public function password_is_required(){
        
        Livewire::test('auth.register')
            ->set('name', 'chichoo')
            ->set('email', 'chichon')
            ->set('password', '')
            ->set('passwordConfirmation', 'secret')
            ->call('register')

            ->assertHasErrors(['password' => 'required']);
    }

     /**
    * @test
    */
    public function password_is_min_6_carac(){
        
        Livewire::test('auth.register')
            ->set('name', 'chichoo')
            ->set('email', 'chichon')
            ->set('password', 'sec')
            ->set('passwordConfirmation', 'secret')
            ->call('register')

            ->assertHasErrors(['password' => 'min']);
    }

     /**
    * @test
    */
    public function password_must_matche_passwordConfirmation(){
        
        Livewire::test('auth.register')
            ->set('name', 'chichoo')
            ->set('email', 'chichon')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'sechet')
            ->call('register')

            ->assertHasErrors(['password' => 'same']);
    }


}
