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
        <h2 class="mb-2 font-bold">
            Deletar conta
        </h2>

        <p class="text-lg">
            Uma vez deletada, todas suas informações serão permanentemente perdidas.
        </p>
    </header>

    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    class="button button-delete mt-4 w-1/2 te">
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

            <div class="form-field">
                <label for="password">Digite sua senha</label>
                <input wire:model="password" id="password" name="password" type="password" class="input-style"/>
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4 flex flex-row gap-10 justify-center">
                <button type="button" class="button bg-white text-black w-40" x-on:click="$dispatch('close')">
                    Cancelar
                </button>

                <button type="submit" class="button button-delete w-40" x-on:click="$dispatch('close, 'confirm-user-deletion') wire:loading.attr="disabled">
                    Deletar conta
                </button>
            </div>
        </form>
    </x-modal>
</section>
