<!-- resources/views/components/forms/button.blade.php -->

@props(['color' => 'blue'])

<button {{ $attributes->merge(['class' => "bg-$color-500 hover:bg-$color-600 text-white font-bold py-2 px-4 rounded"]) }}>
    {{ $slot }}
</button>
