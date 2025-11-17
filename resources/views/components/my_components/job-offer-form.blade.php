@props(['action', 'method' => 'POST', 'company' => null, 'job_offer' => null])

<form 
    action="{{ $action }}" 
    method="POST" 
    class="text-lg mt-4 flex flex-col items-center w-full">
    @csrf
    @if (in_array($method, ['PUT', 'PATCH', 'DELETE']))
        @method($method)
    @endif

    <input type="hidden" name="company_id" value="{{ auth()->user()->company_id }}">

    <div class="flex flex-col gap-8 shadow-sm w-2/3 blue-gradient p-10 rounded-xl">

        <h2 class="text-2xl font-bold text-white text-center">
            {{ $method === 'POST' ? 'Criar Nova Vaga' : 'Editar Vaga' }}
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 font-semibold">

            <div class="flex flex-col gap-4">
                <div class="flex flex-col">
                    <label for="title" class="text-white">Título da vaga</label>
                    <input type="text" name="title" id="title" 
                        value="{{ old('title', $job_offer->title ?? '') }}"
                        class="input-style" required>
                    @error('title')
                        <p class="text-red-200 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="description" class="text-white">Descrição da vaga</label>
                    <input type="text" name="description" id="description" 
                        value="{{ old('description', $job_offer->description ?? '') }}"
                        class="input-style" required>
                    @error('description')
                        <p class="text-red-200 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="city" class="text-white">Cidade</label>
                    <input type="text" name="city" id="city" 
                        value="{{ $company->getCity->name }}" 
                        class="input-style" readonly required>
                    @error('city')
                        <p class="text-red-200 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="sector" class="text-white">Setor</label>
                    <input type="text" name="sector" id="sector" 
                        value="{{ old('sector', $job_offer->sector ?? '') }}"
                        class="input-style" required>
                    @error('sector')
                        <p class="text-red-200 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-col gap-4">

                <div class="flex flex-col">
                    <label for="salary" class="text-white">Remuneração/dia</label>
                    <input type="number" step="0.01" name="salary" id="salary"
                        value="{{ old('salary', $job_offer->salary ?? '') }}"
                        class="input-style" required>
                    @error('salary')
                        <p class="text-red-200 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <p class="text-white font-medium">Dias da atividade</p>
                    <div 
                        x-data="{
                            dates: @js(old('dates', isset($job_offer) && $job_offer->dates->isNotEmpty() ? $job_offer->formattedDates() : ['']))
                        }">
                        <template x-for="(date, index) in dates" :key="index">
                            <div class="flex items-center gap-2 mt-2">
                                <input type="date" :name="`dates[${index}]`" required x-model="dates[index]"
                                       class="input-style flex-1">
                                <button 
                                    type="button"
                                    x-on:click="dates.splice(index, 1)"
                                    x-show="dates.length > 1"
                                    class="bg-red-500 text-white text-sm rounded-lg px-3 py-1">
                                    Remover
                                </button>
                            </div>
                        </template>

                        <button 
                            type="button" 
                            x-on:click="dates.push('')"
                            class="simple-button mt-3">
                            Adicionar Data
                        </button>
                    </div>
                </div>

                <div class="flex flex-col">
                    <label for="open_until" class="text-white">Fechamento da vaga</label>
                    <input type="date" name="open_until" id="open_until" required
                        value="{{ old('open_until', isset($job_offer) ? $job_offer->open_until->format('Y-m-d') : '') }}"
                        class="input-style">
                    @error('open_until')
                        <p class="text-red-200 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center gap-3">
                    <label for="is_temporary" class="text-white">Vaga temporária?</label>
                    <input type="checkbox" id="is_temporary" name="is_temporary" value="1"
                           {{ old('is_temporary', 1) == 1 ? 'checked' : '' }}>
                </div>

            </div>

        </div>

        <button type="submit" class="simple-button mx-auto px-8 py-3 mt-4">
            {{ $method === 'POST' ? 'Criar vaga' : 'Atualizar vaga' }}
        </button>

    </div>
</form>
