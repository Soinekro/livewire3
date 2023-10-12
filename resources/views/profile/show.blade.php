<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile Imformation') }}
        </h2>
    </x-slot>
    <div class="rounded-md grid grid-cols-1 lg:gap-4 lg:grid-col-2 lg:justify-items-center">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="shadow-md sm:rounded-lg m-3 p-4">
                    @livewire('profile.update-profile-information-form')
                </div>
            @endif
            <div class="shadow-md sm:rounded-lg m-3 p-4">
                @livewire('profile.update-password-form')
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2">
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <div class="shadow-md sm:rounded-lg m-3 p-4">
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>
            @endif
            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <div class="shadow-md sm:rounded-lg m-3 p-4">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
