<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="w-full sm:px-6 lg:p-8 block md:flex md:flex-row">
        <!-- formulario para filtar por departamento, provincia, distrito y fecha-->
        <div class="shadow-md sm:rounded-lg m-3 p-4 sm:basis-3/4">
            <form method="POST" action="#" class="m-2">
                @csrf
                <div class="grid grid-cols-1 xs:grid-cols-2 xl:grid-cols-3">
                    <div class="block p-2 border-2 bg-verde-400 m-2 rounded-md">
                        <label for="department" class="text-white font-bold">Department:</label>
                        <select name="department" id="department"
                            class="peer select-none cursor-pointer rounded-lg border-2 text-center w-full text-white bg-verde-600 peer-disabled:opacity-20 peer-disabled:cursor-no-drop border-gray-500 py-2 px-1 font-bold transition-colors duration-200 ease-in-out peer-checked:bg-yellow-200 peer-checked:text-gray-800 peer-checked:border-yellow-900">
                            <option value="" disabled selected>Select department</option>
                            <option value="department1">Department 1</option>
                            <option value="department2">Department 2</option>
                            <option value="department3">Department 3</option>
                        </select>
                    </div>
                    <div class="block p-2 border-2 bg-verde-400 m-2 rounded-md">
                        <label for="province" class="text-white font-bold">Province:</label>
                        <select name="province" id="province"
                            class="peer select-none cursor-pointer rounded-lg border-2 text-center w-full text-white bg-verde-600 peer-disabled:opacity-20 peer-disabled:cursor-no-drop border-gray-500 py-2 px-1 font-bold transition-colors duration-200 ease-in-out peer-checked:bg-yellow-200 peer-checked:text-gray-800 peer-checked:border-yellow-900">
                            <option value="" disabled selected>Select province</option>
                            <option value="province1">Province 1</option>
                            <option value="province2">Province 2</option>
                            <option value="province3">Province 3</option>
                        </select>
                    </div>
                    <div class="block p-2 border-2 bg-verde-400 m-2 rounded-md">
                        <label for="district" class="text-white font-bold">District:</label>
                        <select name="district" id="district"
                            class="peer select-none cursor-pointer rounded-lg border-2 text-center w-full text-white bg-verde-600 peer-disabled:opacity-20 peer-disabled:cursor-no-drop border-gray-500 py-2 px-1 font-bold transition-colors duration-200 ease-in-out peer-checked:bg-yellow-200 peer-checked:text-gray-800 peer-checked:border-yellow-900">
                            <option value="" disabled selected>Select district</option>
                            <option value="district1">District 1</option>
                            <option value="district2">District 2</option>
                            <option value="district3">District 3</option>
                        </select>
                    </div>
                    <div class="block p-2 border-2 bg-verde-400 m-0.5 md:m-1 lg:m-2 rounded-md">
                        <label for="date" class="text-white font-bold">Date:</label>
                        <input type="date" name="date" id="date"
                            class="peer select-none cursor-pointer rounded-lg border-2 text-center w-full text-white bg-verde-600 peer-disabled:opacity-20 peer-disabled:cursor-no-drop border-gray-500 py-2 px-1 font-bold transition-colors duration-200 ease-in-out peer-checked:bg-yellow-200 peer-checked:text-gray-800 peer-checked:border-yellow-900">
                    </div>
                    <!-- horas y medias horas-->
                    <div class="block md:flex p-2 border-2 bg-verde-400 m-2 rounded-md">
                        <label {{-- for="tiempo"  --}}class="text-white font-bold">
                            Time:
                        </label>
                        <div class="flex m-2">
                            <input type="radio" name="tiempo" id="hours" value="hours" class="peer hidden"
                                checked />
                            <label for="hours"
                                class="select-none cursor-pointer rounded-lg
                                    border-2 text-center w-full text-white bg-verde-600
                                    peer-disabled:opacity-20 peer-disabled:cursor-no-drop
                                    border-gray-500 py-2 px-1 font-bold transition-colors
                                    duration-200 ease-in-out peer-checked:bg-yellow-200
                                    peer-checked:text-gray-800 peer-checked:border-yellow-900">
                                Hours
                            </label>
                        </div>
                        <div class="flex m-2">
                            <input type="radio" name="tiempo" id="half-hours" value="half-hours"
                                class="peer hidden" />
                            <label for="half-hours"
                                class="select-none cursor-pointer rounded-lg border-2 text-center w-full text-white bg-verde-600 peer-disabled:opacity-20 peer-disabled:cursor-no-drop border-gray-500 py-2 px-1 font-bold transition-colors duration-200 ease-in-out peer-checked:bg-yellow-200 peer-checked:text-gray-800 peer-checked:border-yellow-900">
                                Half hours
                            </label>
                        </div>
                    </div>
                </div>
                <div class="m-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Filter
                    </button>
                </div>
            </form>
        </div>
        <!-- ver los precios de las horas-->
        <div class="m-3 bg-white rounded-lg md:p-8 dark:bg-gray-800 xl:max-w-md  md:basis-1/4">
            <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">
                perspiciatis doloribus unde?</h2>
            <p class="mb-3 text-gray-500 dark:text-gray-400">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Eos neque id perspiciatis voluptates maiores non reiciendis optio quo officia veritatis nihil est
                tenetur asperiores, sit ab inventore odio voluptatem? Nemo!</p>
            <a href="#"
                class="inline-flex items-center font-medium text-blue-600 hover:text-blue-800 dark:text-blue-500 dark:hover:text-blue-700">
                Learn more
                <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
            </a>
        </div>
    </div>

    <div class="w-full sm:px-6 lg:p-8 block sm:block lg:flex">
        <!--horas-->
        <div class="shadow-md sm:rounded-lg m-3 p-4 lg:basis-3/4">
            <form method="POST" action="#" class="m-2">
                @csrf
                <div class="grid grid-cols-2 xs:grid-cols-3 sm:grid-cols-4 xl:grid-cols-6">
                    @for ($i = 0; $i < 24; $i++)
                        <div class="flex p-2 xs:border-2 xs:bg-verde-400 m-2
                            xs:rounded-md">

                            <div class=" hidden xs:block w-3 h-3 rounded-md bg-blue-500 m-auto">
                            </div>
                            <div class="flex">
                                <input type="checkbox" name="hours[]" class="peer hidden" value="{{ $i }}" />
                                <label for="hours"
                                    class="select-none cursor-pointer rounded-lg border-2
                                    text-center w-full text-white
                                        bg-verde-600 peer-disabled:opacity-20 peer-disabled:cursor-no-drop
                                        border-gray-500 py-2 px-1 font-bold
                                        transition-colors duration-200 ease-in-out
                                        peer-checked:bg-yellow-200 peer-checked:text-gray-800
                                         peer-checked:border-yellow-900
                                         "
                                    disabled>
                                    {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00
                                </label>
                            </div>
                            <div class=" hidden xs:block w-3 h-3 rounded-md bg-yellow-500 my-auto mx-auto">
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="m-4">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700
                    text-white font-bold py-2 px-4 rounded">
                        Reserve
                    </button>
                </div>
            </form>
        </div>

        <!--form-->
        <form class="shadow-md sm:rounded-lg m-3 p-4 lg:basis-1/4">
            <div class="relative z-0 w-full mb-6 group">
                <input type="email" name="floating_email" id="floating_email"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="floating_email"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
                    address</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="password" name="floating_password" id="floating_password"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="floating_password"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="password" name="repeat_password" id="floating_repeat_password"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="floating_repeat_password"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm
                    password</label>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="floating_first_name" id="floating_first_name"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_first_name"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First
                        name</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="floating_last_name" id="floating_last_name"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_last_name"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last
                        name</label>
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="floating_phone"
                        id="floating_phone"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_phone"
                        class="peer-focus:font-medium absolute text-sm text-gray-500
                         dark:text-gray-400 duration-300 transform
                         -translate-y-6 scale-75 top-3 -z-10 origin-[0]
                         peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500
                         peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0
                         peer-focus:scale-75 peer-focus:-translate-y-6">
                        Number(959595955)</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="floating_company" id="floating_company"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent
                        border-0 border-b-2 border-gray-300 appearance-none dark:text-white
                        dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none
                        focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_company"
                        class="peer-focus:font-medium absolute text-sm text-gray-500
                        dark:text-gray-400 duration-300 transform -translate-y-6 scale-75
                        top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600
                        peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100
                        peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Company(Google)</label>
                </div>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>

</x-app-layout>
