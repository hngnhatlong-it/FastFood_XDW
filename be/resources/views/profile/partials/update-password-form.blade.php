<section>
    <header class="flex items-center space-x-3 mb-6">
        <div class="p-2 bg-orange-100 rounded-lg">
            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
        </div>
        <div>
            <h2 class="text-lg font-bold text-gray-900">
                {{ __('Đổi mật khẩu') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Đảm bảo tài khoản của bạn sử dụng một mật khẩu dài, ngẫu nhiên để giữ an toàn.') }}
            </p>
        </div>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Mật khẩu hiện tại')" class="font-semibold text-gray-700" />
            <x-text-input id="current_password" name="current_password" type="password" 
                class="mt-1 block w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-xl shadow-sm bg-gray-50/50" 
                autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Mật khẩu mới')" class="font-semibold text-gray-700" />
            <x-text-input id="password" name="password" type="password" 
                class="mt-1 block w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-xl shadow-sm bg-gray-50/50" 
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Xác nhận mật khẩu mới')" class="font-semibold text-gray-700" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" 
                class="mt-1 block w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-xl shadow-sm bg-gray-50/50" 
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit" class="inline-flex items-center px-6 py-3 bg-orange-500 border border-transparent rounded-xl font-bold text-xs text-white uppercase tracking-widest hover:bg-orange-600 focus:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg shadow-orange-200">
                {{ __('Cập nhật mật khẩu') }}
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-600 font-bold">
                    {{ __('Đã cập nhật thành công!') }}
                </p>
            @endif
        </div>
    </form>
</section>