    <div>
        <div>
            <label for="state">Estado:</label>
            <select wire:model.live.debounce.150ms="selectedState" id="state" required>
                <option value="">Selecione o estado</option>
                @foreach ($states as $state)
                    <option value="{{ $state->id }}">{{ $state->name }}</option>                
                @endforeach
            </select>
        </div>
        <div>
            <label for="city">Cidade:</label>
            <input type="text" wire:model.live.debounce.150ms="cityInput" id="city" name="city" placeholder="Digite a sua cidade" required>
            @if (!empty($citySuggestions))
                <ul>
                    @foreach ($citySuggestions as $suggestion)
                    <li wire:click="selectCity({{ $suggestion->id }})">{{ $suggestion->name }}</li>    
                    @endforeach
                </ul>
            @endif
        </div>
        <input type="hidden" name="{{ $stateFieldName }}" value="{{ $selectedState }}">
        <input type="hidden" name="{{ $cityFieldName }}" value="{{ $selectedCity }}">
    </div>