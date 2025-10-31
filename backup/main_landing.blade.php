<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Empresa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="overflow-hidden w-screen h-screen">
    {{-- Background image --}}
    <div class="absolute inset-0 bg-cover bg-top opacity-60 z-0" style="background-image: url('/images/landing-4.jpg');">
    </div>
    @yield('slot')
    @livewireScripts
</body>
</html>
