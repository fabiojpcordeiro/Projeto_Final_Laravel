<div class="border rounded-lg p-4 shadow-sm hover:shadow-md transition">
    <h3 class="text-lg font-semibold mb-1">{{ $job->title }}</h3>
    <p class="text-sm text-gray-600 mb-2">{{ $job->description }}</p>

    <div class="text-sm text-gray-500">
        <p><strong>Cidade:</strong> {{ $job->city }}</p>
        <p><strong>Setor:</strong> {{ $job->sector ?? '—' }}</p>
        <p><strong>Salário:</strong>
            {{ $job->salary ? 'R$ ' . number_format($job->salary, 2, ',', '.') : 'A combinar' }}</p>
        <p><strong>Publicado em:</strong> {{ $job->created_at->format('d/m/Y') }}</p>
        <p><strong>Vaga aberta até:</strong> {{ $job->open_until->format('d/m/Y') }}</p>
    </div>
    
    <p class="text-sm text-gray-500">
        <strong>Datas:</strong>
        @if ($job->dates->isEmpty())
            <span>Nenhuma data cadastrada</span>
        @else
            <ul class="list-disc text-sm">
                @foreach ($job->dates as $date)
                    <li>{{ $date->work_date->format('d/m/Y') }}</li>
                @endforeach
            </ul>
        @endif
    </p>

    <div class="mt-3 flex gap-2">
        <a href="{{ route('job-offers.edit', $job->id) }}" class="text-blue-600 hover:underline">Editar</a>
        <form action="{{ route('job-offers.destroy', $job->id) }}" method="POST"
            onsubmit="return confirm('Excluir esta vaga?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:underline">Excluir</button>
        </form>
    </div>
</div>
