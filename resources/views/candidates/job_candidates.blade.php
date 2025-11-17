@extends('layouts.main')
@section('content')
    <div class="max-w-7xl min-w-[80rem] my-10 mx-auto bg-blue-500 shadow-lg rounded-xl p-8 border">
        <h2 class="text-3xl font-semibold text-gray-800 mb-2">
            {{ $job->title }}
        </h2>

        <p class="text-sm text-gray-800 mb-4">
            {{ $job->city }} • {{ $job->sector }} • R$ {{ number_format($job->salary, 2, ',', '.') }}
        </p>

        <hr class="my-6">

        <h3 class="text-xl font-semibold text-gray-800 mb-4">Candidatos</h3>

        <div class="flex flex-wrap gap-6 justify-center">
            @forelse ($job->candidates as $candidate)
                <div class="bg-gray-50 h-96 w-[30%] border rounded-xl p-2 shadow-sm my-6 flex flex-col content-evenly relative">
                    @include('components.my_components.job_candidate_card', ['candidate' => $candidate])
                </div>
            @empty
                <p class="text-gray-600 text-center col-span-full py-6">
                    Nenhum candidato aplicou para esta vaga ainda.
                </p>
            @endforelse
        </div>

    </div>
@endsection
