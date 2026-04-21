<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-red-600">
    {{ __('Hồ sơ cá nhân') }}
</h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="p-8 bg-white shadow-xl shadow-orange-100/50 sm:rounded-2xl border border-orange-50">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-8 bg-white shadow-xl shadow-orange-100/50 sm:rounded-2xl border border-orange-50">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- <div class="p-8 bg-white shadow-xl shadow-red-100/50 sm:rounded-2xl border border-red-50">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div> -->
        </div>
    </div>
</x-app-layout>