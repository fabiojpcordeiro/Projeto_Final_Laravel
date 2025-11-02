@extends('layouts.main')
@section('content')
    <div>

        @if ($jobs->count() == 0)
            <div>
                <h2>Parece que você ainda não publicou nenhuma vaga, vamos começar?</h2>
                <a href="{{ route('job-offers.create') }}">
                    <button>Criar vaga</button>
                </a>
            </div>
        @else
            <div>
                <a href="{{ route('job-offers.create') }}">
                    <button type="button">Criar nova vaga</button>
                </a>
            </div>
            @foreach ($jobs as $job)
                @include('components.my_components.job-card')
            @endforeach
        @endif


    </div>
@endsection
