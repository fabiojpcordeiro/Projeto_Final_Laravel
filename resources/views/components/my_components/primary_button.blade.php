<button 
    @props(['type' => 'button'])
    {{ $attributes->merge([
        'class' => "p-2 text-center align-middle font-semibold w-[40%] bg-blue-500 text-white 
                        rounded-xl text-2xl transition ease-in-out duration-150
                        hover:bg-white hover:text-blue-500 hover:scale-105",
    ]) }}>
    {{ $slot }}
</button>
