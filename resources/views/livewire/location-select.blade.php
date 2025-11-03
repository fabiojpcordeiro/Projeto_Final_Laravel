<div>
    <div class="company-field">
        <label for="state">Estado:</label>
        <select wire:model.live.debounce.150ms="selectedState" id="state" class="input-style" required>
            <option value="">Selecione o estado</option>
            @foreach ($states as $state)
                <option value="{{ $state->id }}">{{ $state->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="relative company-field">
        <label for="city" class="text-center">Cidade:</label>
        <input type="text" wire:model.live.debounce.150ms="cityInput" id="city" class="input-style" name="city" required>
        @if (!empty($citySuggestions))
            <ul class="absolute z-50 left-0 right-0 flex flex-col gap-0.5 bg-gray-400 rounded-md max-h-48 overflow-y-auto">
                @foreach ($citySuggestions as $suggestion)
                    <li wire:click="selectCity({{ $suggestion->id }})"
                        class="font-semibold border-white border-2 hover:cursor-pointer hover:shadow-md">
                        {{ $suggestion->name }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    <input type="hidden" name="{{ $stateFieldName }}" value="{{ $selectedState }}">
    <input type="hidden" name="{{ $cityFieldName }}" value="{{ $selectedCity }}">
</div>
