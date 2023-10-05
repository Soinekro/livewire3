@props(['active'])

@php
    $classes = $active ?? false ? 'items-center text-sm text-white font-semibold bg-gray-800 dark:bg-gray-700 px-3 py-2 rounded-md' : 'items-center text-sm text-gray-300 hover:bg-gray-700 hover:text-white font-semibold px-3 py-2 rounded-md';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
