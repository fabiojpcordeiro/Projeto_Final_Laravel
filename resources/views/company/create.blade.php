@extends('layouts.main')
@section('content')
    <div class="mt-24">

        <h1>Preencha os dados de sua empresa para começar a anunciar.</h1>
        <div>
            <form action="{{ route('storeCompany') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div>
                    <label for="name">Nome da Empresa</label>
                    <input type="text" id="name" name="name" required>
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror

                </div>
                <div>
                    <label for="public_email">Email publico</label>
                    <input type="email" id="public_email" name="public_email" required>
                    @error('public_email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    @livewire('location-select')
                </div>
                <div>
                    <label for="street">Rua</label>
                    <input type="text" id="street" name="street" required>
                    @error('street')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="number">Numero</label>
                    <input type="text" id="number" name="number" required>
                    @error('number')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="sector">Setor de Atuação</label>
                    <input type="text" id="sector" name="sector" required>
                    @error('sector')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="about" class="block text-left">Fale sobre a empresa (opcional)</label>
                    <textarea name="about" id="about" rows="3" class="block"></textarea>
                    @error('about')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="logo">Adicione o logo da empresa (opcional)</label>
                    <input type="file" name="logo" id="logo">
                    @error('logo')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
@endsection
