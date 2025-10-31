<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <div id="register" class="flex justify-center items-center text-center w-screen h-screen text-white font-semibold">
        <div class="p-14 justify-center bg-black opacity-80 h-[80%] w-[40%] rounded-xl">

            <div class="flex h-20 -mt-5">
                <x-my_components.logo></x-my_components.logo>
            </div>

            <h2 class="my-3 font-bold text-3xl">Registrar</h2>

            <form wire:submit.prevent="register" id="register-form" class="text-xl">
                @csrf
                <div class="mb-4 flex flex-col">
                    <label for="name">Nome</label>
                    <input wire:model="name" type="text" id="name" name="name"
                        class="form-input rounded-xl text-black" required>
                    @error('name')
                        <span class="text-red-400 text-sm mt-1 text-center">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4 flex flex-col">
                    <label for="email">Email</label>
                    <input wire:model="email" type="email" id="email" name="email"
                        class="form-input rounded-xl text-black" required>
                    @error('email')
                        <span class="text-red-400 text-sm mt-1 text-cnter">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4 flex flex-col">
                    <label for="password">Senha</label>
                    <input wire:model="password" type="password" id="password" name="password"
                        class="form-input rounded-xl text-black" required>
                    @error('password')
                        <span class="text-red-400 text-sm mt-1 text-center">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4 flex flex-col">
                    <label for="password_confirmation">Confirme sua senha</label>
                    <input wire:model="password_confirmation" type="password" id="password_confirmation"
                        name="password_confirmation" class="form-input rounded-xl text-black" required>
                    @error('password_confirmation')
                        <span class="text-red-400 text-sm mt-1 text-center">{{ $message }}</span>
                    @enderror
                </div>
                
                <x-my_components.primary_button type="submit"
                    class="w-full mt-2">Registrar</x-my_components.primary_button>
            </form>
        </div>
    </div>
</div>
