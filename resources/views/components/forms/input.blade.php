<div class="mb-4">
    <label for="{{ $id }}" class="block text-xs font-medium text-gray-400">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}"
        placeholder="{{ $placeholder ?? '' }}"
        {{ $attributes->merge([
            'class' =>
                'box-border mt-1 block w-full px-3 py-2  bg-gray-200  placeholder-gray-400 text-gray-600 transition-all duration-300  focus:outline-none focus:ring-purple-500 focus:pl-4 focus:border-purple-500 sm:text-sm',
        ]) }}>
</div>
