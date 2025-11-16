<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Occupy</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>

    <nav class=
        "flex gap-16 justify-between w-full h-24 py-2 px-4 box-border
         text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700
         fixed top-0 z-50 rounded-b-xl">
        {{-- LOGO --}}
        <div class="flex w-[15%] h-20 ml-10 bg-white rounded-xl">
            <x-my_components.logo>
            </x-my_components.logo>
        </div>
        {{-- Search Bar --}}
        <div class="mx-6 h-20 w-[35%] flex items-center text-black font-semibold">
            <form action="{{ route('home.search') }}" method="GET" class="w-full flex gap-3">
                <input type="search" id="search" name="q" placeholder="Procure por profissionais"
                    class="w-full text-left rounded-md">
                <button type="submit"
                    class="bg-white text-blue-500 font-bold w-20 rounded-xl hover:bg-blue-500 hover:text-white hover:border-2">Buscar</button>
            </form>
        </div>
        {{-- Links --}}
        @if (Auth::user()->company)
            <div class="flex gap-20 h-20 items-center text-xl">
                <a href="{{ route('job-offers.index') }}">Minhas Vagas</a>
                <a href="{{ route('company.show', Auth::user()->company) }}">Empresa</a>
            </div>
        @endif
        {{-- Profile --}}
        <div>
            <a href="{{ route('profile') }}" class="h-full w-16 mx-10 flex items-center font-semibold">
                <img src="{{ asset('images/icons/user.svg') }}" alt="Profile picture">
                <p>{{ auth()->user()->name }}</p>
            </a>
        </div>
        {{-- Logout --}}
        <div class="py-6">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-center">Sair</button>
            </form>
        </div>
    </nav>
    </div>
    <div class="main-body">
        <x-my_components.session-messages>
        </x-my_components.session-messages>
        
        @yield('content')
        @livewireScripts()
</body>
