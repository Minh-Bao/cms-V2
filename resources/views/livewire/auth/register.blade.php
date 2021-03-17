<div class="flex">
    <form wire:submit.prevent="register">
        {!! Form::label('name', 'name', []) !!}
        {!! Form::text('name', null, ["id" => "name", "wire:model" => "name"]) !!} 
        @error('name') <span>{{$message}} </span> @enderror <br>
            
        {!! Form::label('email', 'email', []) !!}
        {!! Form::text('email', null, ["id" => "email", "wire:model" => "email"]) !!} 
        @error('email') <span>{{$message}} </span> @enderror <br>
            
        {!! Form::label('password', 'password', []) !!}
        {!! Form::password('password',  ["id" => "password", "wire:model" => "password"]) !!} 
        @error('password') <span>{{$message}} </span> @enderror <br>
        
        {!! Form::label('passwordConfirmation', 'passwordConfirmation', []) !!}
        {!! Form::password('passwordConfirmation',  ["id" => "passwordConfirmation", "wire:model" => "passwordConfirmation"]) !!} 
        @error('passwordConfirmation')<span>{{$message}} </span> @enderror <br>
        
        {!! Form::submit('Register', []) !!}
    </form>
</div>