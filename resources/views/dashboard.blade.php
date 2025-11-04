@extends('layouts.main')
@section('content')
    <div class="section">
        @if (session('error'))
        <p class="alert alert-danger">
            {{ session('error') }}
        </p>
        @endif
        @if (Auth::user()->company_id)
            <h2>Bem vindo a sua empresa</h2>
        @else
            <h2>Parece que você ainda não cadastrou a sua empresa, vamos começar?</h2>
            <a href="{{ route('company.create') }}">
                <button>
                    Cadastrar
                </button>
            </a>
        @endif
    </div>
@endsection
