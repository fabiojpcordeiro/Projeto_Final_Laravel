@extends('layouts.main')
@section('content')
    <div class="section">
        @if ($jobs->count() == 0)
            <div>
                <h2 class="section-title">Parece que você ainda não publicou nenhuma vaga, vamos começar?</h2>
                <a href="{{ route('job-offers.create') }}">
                    <button type="button" class="mt-3 simple-button text-2xl">Criar uma vaga</button>
                </a>
            </div>
        @else
            <div class="text-right">
                <a href="{{ route('job-offers.create') }}" class="simple-button text-right">
                    <button type="button">Criar nova vaga</button>
                </a>
            </div>
            <div class="py-4 px-2 flex flex-col gap-4">
                @foreach ($jobs as $job)
                    @include('components.my_components.job-card')
                @endforeach
            </div>
        @endif
    </div>
@endsection
