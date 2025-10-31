@extends('layouts.main_landing')
@section('slot')
    {{-- Info Card --}}
    <div id="landing" class="hidden relative h-[90%] w-[40%] bg-black m-10 ml-24 rounded-xl z-10 opacity-80">
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
                <x-my_components.primary_button class="flex">
                    Cadastrar
                </x-my_components.primary_button>

                <x-my_components.primary_button class="flex">
                    Já tenho uma conta
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
    {{-- LOGIN --}}
    <div id="login" class="flex justify-center items-center text-center w-screen h-screen text-white font-semibold">
        <div class="p-14 justify-center bg-black opacity-80 h-[80%] w-[40%] rounded-xl">

            <x-my_components.logo> </x-my_components.logo>

            <h2 class="my-4 font-bold text-3xl">Entrar</h2>
            
            <form livewire:submit.prevent="authenticate" id="login-form">
                @csrf
                <div class="mb-4 flex flex-col">
                    <label for="email">Email</label>
                    <input wire:model="form.email" type="email" id="email" name="email" class="form-input rounded-xl text-black" required>
                </div>
                <div class="mb-4 flex flex-col">
                    <label for="password">Senha</label>
                    <input wire:model="form.password" type="password" id="password" name="password" class="form-input rounded-xl text-black" required>
                </div>
                <label class="gap-2 mb-4">
                    <input wire:model="form.remember" type="checkbox" name="remember" class="text-blue-500">
                    Manter-me conectado
                </label>
                <x-my_components.primary_button type="submit" class="w-full mt-4">Entrar</x-my_components.primary_button>
            </form>
            <p class="mt-4">Esqueceu sua senha? <a href="#" class="hover:underline hover:text-blue-500">Clique
                    aqui.</a></p>
        </div>
    </div>

    {{-- Register --}}
    <div id="register"
        class="hidden flex justify-center items-center text-center w-screen h-screen text-white font-semibold">
        <div class="p-14 justify-center bg-black opacity-80 h-[80%] w-[40%] rounded-xl">
            <x-my_components.logo> </x-my_components.logo>
            <h2 class="my-4 font-bold text-3xl">Registrar</h2>
            <form action="" id="register-form" method="POST">
                @csrf
                <div class="mb-4 flex flex-col">
                    <label for="name">Nome</label>
                    <input type="text" id="name" name="name" class="form-input rounded-xl text-black" required>
                </div>
                <div class="mb-4 flex flex-col">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-input rounded-xl text-black" required>
                </div>
                <div class="mb-4 flex flex-col">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" class="form-input rounded-xl text-black" required>
                </div>
                <div class="mb-4 flex flex-col">
                    <label for="password_confirmation">Confirme sua senha</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="form-input rounded-xl text-black" required>
                </div>
                <x-my_components.primary_button type="submit"
                    class="w-full mt-4">Registrar</x-my_components.primary_button>
            </form>

            {{-- Password Recovery --}}

        </div>
    </div>
@endsection
