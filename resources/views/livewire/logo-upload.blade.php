<div class="flex flex-col gap-4 items-start">
    <form wire:submit.prevent="save" class="flex flex-col gap-3 w-full">
        @csrf

        <div>
            <label for="logo" class="font-semibold">Logo da Empresa:</label>
            <input type="file" id="logo" wire:model="logo" accept="image/*" class="block mt-1">
            @error('logo')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        @if ($previewUrl)
            <div class="mt-2">
                <p class="font-semibold text-sm">Pré-visualização:</p>
                <img src="{{ $previewUrl }}" alt="Preview" class="w-32 h-32 object-cover rounded-lg border">
            </div>
        @endif

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            Salvar Logo
        </button>
    </form>

    @if (session('success'))
        <p class="text-green-600 font-semibold">{{ session('success') }}</p>
    @endif
</div>
