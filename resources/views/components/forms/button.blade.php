<button type="{{ $type }}"
    {{ $attributes->merge(['class' => 'cursor-pointer py-2 px-4 border border-transparent rounded-full uppercase text-sm font-medium text-white main-text-color bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500']) }}>
    {{ $slot }}
</button>
