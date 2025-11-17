<div class="border-2 bg-slate-500 border-blue-400 rounded-lg p-3 shadow-sm hover:shadow-xl transition">

    <h3 class="text-xl font-bold">{{ $job->title }}</h3>

    <div class="mt-3 flex flex-row justify-between">
        <div class="text-lg text-white">
            <p><strong>Cidade:</strong> {{ $job->city }}</p>
            <p><strong>Setor:</strong> {{ $job->sector ?? '—' }}</p>
            <p><strong>Salário:</strong>
                {{ $job->salary ? 'R$ ' . number_format($job->salary, 2, ',', '.') : 'A combinar' }}</p>
            <p><strong>Publicado em:</strong> {{ $job->created_at->format('d/m/Y') }}</p>
            <p><strong>Vaga aberta até:</strong> {{ $job->open_until->format('d/m/Y') }}</p>
        </div>
        <div class="w-1/2">
            <p class="text-lg">{{ $job->description }}</p>
        </div>

        <div class="text-sm white">
            <strong>Data(s) do trabalho:</strong>
            @if ($job->dates->isEmpty())
                <span>Nenhuma data cadastrada</span>
            @else
                <ul class="list-disc text-sm">
                    @foreach ($job->dates as $date)
                        <li>{{ $date->work_date->format('d/m/Y') }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="mt-3 p-4 flex flex-col gap-2">
            <a href="{{ route('job-offers.edit', $job) }}" class="button button-edit w-full">Editar</a>
            
            <form action="{{ route('job-offers.destroy', $job->id) }}" method="POST"
                onsubmit="return confirm('Excluir esta vaga?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="button button-delete w-full">Excluir</button>
            </form>
        </div>
    </div>
    <a href="{{ route('getCandidatesByOffer', $job->id) }}" class="simple-button">Ver candidatos</a>
</div>
