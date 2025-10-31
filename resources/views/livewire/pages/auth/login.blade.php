<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <div id="login" class="flex justify-center items-center text-center w-screen h-screen text-white font-semibold">
        <div class="p-14 justify-center bg-black opacity-80 h-[80%] w-[40%] rounded-xl">

            <div class="flex h-20">
                <x-my_components.logo></x-my_components.logo>

            </div>

            <h2 class="my-4 font-bold text-3xl">Entrar</h2>

            <form wire:submit.prevent="login" id="login-form">
                @csrf
                <div class="mb-4 flex flex-col">
                    <label for="email">Email</label>
                    <input wire:model="form.email" type="email" id="email" name="email"
                        class="form-input rounded-xl text-black" required>
                    @error('form.email')
                        <span class="text-red-400 text-sm mt-1 text-left">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4 flex flex-col">
                    <label for="password">Senha</label>
                    <input wire:model="form.password" type="password" id="password" name="password"
                        class="form-input rounded-xl text-black" required>
                    @error('form.password')
                        <span class="text-red-400 text-sm mt-1 text-left">{{ $message }}</span>
                    @enderror
                </div>

                <label class="gap-2 mb-4">
                    <input wire:model="form.remember" type="checkbox" name="remember" class="text-blue-500">
                    Manter-me conectado
                </label>

                <x-my_components.primary_button type="submit"
                    class="w-full mt-4">Entrar</x-my_components.primary_button>
            </form>

            <p class="mt-4">Esqueceu sua senha?
                <a href="{{ route('password.request') }}" wire:navigate class="hover:underline hover:text-blue-500">
                    Clique aqui.</a>
            </p>
        </div>
    </div>
</div>
