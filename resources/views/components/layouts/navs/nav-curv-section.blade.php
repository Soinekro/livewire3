<div {{ $attributes->merge(['class' => 'ml-4 flex flex-col space-y-1']) }}>

    <div class="ml-3 text-sm text-gray-600 font-semibold tracki uppercase dark:text-black">
        {{ $title }}
    </div>


    <div class="ml-4 flex flex-col space-y-1">
        {{ $links }}
    </div>
</div>
