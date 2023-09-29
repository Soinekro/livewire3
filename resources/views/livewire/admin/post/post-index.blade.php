<div wire:init="loadPosts" class="p-6 sm:px-20 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
    {{-- filtros --}}
    <div class="flex justify-between">
        <div class="flex items-center">
            <select wire:model.lazy="perPage"
                class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                <option value="5">5 por página</option>
                <option value="10">10 por página</option>
                <option value="15">15 por página</option>
                <option value="25">25 por página</option>
                <option value="50">50 por página</option>
                <option value="100">100 por página</option>
            </select>
            <x-input type="text" class="mt-1 block w-full" placeholder="Buscar" wire:model.lazy="search" />
        </div>
        <div>
            <x-button wire:click="create"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Crear
            </x-button>
        </div>

    </div>
    {{-- tabla con campos title, slug,author, status  --}}
    <div class="mt-4">
        @if (count($posts))
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700">
                        <th class="px-4 py-2 cursor-pointer"
                            wire:click="order('title')">
                            Título

                        </th>
                        <th class="px-4 py-2 cursor-pointer"
                            wire:click="order('published_by')">
                            Slug

                        </th>
                        <th class="px-4 py-2 cursor-pointer"
                            wire:click="order('published_by')">
                            Autor

                        </th>
                        <th class="px-4 py-2 cursor-pointer"
                            wire:click="order('status')">
                            Estado

                        </th>
                        <th class="px-4 py-2">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($posts as $item)
                        <tr>
                            <td class="border px-4 py-2">{{ $item->title }}</td>
                            <td class="border px-4 py-2">{{ $item->slug }}</td>
                            <td class="border px-4 py-2">{{ $item->author->name }}</td>
                            <td class="border px-4 py-2">
                                @if ($item->status == 'published')
                                    <span
                                        class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Publicado</span>
                                @else
                                    <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Borrador</span>
                                @endif
                            </td>
                            <td class="border px-4 py-2">
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
            @if ($posts->hasPages())
                <div class="px-4 py-3 bg-white dark:bg-gray-700 border-t border-gray-200 dark:border-gray-700 sm:px-6">
                    {{ $posts->links() }}
                </div>
            @endif
        @elseif ($posts != [])
            <tr>
                <td colspan="5" class="border px-4 py-2 text-center">No hay ningún registro coincidente</td>
            </tr>
        @else
            {{-- pantalla de carga --}}

            <x-loading />
        @endif
    </div>

    {{-- modal --}}

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            {{ __('Post') }}
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Título del post" />
                <x-input type="text" class="w-full" wire:model="title" />
                <x-input-error for="title" />
            </div>
            <div class="mb-4">
                <x-label value="Explicacion breve del post" />
                <textarea wire:model="excerpt" class="form-control w-full" rows="6"></textarea>
                <x-input-error for="excerpt" />
            </div>
            <div class="mb-4">
                <x-label value="Contenido del post" />
                <textarea wire:model="body" class="form-control w-full" rows="6"></textarea>
                <x-input-error for="body" />
            </div>
            <div class="mb-4">
                <x-label value="Estado del post" />
                <select wire:model="status" class="form-control w-full">
                    <option value="draft">Borrador</option>
                    <option value="published">Publicado</option>
                </select>
                <x-input-error for="status" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click="save">
                Guardar
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

        function confirmDelete(post) {
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
                    @this.call('destroy', post)
                }
            })
        }
    </script>
</div>
