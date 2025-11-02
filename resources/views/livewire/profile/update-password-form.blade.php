<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component {
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }
}; ?>

<section>
    <header>
        <h2>
            Mudar senha
        </h2>

        <p>
            Certifique-se se usar uma senha longa para manter sua conta segura
        </p>
    </header>

    <form wire:submit.prevent="updatePassword">
        <div>
            <label for="update_password_current_password">Senha atual</label>
            <input wire:model="current_password" type="password" id="update_password_current_password" name="current_password">
            @error('current_password')
                <span class="text-red-400 text-sm mt-1 text-left">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="update_password_password">Nova senha</label>
            <input wire:model="password" id="update_password_password" name="password" type="password">
            @error('password')
                <span class="text-red-400 text-sm mt-1 text-left">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="update_password_password_confirmation">Confirme a senha</label>
            <input wire:model="password_confirmation" id="update_password_password_confirmation" name="password_confirmation" type="password">
            @error('password_confirmation')
                <span class="text-red-400 text-sm mt-1 text-left">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit">Salvar</button>
        </div>
    </form>
</section>
