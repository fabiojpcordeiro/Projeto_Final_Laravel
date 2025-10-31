@extends('layouts.main')
@section('content')
    <div class="mt-24">

        <h1>Preencha os dados de sua empresa para começar a anunciar.</h1>
        <div>
            <form action="{{ route('first-store') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <ul>
                    <li>{{ $error}}</li>
                </ul>
                    
                @endforeach
                    
                @endif
                <div>
                    <label for="name">Nome da Empresa</label>
                    <input type="text" id="name" name="name" required>
                    @error('name')
                        <p>erro no nome</p>
                    @enderror

                </div>
                <div>
                    <label for="public_email">Email publico</label>
                    <input type="email" id="public_email" name="public_email" required>
                    @error('name')
                        <p>erro no nome</p>
                    @enderror
                </div>
                <div>
                    @livewire('location-select')
                </div>
                <div>
                    <label for="sector">Setor de Atuação</label>
                    <input type="text" id="sector" name="sector" required>
                    @error('name') <p>erro no nome</p> @enderror
                </div>
                <div>
                    <label for="about" class="block text-left">Fale sobre a empresa (opcional)</label>
                    <textarea name="about" id="about" rows="3" class="block"></textarea>
                </div>
                <div>
                    <label for="logo">Adicione o logo da empresa (opcional)</label>
                    <input type="file" name="logo" id="logo">
                </div>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
@endsection
