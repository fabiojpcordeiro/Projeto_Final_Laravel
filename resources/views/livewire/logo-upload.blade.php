@props(['company' => null])
<div class="flex flex-col gap-4">
    <form wire:submit.prevent="save" class="flex flex-col gap-3 w-full items-center">
        @csrf

        @if ($previewUrl)
            <div class="mt-2 form-layout">
                <h3>Logo</h3>
                <img src="{{ $previewUrl }}"
                    class="w-32 h-32 object-cover rounded-full border justify-self-center">
            </div>
        @endif
        <div class="flex flex-col">

            <div x-data>
                <input type="file" id="logo" class="hidden" accept="image/*" wire:model="logo" x-ref="fileInput">
                <button type="button" class="simple-button-secondary text-sm" @click="$refs.fileInput.click()">
                    Selecionar outra imagem
                </button>
                @error('logo')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <button type="submit" class="simple-button-secondary text-lg">
            Salvar logo
        </button>
    </form>

    @if (session('successLogo'))
        <p class="text-white bg-green-400 rounded-lg text-lg w-1/2 mx-auto">{{ session('successLogo') }}</p>
    @endif
</div>
