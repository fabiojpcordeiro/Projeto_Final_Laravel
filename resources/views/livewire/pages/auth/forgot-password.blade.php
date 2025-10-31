<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink($this->only('email'));

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>

<div>
    <div class="flex justify-center items-center text-center w-screen h-screen text-white font-semibold">
        <div class="bg-black opacity-80 h-1/2 w-1/2 p-10 rounded-xl">
            <x-my_components.logo></x-my_components.logo>
            <h2 class="mt-4 text-2xl">Esqueceu sua senha? Sem problemas, nos informe seu email e lhe enviaremos um email para criar uma nova.</h2>
            @if(session('status'))
                <div class="mx-4 text-red-700 text-2x1">{{ session('status') }}</div>
            @endif
            
            <form wire:submit.prevent="sendPasswordResetLink">
                @csrf
                <div class="flex flex-col mt-2">
                    <label for="email">Seu email:</label>
                    <input wire:model="email" type="email" id="email" name="email" class="text-black rounded-xl" required>
                    @error("email")
                        <span class="text-red-400 text-sm mt-1 text-left">{{ $message }}</span>
                    @enderror
                </div>
                <x-my_components.primary_button type="submit" class="mt-6">Enviar email de redefinição</x-my_components.primary_button>
            </form>
        </div>
    </div>
</div>
