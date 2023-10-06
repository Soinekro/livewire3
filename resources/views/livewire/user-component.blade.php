<div wire:init="loadUsers">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex">
            <div class="flex sm:items-center w-full">
                <select wire:model.lazy="perPage"
                    class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300
                            focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700
                            dark:text-gray-300 dark:border-gray-600 hidden xs:block ">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <x-forms.input type="text" class="mx-2 sm:mx-1 md:w-2/3 dark:text-black" placeholder="Buscar"
                    wire:model.lazy="search" />
            </div>
        </div>
        @if (count($users))
            <table
                class="table-fixed w-full mt-3 block md:table min-w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead
                    class="hidden md:table-header-group text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr
                        class="bg-gray-100 dark:bg-gray-700 text-white border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                        <th class="px-4 py-2 cursor-pointer" wire:click="order('name')">
                            Nombre
                        </th>
                        <th class="px-4 py-2 cursor-pointer" wire:click="order('points')">
                            Puntos
                        </th>
                        <th class="px-4 py-2">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="block md:table-row-group">
                    @php
                        $num = 0;
                    @endphp
                    @foreach ($users as $item)
                        @php
                            $num = ++$num;
                        @endphp
                        <tr
                            class="@if ($num % 2 == 0) dark:bg-gray-200 dark:text-black  @else dark:bg-gray-600 dark:text-white @endif
                            block md:table-row dark:border-t dark:border-gray-600
                            dark:border-t-gray-300">

                            <td class="py-2 px-2 block md:table-cell">
                                <div class="inline-block w-1/3 md:hidden font-bold">
                                    Nombres
                                </div>
                                <div>{{ $item->getFullNameAttribute() }}</div>
                            </td>
                            <td class="py-2 block md:table-cell">
                                <div class="inline-block w-1/3 md:hidden font-bold">
                                    Puntos
                                </div>
                                <div>
                                    <span
                                        class="inline-block px-2 text-sm font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                        {{ $item->points }}

                                    </span>
                                </div>

                            </td>
                            <td class="py-2 block md:table-cell">
                                <x-button wire:click="edit({{ $item->id }})" type="button"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Editar
                                </x-button>
                                <x-button onclick="confirmDelete('{{ $item->id }}')" type="button"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Eliminar
                                </x-button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            @if ($users->hasPages())
                <div class="px-4 py-3 bg-black dark:bg-white border-t border-gray-200 dark:border-gray-700 md:px-6">
                    {{ $users->links() }}
                </div>
            @endif
        @elseif ($users != [])
            <tr>
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                    <p class="font-bold">No hay usuarios registrados.</p>
                    <p>Por favor, crea un usuario para empezar.</p>
                </div>
            </tr>
        @else
            {{-- pantalla de carga --}}

            <div>
                <style>
                    .loader-dots div {
                        animation-timing-function: cubic-bezier(0, 1, 1, 0);
                    }

                    .loader-dots div:nth-child(1) {
                        left: 8px;
                        animation: loader-dots1 0.6s infinite;
                    }

                    .loader-dots div:nth-child(2) {
                        left: 8px;
                        animation: loader-dots2 0.6s infinite;
                    }

                    .loader-dots div:nth-child(3) {
                        left: 32px;
                        animation: loader-dots2 0.6s infinite;
                    }

                    .loader-dots div:nth-child(4) {
                        left: 56px;
                        animation: loader-dots3 0.6s infinite;
                    }

                    @keyframes loader-dots1 {
                        0% {
                            transform: scale(0);
                        }

                        100% {
                            transform: scale(1);
                        }
                    }

                    @keyframes loader-dots3 {
                        0% {
                            transform: scale(1);
                        }

                        100% {
                            transform: scale(0);
                        }
                    }

                    @keyframes loader-dots2 {
                        0% {
                            transform: translate(0, 0);
                        }

                        100% {
                            transform: translate(24px, 0);
                        }
                    }
                </style>
                <div class="fixed top-0 left-0 z-50 w-screen h-screen flex items-center justify-center"
                    style="background: rgba(0, 0, 0, 0.3);">
                    <div class="bg-white border py-2 px-5 rounded-lg flex items-center flex-col">
                        <div class="loader-dots block relative w-20 h-5 mt-2">
                            <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-green-500"></div>
                            <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-green-500"></div>
                            <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-green-500"></div>
                            <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-green-500"></div>
                        </div>
                        <div class="text-gray-500 text-xs font-light mt-2 text-center">
                            Please wait...
                        </div>
                    </div>
                </div>
            </div>

        @endif
    </div>

    {{-- modal --}}

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            {{ __('Update User') }}
        </x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="name" class="dark:text-gray-300">Nombre</label>
                        <input type="text" wire:model="name" id="name" class="block mt-1 w-full"
                            placeholder="Nombre" />
                        @error('name')
                            <label for="outlined_error"
                                class="text-sm text-red-600 dark:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                {{ $message }}
                            </label>
                        @enderror
                </div>
                <div class="mb-4">
                    <label for="apellido_paterno" class="dark:text-gray-300">Apellido</label>
                        <input type="text" wire:model="apellido_paterno" id="apellido_paterno" class="block mt-1 w-full"
                            placeholder="Apellido" />
                        @error('apellido_paterno')
                            <label for="outlined_error"
                                class="text-sm text-red-600 dark:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                {{ $message }}
                            </label>
                        @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="dark:text-gray-300">Email</label>
                        <input type="email" wire:model="email" id="email" class="block mt-1 w-full"
                            placeholder="Email" />
                        @error('email')
                            <label for="outlined_error"
                                class="text-sm text-red-600 dark:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                {{ $message }}
                            </label>
                        @enderror
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click="update">
                {{ __('Update') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>



    {{-- scripts --}}
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('alert', (event) => {
                Swal.fire({
                    position: 'top-end',
                    icon: event[0].icon,
                    title: event[0].message,
                    showConfirmButton: false,
                    timer: 1500
                })
            });
        });

        function confirmDelete(user) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('destroy', user)
                }
            })
        }
    </script>
</div>
