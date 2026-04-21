<section class="space-y-6">
    <header class="flex items-center space-x-3 mb-6">
        <div class="p-2 bg-red-100 rounded-lg">
            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </div>
        <div>
            <h2 class="text-lg font-bold text-gray-900">
                {{ __('Xóa tài khoản') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Sau khi xóa, tất cả dữ liệu của bạn sẽ bị mất vĩnh viễn. Vui lòng cân nhắc kỹ.') }}
            </p>
        </div>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-6 py-3 rounded-xl font-bold uppercase tracking-widest shadow-lg shadow-red-100 transition-all hover:scale-105"
    >{{ __('Xóa tài khoản của tôi') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8">
            @csrf
            @method('delete')

            <h2 class="text-xl font-bold text-gray-900">
                {{ __('Bạn có chắc chắn muốn xóa không?') }}
            </h2>

            <p class="mt-3 text-sm text-gray-600">
                {{ __('Nhập mật khẩu của bạn để xác nhận rằng bạn thực sự muốn xóa tài khoản này.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Mật khẩu') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-xl"
                    placeholder="{{ __('Mật khẩu của bạn') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-8 flex justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')" class="rounded-xl px-5">
                    {{ __('Hủy bỏ') }}
                </x-secondary-button>

                <x-danger-button class="rounded-xl px-5 bg-red-600 hover:bg-red-700">
                    {{ __('Xác nhận xóa') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>