<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component {
    public string $name = '';
    public string $email = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section>
    <header>
        <h2>
            Meu perfil
        </h2>
        <p>
            Confira e atualize suas informações aqui
        </p>
    </header>

    <form wire:submit.prevent="updateProfileInformation">
        <div>
            <label for="name">Nome</label>
            <input wire:model="name" type="text" name="name" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input wire:model="email" type="email" name="email" required>
            @error('email')
                <span class="text-red-400 text-sm mt-1 text-left">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit">Salvar</button>
        </div>
    </form>
</section>
