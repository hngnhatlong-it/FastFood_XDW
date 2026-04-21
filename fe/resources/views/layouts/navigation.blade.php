<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <div class="flex items-center space-x-4">
                <span class="text-gray-500 text-sm font-medium">
                    Xin chào, <span class="text-orange-600 font-bold text-base">{{ Auth::user()->name }}</span> 👋
                </span>
            </div>

            <div class="hidden sm:flex sm:items-center sm:space-x-4">
                <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('home') ? 'bg-orange-50 text-orange-600 shadow-sm' : 'text-gray-600 hover:bg-orange-50 hover:text-orange-600' }}">
                    <i class="fas fa-home me-2"></i> Trang chủ
                </a>

                <div x-data="{ dropdownOpen: false }" class="relative">
                    <button @click="dropdownOpen = !dropdownOpen" @click.away="dropdownOpen = false" class="group flex items-center p-1 rounded-full hover:bg-gray-50 transition-all focus:outline-none">
                        <div class="h-9 w-9 rounded-full bg-gradient-to-tr from-orange-500 to-red-500 text-white flex items-center justify-center text-sm font-black shadow-sm group-hover:scale-105 transition-all">
                            {{ Str::upper(Str::substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <svg class="ms-1 h-4 w-4 text-gray-400 group-hover:text-orange-500 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="dropdownOpen" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="absolute right-0 mt-2 w-48 bg-white border border-gray-100 rounded-xl shadow-xl z-50" 
                         style="display: none;">
                        <div class="p-2 space-y-1">
                            <div class="px-4 py-2 text-[10px] text-gray-400 uppercase font-black">Tài khoản</div>
                            <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 rounded-lg transition">
                                <i class="fas fa-user-circle me-2 text-orange-500"></i> Hồ sơ cá nhân
                            </a>
                            <hr class="border-gray-100 my-1">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left flex items-center px-4 py-2 text-sm font-bold text-red-600 hover:bg-red-50 rounded-lg transition">
                                    <i class="fas fa-sign-out-alt me-2"></i> Đăng xuất
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-xl text-gray-500 hover:text-orange-600 hover:bg-orange-50 transition duration-200">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="open ? 'hidden' : 'inline-flex'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="open ? 'inline-flex' : 'hidden'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="open" style="display: none;" class="sm:hidden bg-white border-t border-gray-100 shadow-xl overflow-hidden">
        <div class="p-3 space-y-1">
            <a href="{{ route('home') }}" class="flex items-center p-3 rounded-xl font-bold {{ request()->routeIs('home') ? 'bg-orange-50 text-orange-600' : 'text-gray-600' }}">
                <i class="fas fa-home me-2"></i> Trang chủ
            </a>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-200 bg-gray-50/50">
            <div class="px-5 flex items-center mb-3">
                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-orange-500 to-red-500 text-white flex items-center justify-center font-black shadow-md">
                    {{ Str::upper(Str::substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="ms-3">
                    <div class="font-black text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-xs text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="px-3 space-y-1">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-600 font-bold hover:bg-orange-50 rounded-lg">Hồ sơ cá nhân</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-red-600 font-bold hover:bg-red-50 rounded-lg">Đăng xuất</button>
                </form>
            </div>
        </div>
    </div>
</nav>