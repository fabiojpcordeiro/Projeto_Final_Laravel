@extends('layouts.guest')
@section('content')
    {{-- Info Card --}}
    <div id="landing" class="relative h-[90%] w-[40%] bg-black m-10 ml-24 rounded-xl z-10 opacity-80">
        <div class="text-white text-center p-10">
            <div id="logo" class="h-24 w-full">
                <x-my_components.logo> </x-my_components.logo>
            </div>

            <p class="text-5xl ">Bem vindo à <span class="text-blue-500 font-bold">/nome/</span>!</p>

            <h1 class="text-3xl mt-10">Procurando mão de obra temporária para seu negócio?</h1>
            <h2 class="text-2xl mt-3">
                Somos a /nome/ e estamos aqui para conectar negócios que precisam de mão de obra
                extra com pessoas em busca de renda extra e oportunidades para mostrar o que sabem!
            </h2>

            <p class="text-2xl mt-3">Cadastre sua empresa e comece a anunciar!</p>

            <div class="flex justify-evenly mt-6 text-2xl">
                <x-my_components.primary_button>
                    <a href="{{ route('register') }}" class="block w-full h-full text-center align-middle">Cadastrar</a>
                </x-my_components.primary_button>

                <x-my_components.primary_button>
                    <a href="{{ route('login') }}" class="block w-full h-full text-center align-middle">Já tenho uma conta</a>
                </x-my_components.primary_button>
            </div>

            <div class="mt-4 ">
                Procurando por vagas temporárias?
                <br>
                Baixe nosso app na
                <a href="https://play.google.com/" target="blank" class="text-blue-500">PlayStore</a>
                ou
                <a href="https://www.apple.com/br/store" target="blank" class="text-blue-500">AppleStore</a>
            </div>
        </div>
    </div>
@endsection
