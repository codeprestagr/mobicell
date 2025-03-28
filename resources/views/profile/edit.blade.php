<x-app-layout>
    <x-slot name="header">
        <h4 class="text-slate-900 text-lg font-medium mb-2">
            {{ __('Profile') }}
        </h4>
    </x-slot>

    <div class="grid lg:grid-cols-2 grid-cols-1 gap-6">

            <div class="card">
                <div class="p-6">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

             <div class="card">
                <div class="p-6">
                    @include('profile.partials.update-password-form')
                </div>
            </div>


</x-app-layout>
