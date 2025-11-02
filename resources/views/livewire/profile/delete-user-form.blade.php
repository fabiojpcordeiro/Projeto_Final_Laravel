<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {
    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        $this->dispatch('close-modal', 'confirm-user-deletion');

        tap(Auth::user(), $logout(...))->delete();
        $this->redirect('/', navigate: true);
    }
}; ?>

<section>
    <header>
        <h2>
            Deletar conta
        </h2>

        <p>
            Uma vez deletada, todas suas informações serão permanentemente perdidas, baixe seus conteúdos importantes.
        </p>
    </header>

    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        Deletar conta
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit.prevent="deleteUser">

            <h2>
                Você tem certeza que quer deletar sua conta?
            </h2>

            <p>
                Uma vez deletada todas suas informações serão perdidas, digite sua senha para continuar.
            </p>

            <div>
                <label for="password">Digite sua senha</label>
                <input wire:model="password" id="password" name="password" type="password" />
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="button" x-on:click="$dispatch('close')">
                    Cancelar
                </button>

                <button type="submit" x-on:click="$dispatch('close, 'confirm-user-deletion') wire:loading.attr="disabled">
                    Deletar conta
                </button>
            </div>
        </form>
    </x-modal>
</section>
