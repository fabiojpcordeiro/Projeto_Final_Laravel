<div class="mt-6 w-full items-center text-center">
    @if (session('success'))
        <div class= "bg-green-500 text-white p-4 rounded-lg shadow-lg w-1/6 justify-self-center opacity-80">
            <p class="font-semibold text-sm">Sucesso!</p>
            <p class="text-sm mt-1">
                {{ session('success') }}
            </p>
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-500 text-white p-4 rounded-lg shadow-lg w-1/6 justify-self-center opacity-80 message-animation">
            <p class="font-semibold text-sm">Erro!</p>
            <p class="text-sm mt-1">
                {{ session('error') }}
            </p>
        </div>
    @endif
</div>