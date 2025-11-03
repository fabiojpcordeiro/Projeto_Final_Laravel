@props(['action', 'method' => 'POST', 'company' => null, 'job_offer' => null])

<form 
    action="{{ $action }}" 
    method="POST" 
    class="text-lg mt-4 flex flex-col items-center">
    @csrf
    @if (in_array($method, ['PUT', 'PATCH', 'DELETE']))
        @method($method)
    @endif
    <input type="hidden" name="company_id" value="{{ auth()->user()->company_id }}">
    
    <div class="flex flex-col gap-6 shadow-sm w-1/2 blue-gradient p-8">
        <div class="flex flex-1 flex-col gap-4 font-semibold">
            <div class="flex flex-col">
                <label for="title">Título da vaga</label>
                <input type="text" name="title" id="title" value="{{ old('title', $job_offer->title ?? '') }}"
                    class="input-style" required>
                @error('title')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="description">Descrição da vaga</label>
                <input type="text" name="description" id="description" class="input-style"
                    value="{{ old('description', $job_offer->description ?? '') }}" required>
                @error('description')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="city">Cidade</label>
                <input type="text" name="city" id="city" value="{{ $company->getCity->name }}" required
                   class="input-style" readonly>
                @error('city')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="sector">Setor</label>
                <input type="text" name="sector" id="sector" value="{{ old('sector', $job_offer->sector ?? '') }}" 
                class="input-style" required>
                @error('sector')
                    <p>{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex flex-1 flex-col gap-4 font-semibold">
            <div class="flex flex-col">
                <label for="salary">Remuneração/dia</label>
                <input type="number" name="salary" id="salary" step="0.01"
                    value="{{ old('salary', $job_offer->salary ?? '') }}" 
                    class="input-style" required>
                @error('salary')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            {{-- job_offer dates selection --}}
            <div class="flex flex-col">
                <p>Adicione os dias em que o trabalho será realizado.</p>
                <div x-data="{
                    dates: @js(old('dates', isset($job_offer) && $job_offer->dates->isNotEmpty() ? $job_offer->formattedDates() : ['']))
                }">
                    <template x-for="(date, index) in dates" :key="index">
                        <div class="mt-2">
                            <input type="date" :name="`dates[${index}]`" required x-model="dates[index]" class="input-style">
                            <button type="button" x-on:click="dates.splice(index, 1)" x-show="dates.length > 1"
                                class="bg-red-500 text-sm rounded-lg p-1 align-middle">
                                Remover
                            </button>
                        </div>
                    </template>

                    <button type="button" x-on:click="dates.push('')">
                        + Adicionar Outra Data
                    </button>
                </div>
            </div>

            <div class="flex flex-col">
                <label for="open_until">Fechamento da vaga</label>
                <input type="date" name="open_until" id="open_until" class="input-style" required
                    value={{ old('open_until', isset($job_offer) ? $job_offer->open_until->format('Y-m-d') : '') }}>
                @error('open_until')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="salary">A vaga é temporária?</label>
                <input type="checkbox" name="is_temporary" id="is_temporary" value="1"
                class="input-style"
                    {{ old('is_temporary', 1) == 1 ? 'checked' : '' }}>
            </div>
        </div>
    </div>
    <button type="submit" class="simple-button mt-4">{{ $method === 'POST' ? 'Criar vaga' : 'Atualizar vaga' }}
    </button>
</form>
