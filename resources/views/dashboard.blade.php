<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                {{-- llamamos al componente layouts.table --}}
                <x-layouts.table.table>
                    <x-slot name="head">
                        <x-layouts.table.th-head>
                            Product Name
                        </x-layouts.table.th-head>
                        <x-layouts.table.th-head>
                            Color
                        </x-layouts.table.th-head>
                        <x-layouts.table.th-head>
                            Category
                        </x-layouts.table.th-head>
                        <x-layouts.table.th-head>
                            Price
                        </x-layouts.table.th-head>
                        <x-layouts.table.th-head>
                            Action
                        </x-layouts.table.th-head>
                    </x-slot>
                    <x-slot name="body">
                        <x-layouts.table.tr-body>
                            <x-layouts.table.td-body-firts>
                                <span class="inline-block w-1/3 md:hidden font-bold">
                                    Product Name
                                </span>
                                Apple MacBook Pro 17"
                                </x-layouts.table.td-body>
                                <x-layouts.table.td-body>
                                    <span class="inline-block w-1/3 md:hidden font-bold">
                                        Color
                                    </span>
                                    Silver
                                </x-layouts.table.td-body>
                                <x-layouts.table.td-body>
                                    <span class="inline-block w-1/3 md:hidden font-bold">
                                        Category
                                    </span>
                                    Laptop
                                </x-layouts.table.td-body>
                                <x-layouts.table.td-body>
                                    <span class="inline-block w-1/3 md:hidden font-bold">
                                        Price
                                    </span>
                                    $2999
                                </x-layouts.table.td-body>
                                <x-layouts.table.td-body>
                                    <span class="inline-block w-1/3 md:hidden font-bold">
                                        Action
                                    </span>
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </x-layouts.table.td-body>
                        </x-layouts.table.tr-body>
                        <x-layouts.table.tr-body>
                            <x-layouts.table.td-body-firts>
                                <span class="inline-block w-1/3 md:hidden font-bold">
                                    Product Name
                                </span>
                                Apple MacBook Pro 17"
                            </x-layouts.table.td-body-firts>
                            <x-layouts.table.td-body>
                                <span class="inline-block w-1/3 md:hidden font-bold">
                                    Color
                                </span>
                                Silver
                            </x-layouts.table.td-body>

                            <x-layouts.table.td-body>
                                <span class="inline-block w-1/3 md:hidden font-bold">
                                    Category
                                </span>
                                Laptop
                            </x-layouts.table.td-body>
                            <x-layouts.table.td-body>
                                <span class="inline-block w-1/3 md:hidden font-bold">
                                    Price
                                </span>
                                $2999
                            </x-layouts.table.td-body>
                            <x-layouts.table.td-body>
                                <span class="inline-block w-1/3 md:hidden font-bold">
                                    Action
                                </span>
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </x-layouts.table.td-body>
                        </x-layouts.table.tr-body>
                    </x-slot>
                </x-layouts.table.table>
            </div>

        </div>
</x-app-layout>
