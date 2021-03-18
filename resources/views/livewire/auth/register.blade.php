
<div class="min-h-screen bg-white flex">
    <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
        <div class="mx-auto w-full max-w-sm lg:w-96">
            <div>
                <img class="h-20 w-auto" src="{{asset('images/logo-black.png')}}"
                    alt="logo {{config('myconfig.site_owner')}}">
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    Créez votre compte
                </h2>
                <p class="mt-2 text-sm text-gray-600 max-w">
                    Ou
                    <a href="{{url('/login')}}" class="font-medium text-pink-450 hover:text-pink-500">
                        connectez vous avec un autre compte.
                    </a>
                </p>
            </div>

            <div class="mt-8">
                <div class="mt-6">
                    <form wire:submit.prevent="register" class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                Nom
                            </label>
                            <div class="mt-1">
                                <input wire:model.lazy="name" id="name" name="name" type="text" autocomplete="name" 
                                    required
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none sm:text-sm focus:border-pink-700 focus:ring-pink-500">
                            </div>
                            @error('name') <div class="mt-1 text-pink-450 text-sm">{{$message}}</div> @enderror 
                        </div>
 
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                Adresse email
                            </label>
                            <div class="mt-1">
                                <input wire:model="email" id="email" name="email" type="email" autocomplete="email" required
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none sm:text-sm focus:border-pink-700 focus:ring-pink-500">
                            </div>
                            @error('email') <div class="mt-1 text-pink-450 text-sm">{{$message}}</div> @enderror 
                        </div>

                        <div class="space-y-1">
                            <label for="password" class="block text-sm font-medium text-gray-700">
                                Mot de passe
                            </label>
                            <div class="mt-1">
                                <input wire:model.lazy="password" id="password" name="password" type="password" autocomplete="current-password"
                                    required
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none sm:text-sm focus:border-pink-700 focus:ring-pink-500">
                            </div>
                            @error('password') <div class="mt-1 text-pink-450 text-sm">{{$message}}</div> @enderror 
                        </div>

                        <div class="space-y-1">
                            <label for="passwordConfirmation" class="block text-sm font-medium text-gray-700">
                                Confirmez le mot de passe
                            </label>
                            <div class="mt-1">
                                <input wire:model.lazy="passwordConfirmation" id="passwordConfirmation" name="passwordConfirmation" type="password" autocomplete="current-password"
                                    required
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none sm:text-sm focus:border-pink-700 focus:ring-pink-500">
                            </div>
                        </div>

                        <div>
                            <button type="submit"
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-gray-50 bg-pink-450 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-600">
                                Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden lg:block relative w-0 flex-1">
        <img class="absolute inset-0 h-full w-full object-cover"
            src="{{asset('images/bg_register.jpg')}}"
            alt="">
    </div>
</div>


