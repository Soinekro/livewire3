<!-- resources/views/components/forms/button.blade.php -->

@props(['color' => 'white'])

<input {{ $attributes->merge(['class' => "mx-2 bg-$color-500 hover:bg-$color-600 text-white font-bold py-2 px-4 rounded"]) }}>
