@extends('layouts.main')
@section('content')
    <div class="max-w-7xl my-10 mx-auto bg-blue-500 shadow-lg rounded-xl p-8 border">

        <h2 class="text-3xl font-semibold text-gray-800 mb-2">
            {{ $job->title }}
        </h2>

        <p class="text-sm text-gray-800 mb-4">
            {{ $job->city }} • {{ $job->sector }} • R$ {{ number_format($job->salary, 2, ',', '.') }}
        </p>

        <hr class="my-6">

        <h3 class="text-xl font-semibold text-gray-800 mb-4">Candidatos</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse ($job->candidates as $candidate)
                @include('components.my_components.job_candidate_card', ['candidate' => $candidate])
            @empty
                <p class="text-gray-600 text-center col-span-full py-6">
                    Nenhum candidato aplicou para esta vaga ainda.
                </p>
            @endforelse
        </div>

    </div>
@endsection
