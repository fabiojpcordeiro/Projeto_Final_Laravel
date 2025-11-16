@extends('layouts.main')
@section('content')
    <div class="section">
        @if (session('error'))
        <p class="alert alert-danger">
            {{ session('error') }}
        </p>
        @endif
        @if (Auth::user()->company_id)
            @livewire('dashboard')
        @else
            <h2>Parece que você ainda não cadastrou a sua empresa, vamos começar?</h2>
            <a class="simple-button bg-green-500" href="{{ route('company.create') }}">
                <button class="w-32 mt-5 font-bold">
                    Cadastrar
                </button>
            </a>
        @endif
    </div>
@endsection
