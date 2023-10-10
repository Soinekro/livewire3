<!-- resources/views/components/forms/button.blade.php -->

@props(['color' => 'blue'])

<button
    {{ $attributes->merge([
        "class" => "mt-6 items-center px1 py-1 dark:bg-slate-300 py-1 px-2 border border-gray-800
        shadow-sm text-sm font-medium rounded-md text-white
         dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2
         focus:ring-$color-500",
    ]) }}>
    {{ $icon ?? '' }}
    <h5 class="text-gray-600 dark:text-gray-900 hidden md:block text-sm">
        {{ $slot }}
    </h5>
</button>
