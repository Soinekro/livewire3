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
                class="table-fixed w-full mt-3 block md:table min-w-full text-sm text-left text-gray-500
                dark:text-gray-400">
                <thead
                    class="hidden md:table-header-group text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700
                     dark:text-gray-400">
                    <tr
                        class="bg-gray-100 dark:bg-gray-700 text-white border border-grey-500
                        md:border-none block md:table-row absolute -top-full md:top-auto -left-full
                        md:left-auto  md:relative ">
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
                            class="@if ($num % 2 == 0) dark:bg-gray-200 dark:text-black
                            @else dark:bg-gray-600 dark:text-white @endif
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
                                        class="inline-block px-2 text-sm font-semibold leading-5
                                        text-green-800 bg-green-100 rounded-full">
                                        {{ $item->points }}

                                    </span>
                                </div>

                            </td>
                            <td class="py-2 block md:table-cell">
                                <x-forms.button color="blue" type="button" wire:click="edit({{ $item->id }})">
                                    <x-slot name="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="w-6 h-6 mx-auto"
                                            viewBox="0 0 640 512">
                                            <path
                                                d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                        </svg>
                                    </x-slot>
                                </x-forms.button>
                                <x-forms.button color="red" type="button"
                                    onclick="confirmDelete('{{ $item->id }}')">
                                    <x-slot name="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="w-6 h-6 mx-auto"
                                            viewBox="0 0 448 512">
                                            <path
                                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                        </svg>
                                    </x-slot>
                                </x-forms.button>
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
            {{-- <div class="grid grid-cols-1 md:grid-cols-2 gap-4"> --}}

            <div class="grid md:grid-cols-3 md:gap-4">
                <div class="relative z-0 w-64 mb-6 group">
                    <input type="radio" name="document_type" value="dni" wire:model.live="document_type"
                        class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300
                        dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700
                            dark:border-gray-600"
                        checked>
                    <label for="country-option-1"
                        class="block ml-2 text-sm font-medium
                            text-gray-900 dark:text-gray-300">
                        DNI
                    </label>
                    <input type="radio" name="document_type" value="ruc" wire:model.live="document_type"
                        class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300
                            dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700
                            dark:border-gray-600">
                    <label for="country-option-1"
                        class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        RUC
                    </label>
                    @error('document_type')
                        <label for="outlined_error"
                            class="text-sm text-red-600 dark:text-red-500 duration-300 transform
                            -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900
                            px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2
                            peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                            {{ $message }}
                        </label>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group mx-2">
                    <input type="text" name="document_number" id="document_number" autocomplete="off"
                        wire:model="document_number"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900
                                        bg-transparent border-0 border-b-2 border-gray-300
                                        appearance-none dark:text-white dark:border-gray-600
                                        dark:focus:border-blue-500 focus:outline-none focus:ring-0
                                        focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="document_number"
                        class="peer-focus:font-medium absolute text-sm text-gray-500
                            dark:text-gray-400 duration-300 transform -translate-y-6 scale-75
                            top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600
                            peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100
                            peer-placeholder-shown:translate-y-0 peer-focus:scale-75
                            peer-focus:-translate-y-6">{{ __('Document Number(87654321)') }}
                    </label>
                    @error('document_number')
                        <label for="outlined_error"
                            class="text-sm text-red-600 dark:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                            {{ $message }}
                        </label>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <button type="button" wire:click="searchDocument"
                        class="{{-- m-auto  --}}px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">
                        Search
                    </button>
                </div>

            </div>

            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="name" id="name" autocomplete="off" wire:model="name"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900
                            bg-transparent border-0 border-b-2 border-gray-300
                            appearance-none dark:text-white dark:border-gray-600
                            dark:focus:border-blue-500 focus:outline-none focus:ring-0
                            focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="name"
                    class="peer-focus:font-medium absolute text-sm text-gray-500
                             dark:text-gray-400 duration-300 transform -translate-y-6 scale-75
                             top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600
                             peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100
                             peer-placeholder-shown:translate-y-0 peer-focus:scale-75
                             peer-focus:-translate-y-6">Nombres
                    (Ex. John Doe)
                </label>
                @error('name')
                    <label for="outlined_error"
                        class="text-sm text-red-600 dark:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                        {{ $message }}
                    </label>
                @enderror
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="floating_phone"
                        id="floating_phone"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_phone"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone
                        number (987654321)</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="floating_company" id="floating_company"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_company"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Company
                        (Ex. Google)</label>
                </div>
            </div>
            {{-- </div> --}}
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
        // Obtén una referencia al input y los radio buttons
        const numeroInput = document.getElementById('document_number');
        const radioOptions = document.getElementsByName('document_type');
        let limite = 8;
        // Agrega un evento de escucha al cambio en los radio buttons
        radioOptions.forEach(radio => {
            radio.addEventListener('change', () => {
                const limiteDigitos = radio.value == 'dni' ? 8 : 11;
                numeroInput.maxLength = limiteDigitos; // Actualiza el valor del atributo maxlength
                numeroInput.value = ''; // Limpia el valor actual del input
                limite = limiteDigitos;
            });
        });

        numeroInput.addEventListener('input', (e) => {
            const input = e.target;
            const limiteDigitos = limite;
            const valor = input.value.replace(/\D/g, ''); // Elimina caracteres no numéricos
            if (valor.length > limiteDigitos) {
                input.value = valor.slice(0, limiteDigitos); // Limita la entrada a `limiteDigitos` dígitos
            }
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
            /* document.addEventListener('livewire:initialized', () => {
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


            */
        }
    </script>
</div>
