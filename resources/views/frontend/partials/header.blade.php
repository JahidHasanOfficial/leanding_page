<header class="fixed top-0 left-0 w-full bg-white/95 dark:bg-slate-950/95 backdrop-blur-sm shadow-sm z-50 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="text-2xl font-extrabold">
            <span class="gradient-text">Trendy</span>
            <span class="text-gray-800 dark:text-white">Fashion</span>
        </a>
        
        <!-- Desktop Menu -->
        <nav class="hidden lg:flex items-center gap-8 text-sm font-semibold">
            <a href="{{ route('home') }}" class="text-gray-700 dark:text-gray-300 hover:text-pink-600 dark:hover:text-pink-400 transition">হোম</a>
            <a href="{{ route('products.index') }}" class="text-gray-700 dark:text-gray-300 hover:text-pink-600 dark:hover:text-pink-400 transition">কালেকশন</a>
            <a href="{{ route('home') }}#categories" class="text-gray-700 dark:text-gray-300 hover:text-pink-600 dark:hover:text-pink-400 transition">ক্যাটাগরি</a>
            <a href="{{ route('home') }}#reviews" class="text-gray-700 dark:text-gray-300 hover:text-pink-600 dark:hover:text-pink-400 transition">রিভিউ</a>
            <a href="{{ route('home') }}#order-form-section" class="text-gray-700 dark:text-gray-300 hover:text-pink-600 dark:hover:text-pink-400 transition">যোগাযোগ</a>
        </nav>
        
        <!-- Right side Icons -->
        <div class="flex items-center gap-4">
            <!-- Theme Toggle Button -->
            <button id="themeToggleBtn" class="text-gray-600 dark:text-gray-300 hover:text-pink-600 dark:hover:text-pink-400 transition text-xl p-1 cursor-pointer">
                <i id="theme-sun-icon" class="hidden fas fa-sun"></i>
                <i id="theme-moon-icon" class="hidden fas fa-moon"></i>
            </button>

            <!-- Wishlist Link -->
            <a href="#" class="text-gray-600 dark:text-gray-300 hover:text-pink-600 transition relative">
                <i class="fas fa-heart text-xl"></i>
                <span class="absolute -top-2 -right-2 bg-pink-600 text-white text-[10px] w-5 h-5 rounded-full flex items-center justify-center font-bold">0</span>
            </a>

            <!-- Cart Bag Link -->
            <a href="{{ route('cart.index') }}" class="text-gray-600 dark:text-gray-300 hover:text-pink-600 transition relative">
                <i class="fas fa-shopping-bag text-xl"></i>
                <span id="cart-badge" class="absolute -top-2 -right-2 bg-pink-600 text-white text-[10px] w-5 h-5 rounded-full flex items-center justify-center font-bold">{{ $cartCount ?? 0 }}</span>
            </a>

            <!-- Authentication Controls -->
            @auth
                @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.dashboard') }}" class="hidden md:inline-block bg-slate-800 text-white px-5 py-2 rounded-full text-sm font-bold hover:bg-slate-700 transition">
                        <i class="fas fa-gauge mr-1"></i> ড্যাশবোর্ড
                    </a>
                @else
                    <a href="{{ route('checkout.orders') }}" class="hidden md:inline-block bg-slate-850 text-white px-5 py-2 rounded-full text-sm font-bold hover:bg-slate-700 transition border border-white/5">
                        <i class="fas fa-list mr-1"></i> অর্ডার সমূহ
                    </a>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hidden md:inline-block bg-rose-600 hover:bg-rose-500 text-white px-5 py-2 rounded-full text-sm font-bold transition cursor-pointer">
                        লগআউট
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hidden md:inline-block btn-primary text-white px-6 py-2 rounded-full text-sm font-bold">
                    <i class="fas fa-user mr-1"></i> লগইন
                </a>
            @endauth

            <!-- Mobile Menu Toggle -->
            <button id="menuToggle" class="lg:hidden text-2xl text-gray-700 dark:text-gray-300 hover:text-pink-600 transition cursor-pointer">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
    
    <!-- Mobile Menu (Dropdown) -->
    <div id="mobileMenu" class="lg:hidden bg-white dark:bg-slate-950 border-t border-gray-100 dark:border-white/5 max-h-0 overflow-hidden mobile-menu transition-all duration-300">
        <div class="px-4 py-4 space-y-3">
            <a href="{{ route('home') }}" class="block text-gray-700 dark:text-gray-300 hover:text-pink-600 transition font-semibold">হোম</a>
            <a href="{{ route('products.index') }}" class="block text-gray-700 dark:text-gray-300 hover:text-pink-600 transition font-semibold">কালেকশন</a>
            <a href="{{ route('home') }}#categories" class="block text-gray-700 dark:text-gray-300 hover:text-pink-600 transition font-semibold">ক্যাটাগরি</a>
            <a href="{{ route('home') }}#reviews" class="block text-gray-700 dark:text-gray-300 hover:text-pink-600 transition font-semibold">রিভিউ</a>
            <a href="{{ route('home') }}#order-form-section" class="block text-gray-700 dark:text-gray-300 hover:text-pink-600 transition font-semibold">যোগাযোগ</a>
            
            @auth
                @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.dashboard') }}" class="block text-gray-700 dark:text-gray-300 hover:text-pink-600 transition font-semibold">ড্যাশবোর্ড</a>
                @else
                    <a href="{{ route('checkout.orders') }}" class="block text-gray-700 dark:text-gray-300 hover:text-pink-600 transition font-semibold">অর্ডার সমূহ</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="block w-full">
                    @csrf
                    <button type="submit" class="w-full text-left text-rose-600 font-semibold py-2 cursor-pointer">লগআউট</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block btn-primary text-white text-center py-3 rounded-xl font-bold">লগইন</a>
            @endauth
        </div>
    </div>
</header>
