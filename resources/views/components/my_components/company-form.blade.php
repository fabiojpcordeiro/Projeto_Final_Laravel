@props(['action', 'method', 'company'=> null])

<div class="form-layout">
    <form action="{{ $action }}" method="POST" novalidate>
        @if (in_array($method, ['PUT', 'PATCH', 'DELETE']))
            @method($method)
        @endif
        @csrf
        <div class="company-field">
            <label for="name">Nome da Empresa</label>
            <input type="text" class="input-style" id="name" name="name" required value="{{ old('name', $company->name ?? '') }}">
            @error('name')
                <p>{{ $message }}</p>
            @enderror

        </div>
        <div class="company-field">
            <label for="public_email">Email publico</label>
            <input type="email" class="input-style" id="public_email" name="public_email" required value="{{ old('public_email', $company->public_email ?? '') }}">
            @error('public_email')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            @livewire('MyComponents.location-select',
            ['selectedState'=>$company->state ?? null,
            'selectedCity'=>$company->city ?? null
            ])
        </div>
        <div class="company-field">
            <label for="street">Rua</label>
            <input type="text" class="input-style" id="street" name="street" required value="{{ old('street', $company->street ?? '') }}">
            @error('street')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="company-field">
            <label for="number">Numero</label>
            <input type="text" class="input-style" id="number" name="number" required value="{{ old('number', $company->number ?? '') }}" >
            @error('number')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="company-field">
            <label for="sector">Setor de Atuação</label>
            <input type="text" class="input-style" id="sector" name="sector" required value="{{ old('sector', $company->sector ?? '') }}">
            @error('sector')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="company-field">
            <label for="about">Fale sobre a empresa (opcional)</label>
            <textarea name="about" class="input-style" id="about" rows="3">{{old('about', $company->about ?? '')}}</textarea>
            @error('about')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="simple-button w-[50%] my-2">Enviar</button>
    </form>
    @if ($company)
        @livewire('my-components.logo-upload', ['company' => $company])     
    @endif

</div>
