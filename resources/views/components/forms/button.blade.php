<button type="{{ $type }}"
    {{ $attributes->merge([
        'class' => '
                cursor-pointer 
                py-4 
                px-6 border 
                border-transparent 
                rounded-full 
                uppercase 
                text-sm 
                font-medium                  
                main-text-color 
                bg-gradient-to-r 
                from-purple-600 
                to-purple-800 
                hover:from-purple-700 
                hover:to-purple-900 
                focus:outline-none 
                focus:ring-2 focus:ring-offset-2 
                focus:ring-purple-500',
    ]) }}>
    {{ $slot }}
</button>
