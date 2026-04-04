<x-guest-layout>
    <div class="relative mb-10 text-center">
        <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-tr from-orange-500 to-yellow-400 rounded-2xl shadow-xl shadow-orange-200 rotate-12 mb-6 transition-transform hover:rotate-0 duration-300">
            <span class="text-4xl">🍔</span>
        </div>
        <h2 class="text-3xl font-black text-gray-800 tracking-tight uppercase">Đăng Ký Tài Khoản</h2>
        <div class="h-1.5 w-16 bg-orange-500 mx-auto mt-2 rounded-full"></div>
        <p class="text-sm text-gray-500 mt-4 font-medium italic">Thưởng thức món ngon mỗi ngày cùng <span class="text-orange-500 font-bold">FastFoodApp</span></p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <div class="group">
            <x-input-label for="name" :value="__('Họ và Tên')" class="text-gray-600 font-bold ml-1 text-xs uppercase tracking-wider" />
            <div class="relative mt-1.5">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400 group-focus-within:text-orange-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <x-text-input id="name" class="block w-full pl-11 pr-4 py-3 border-gray-100 bg-gray-50/50 focus:bg-white focus:ring-4 focus:ring-orange-100 focus:border-orange-500 rounded-2xl transition-all duration-300 shadow-inner" 
                    type="text" name="name" :value="old('name')" required autofocus placeholder="Ví dụ: Nguyễn Văn A" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-1.5 ml-2 text-xs font-semibold" />
        </div>

        <div class="group">
            <x-input-label for="email" :value="__('Địa chỉ Email')" class="text-gray-600 font-bold ml-1 text-xs uppercase tracking-wider" />
            <div class="relative mt-1.5">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400 group-focus-within:text-orange-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <x-text-input id="email" class="block w-full pl-11 pr-4 py-3 border-gray-100 bg-gray-50/50 focus:bg-white focus:ring-4 focus:ring-orange-100 focus:border-orange-500 rounded-2xl transition-all duration-300 shadow-inner" 
                    type="email" name="email" :value="old('email')" required placeholder="email@example.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-1.5 ml-2 text-xs font-semibold" />
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div class="group">
                <x-input-label for="password" :value="__('Mật khẩu')" class="text-gray-600 font-bold ml-1 text-xs uppercase tracking-wider" />
                <x-text-input id="password" class="block mt-1.5 w-full px-4 py-3 border-gray-100 bg-gray-50/50 focus:bg-white focus:ring-4 focus:ring-orange-100 focus:border-orange-500 rounded-2xl transition-all duration-300" 
                    type="password" name="password" required placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password')" class="mt-1.5 ml-2 text-xs font-semibold" />
            </div>

            <div class="group">
                <x-input-label for="password_confirmation" :value="__('Xác nhận')" class="text-gray-600 font-bold ml-1 text-xs uppercase tracking-wider" />
                <x-text-input id="password_confirmation" class="block mt-1.5 w-full px-4 py-3 border-gray-100 bg-gray-50/50 focus:bg-white focus:ring-4 focus:ring-orange-100 focus:border-orange-500 rounded-2xl transition-all duration-300" 
                    type="password" name="password_confirmation" required placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1.5 ml-2 text-xs font-semibold" />
            </div>
        </div>

        <div class="pt-6 flex flex-col space-y-5">
            <button type="submit" class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-black rounded-2xl text-white bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 shadow-xl shadow-orange-200 transition-all transform hover:-translate-y-1 active:scale-95 uppercase tracking-widest">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-orange-300 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" /></svg>
                </span>
                Đăng ký ngay
            </button>

            <div class="relative flex items-center justify-center mt-4">
                <div class="flex-grow border-t border-gray-200"></div>
                <span class="flex-shrink mx-4 text-gray-400 text-xs font-bold uppercase tracking-widest">Hoặc</span>
                <div class="flex-grow border-t border-gray-200"></div>
            </div>

            <p class="text-center">
                <span class="text-gray-500 font-medium">Đã có tài khoản?</span>
                <a href="{{ route('login') }}" class="ml-1 text-orange-600 font-black hover:text-orange-700 transition-colors decoration-2 underline-offset-4 hover:underline">Đăng nhập</a>
            </p>
        </div>
    </form>
</x-guest-layout>