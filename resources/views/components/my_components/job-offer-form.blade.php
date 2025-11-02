@props([
    'action',
    'method' => 'POST',
    'company' => null,
    'job' => null, // usado na edição
])


<form action="{{ $action }}" method="POST" novalidate>
    @csrf
    @if (in_array($method, ['PUT', 'PATCH', 'DELETE']))
        @method($method)
    @endif

    <input type="hidden" name="company_id" value="{{ auth()->user()->company_id }}">

    <div>
        <label for="title">Título da vaga</label>
        <input type="text" name="title" id="title" value="{{ old('title', $job->title ?? '') }}" required>
        @error('title')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="description">Descrição da vaga</label>
        <input type="text" name="description" id="description"
            value="{{ old('description', $job->description ?? '') }}" required>
        @error('description')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="city">Cidade</label>
        <input type="text" name="city" id="city" value="{{ $company->getCity->name }}" required readonly>
        @error('city')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="sector">Setor</label>
        <input type="text" name="sector" id="sector" value="{{ $company->sector }}" required>
        @error('sector')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="salary">Remuneração/dia</label>
        <input type="number" name="salary" id="salary" step="0.01"
            value="{{ old('salary', $job->salary ?? '') }}" required>
        @error('salary')
            <p>{{ $message }}</p>
        @enderror
    </div>
    {{-- Job dates selection --}}
    <div class="date-selection-section">
        <p>Adicione os dias em que o trabalho será realizado.</p>
        <div x-data="{
            dates: @js(old('dates', isset($job) && $job->dates->isNotEmpty() ? $job->formattedDates() : ['']))
        }">
            <template x-for="(date, index) in dates" :key="index">
                <div>
                    <input type="date" :name="`dates[${index}]`" required x-model="dates[index]">
                    <button type="button" x-on:click="dates.splice(index, 1)" x-show="dates.length > 1">
                        Remover
                    </button>
                </div>
            </template>

            <button type="button" x-on:click="dates.push('')">
                + Adicionar Outra Data
            </button>
        </div>
    </div>
    <div>
        <label for="open_until">Fechamento da vaga</label>
        <input type="date" name="open_until" id="open_until" required
            {{ old('open_until', $job->open_until ?? '') }}>
        @error('open_until')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="salary">A vaga é temporária?</label>
        <input type="checkbox" name="is_temporary" id="is_temporary" value="1"
            {{ old('is_temporary', 1) == 1 ? 'checked' : '' }}>
    </div>
    <button type="submit">{{ $method === 'POST' ? 'Criar vaga' : 'Atualizar vaga' }}</button>
</form>
