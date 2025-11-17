@extends('layouts.main')
@section('content')
    <div class="section">
        @if (session('error'))
            <p class="alert alert-danger">{{ session('error') }}</p>
        @endif

        @if (Auth::user()->company_id)

            <h2 class="text-2xl font-semibold mb-4">Candidatos</h2>
            @isset($query)
                <p class="text-lg text-white mb-4">
                    Resultados para: <strong>{{ $query }}</strong>
                </p>
            @endisset

            @if ($candidates->isEmpty())
                <p>Nenhum candidato encontrado.</p>
            @else
                <div class="flex flex-wrap gap-6 justify-center">
                    @foreach ($candidates as $candidate)
                        <div
                            class="bg-slate-500 shadow-md rounded-xl p-5 h-96 w-1/5 border flex flex-col justify-between items-center">
                            <div class="flex flex-col items-center gap-4 mb-4">
                                <img src="{{ $candidate->profile_photo 
                                ? asset('storage/' . $candidate->profile_photo) 
                                : asset('images/icons/user.svg') }}"
                                    class="w-20 h-20 rounded-full object-cover border">
                                <div>
                                    <h3 class="text-xl font-medium text-gray-800">{{ $candidate->name }}</h3>
                                    <p class="text-lg text-white">{{ $candidate->email }}</p>
                                    <p class="text-lg text-white">{{ $candidate->phone }}</p>
                                </div>
                            </div>

                            <p class="text-lg text-white mt-2">
                                <strong>Bio:</strong> {{ $candidate->bio ?? 'Não informado' }}
                            </p>
                            <p class="text-sm text-white mt-3">
                                Cidade: {{ $candidate->city->name ?? '—' }}
                            </p>
                            @if ($candidate->resume)
                                <a href="{{ route('resume.view', $candidate->id) }}" target="_blank"
                                    class="text-sm bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                    Ver Currículo
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $candidates->links() }}
                </div>
            @endif
        @else
            <h2>Parece que você ainda não cadastrou a sua empresa, vamos começar?</h2>
            <a class="simple-button bg-green-500" href="{{ route('company.create') }}">
                <button class="w-32 mt-5 font-bold">Cadastrar</button>
            </a>
        @endif

    </div>
@endsection
