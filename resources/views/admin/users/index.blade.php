<x-layouts.base>
    <nav class="block sm:flex" aria-label="Breadcrumb">
        <ol class=" inline-flex items-center space-x-1 md:space-x-3 ">
            <li class="inline-flex items-center">
                <a href="#"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="#"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Projects</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Flowbite</span>
                </div>
            </li>
        </ol>
    </nav>
    </div>
    <div>
        <h2 class="mt-6 text-xl font-semibold text-gray-700 dark:text-gray-200">Users</h2>
        <button type="button"
            class="mt-6 items-center px-4 py-2 dark:bg-slate-300 h-12 w-12 md:w-20 md:h-20
            shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700
             dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2
             focus:ring-blue-500"
            wire:click="$emit('openModal', 'admin.users.create')">
            <svg fill="#000000" version="1.1" id="Layer_1" class="w-6 h-6 mx-auto" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 328 328" xml:space="preserve">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <g id="XMLID_455_">
                        <path id="XMLID_458_"
                            d="M15,286.75h125.596c19.246,24.348,49.031,40,82.404,40c57.897,0,105-47.103,105-105s-47.103-105-105-105 c-34.488,0-65.145,16.716-84.298,42.47c-7.763-1.628-15.694-2.47-23.702-2.47c-63.411,0-115,51.589-115,115 C0,280.034,6.716,286.75,15,286.75z M223,146.75c41.355,0,75,33.645,75,75s-33.645,75-75,75s-75-33.645-75-75 S181.645,146.75,223,146.75z">
                        </path>
                        <path id="XMLID_461_"
                            d="M115,1.25c-34.602,0-62.751,28.15-62.751,62.751S80.398,126.75,115,126.75 c34.601,0,62.75-28.148,62.75-62.749S149.601,1.25,115,1.25z">
                        </path>
                        <path id="XMLID_462_"
                            d="M193,236.75h15v15c0,8.284,6.716,15,15,15s15-6.716,15-15v-15h15c8.284,0,15-6.716,15-15s-6.716-15-15-15 h-15v-15c0-8.284-6.716-15-15-15s-15,6.716-15,15v15h-15c-8.284,0-15,6.716-15,15S184.716,236.75,193,236.75z">
                        </path>
                    </g>
                </g>
            </svg>
            <h4 class="dark:text-gray-900 hidden md:block text-sm ">
                Create User
            </h4>
        </button>
        {{-- linea de separacion --}}
        <hr class="my-6 border-gray-300 dark:border-gray-700">
        {{-- tabla --}}
        <livewire:user-component />
</x-layouts.base>
