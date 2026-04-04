<section>
    <header class="flex items-center space-x-3 mb-6">
    <div class="p-2 bg-orange-100 rounded-lg">
        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
    </div>
    <div>
        <h2 class="text-lg font-bold text-gray-900">
            {{ __('Thông tin tài khoản') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Cập nhật tên và địa chỉ email của bạn.') }}
        </p>
    </div>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Họ và tên')" class="font-semibold" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-xl shadow-sm" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" class="font-semibold" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-xl shadow-sm" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit" class="inline-flex items-center px-6 py-3 bg-orange-500 border border-transparent rounded-xl font-bold text-xs text-white uppercase tracking-widest hover:bg-orange-600 focus:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Lưu thay đổi') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-600 font-medium">
                    {{ __('Đã lưu thành công!') }}
                </p>
            @endif
        </div>
    </form>
</section>