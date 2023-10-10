<x-app-layout>
    <div
        class=" {{-- mx-auto --}} py-10 sm:px-6 lg:px-8 {{-- bg-slate-400  --}}rounded-md grid gap-4 grid-cols-1 gap-y-4 lg:grid-cols-2">
        <div class=" max-h-full">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="m-5 sm:mt-0">
                    @livewire('profile.update-profile-information-form')
                </div>
                <x-section-border />
            @endif
            <div class="m-5 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>
        </div>
        <div class="max-h-full">
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="m-5 sm:mt-0 ">
                    @livewire('profile.update-password-form')
                </div>
            @endif
            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />
                <div class="m-5 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
