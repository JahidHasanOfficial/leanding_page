<!DOCTYPE html>
<html lang="bn" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'অ্যাডমিন ড্যাশবোর্ড – ট্রেন্ডি ফ্যাশন')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800;900&display=swap" rel="stylesheet" />
    <style>
        * { font-family: 'Inter', sans-serif; }
        
        /* সাইডবার */
        .sidebar {
            transition: all 0.3s ease;
            width: 280px;
        }
        .sidebar-link {
            transition: all 0.2s ease;
        }
        .sidebar-link:hover {
            background: rgba(236, 72, 153, 0.08);
            color: #ec4899;
            padding-left: 20px;
        }
        .sidebar-link.active {
            background: linear-gradient(135deg, rgba(236, 72, 153, 0.12), rgba(139, 92, 246, 0.12));
            color: #ec4899;
            border-right: 3px solid #ec4899;
        }
        .sidebar-link i {
            width: 24px;
            text-align: center;
        }
        
        /* স্ট্যাট কার্ড */
        .stat-card {
            transition: all 0.3s ease;
            border: 1px solid rgba(229, 231, 235, 0.5);
        }
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.06);
            border-color: #ec4899;
        }
        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* টেবিল */
        .table-row {
            transition: all 0.2s ease;
        }
        .table-row:hover {
            background: #fdf2f8;
        }
        
        /* স্ক্রলবার */
        .custom-scroll::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        .custom-scroll::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }
        .custom-scroll::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 3px;
        }
        .custom-scroll::-webkit-scrollbar-thumb:hover {
            background: #ec4899;
        }
        
        /* মোবাইল সাইডবার */
        .mobile-sidebar {
            transition: all 0.3s ease;
            transform: translateX(-100%);
        }
        .mobile-sidebar.open {
            transform: translateX(0);
        }
        .overlay {
            transition: all 0.3s ease;
            opacity: 0;
            pointer-events: none;
        }
        .overlay.open {
            opacity: 1;
            pointer-events: auto;
        }
        
        /* চার্ট ডামি */
        .chart-bar {
            transition: all 0.5s ease;
            border-radius: 4px 4px 0 0;
        }
        .chart-bar:hover {
            opacity: 0.8;
            transform: scaleY(1.02);
        }
        
        /* অর্ডার স্ট্যাটাস ব্যাজ */
        .badge-pending {
            background: #fef3c7;
            color: #d97706;
        }
        .badge-processing {
            background: #dbeafe;
            color: #2563eb;
        }
        .badge-shipped {
            background: #e0e7ff;
            color: #4338ca;
        }
        .badge-delivered {
            background: #d1fae5;
            color: #059669;
        }
        .badge-cancelled {
            background: #fee2e2;
            color: #dc2626;
        }
        
        /* অ্যানিমেশন */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fadeInUp {
            animation: fadeInUp 0.5s ease forwards;
        }
        .animate-delay-1 { animation-delay: 0.1s; }
        .animate-delay-2 { animation-delay: 0.2s; }
        .animate-delay-3 { animation-delay: 0.3s; }
        .animate-delay-4 { animation-delay: 0.4s; }
        
        /* নোটিফিকেশন ডট */
        .notification-dot {
            animation: pulse-dot 2s ease-in-out infinite;
        }
        @keyframes pulse-dot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(0.8); }
        }
        
        /* স্ক্রল টু টপ */
        .scroll-top {
            transition: all 0.3s ease;
        }
        .scroll-top:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(236, 72, 153, 0.4);
        }
        
        /* প্রাইমারি বাটন */
        .btn-primary {
            background: linear-gradient(135deg, #ec4899, #8b5cf6);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(236, 72, 153, 0.3);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <!-- ১. টপ বার -->
    <header class="bg-white shadow-sm sticky top-0 z-40 border-b border-gray-100">
        <div class="flex items-center justify-between px-4 py-3">
            <div class="flex items-center gap-4">
                <button id="mobileMenuToggle" class="lg:hidden text-gray-600 hover:text-pink-600 transition text-xl">
                    <i class="fas fa-bars"></i>
                </button>
                <a href="{{ route('admin.dashboard') }}" class="text-2xl font-extrabold">
                    <span class="bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent">Trendy</span>
                    <span class="text-gray-800 hidden sm:inline">Admin</span>
                </a>
            </div>
            
            <div class="flex items-center gap-3 md:gap-4">
                <a href="{{ route('home') }}" class="text-sm font-semibold text-gray-650 hover:text-pink-600 transition">
                    <i class="fas fa-globe mr-1"></i> সাইট দেখুন
                </a>
                <div class="flex items-center gap-2 cursor-pointer group">
                    <div class="hidden md:block text-right">
                        <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500">অ্যাডমিন</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- ২. মেইন কন্টেন্ট (সাইডবার + কন্টেন্ট) -->
    <div class="flex min-h-screen">
        
        <!-- সাইডবার (ডেস্কটপ) -->
        <aside class="hidden lg:block bg-white shadow-lg border-r border-gray-100 sidebar flex-shrink-0 h-screen sticky top-[65px] overflow-y-auto custom-scroll">
            <nav class="p-4 space-y-1">
                <div class="text-xs text-gray-400 uppercase tracking-wider font-semibold px-4 py-2">মেইন মেনু</div>
                
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-xl text-gray-500 hover:text-gray-700 font-semibold">
                    <i class="fas fa-th-large {{ request()->routeIs('admin.dashboard') ? 'text-pink-600' : '' }}"></i>
                    <span>ড্যাশবোর্ড</span>
                </a>
                
                <a href="{{ route('admin.orders.index') }}" class="sidebar-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-xl text-gray-500 hover:text-gray-700 font-semibold">
                    <i class="fas fa-shopping-bag {{ request()->routeIs('admin.orders.*') ? 'text-pink-600' : '' }}"></i>
                    <span>অর্ডার</span>
                </a>
                
                <a href="{{ route('admin.products.index') }}" class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-xl text-gray-500 hover:text-gray-700 font-semibold">
                    <i class="fas fa-box {{ request()->routeIs('admin.products.*') ? 'text-pink-600' : '' }}"></i>
                    <span>প্রোডাক্ট</span>
                </a>
                
                <a href="{{ route('admin.categories.index') }}" class="sidebar-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-xl text-gray-500 hover:text-gray-700 font-semibold">
                    <i class="fas fa-tags {{ request()->routeIs('admin.categories.*') ? 'text-pink-600' : '' }}"></i>
                    <span>ক্যাটাগরি</span>
                </a>
                
                <div class="border-t border-gray-100 my-4"></div>
                
                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                    @csrf
                    <button type="submit" class="w-full text-left sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-red-500 hover:text-red-650 font-semibold bg-transparent border-0 cursor-pointer">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>লগআউট</span>
                    </button>
                </form>
            </nav>
        </aside>
        
        <!-- মোবাইল সাইডবার (অফক্যানভাস) -->
        <div id="mobileOverlay" class="overlay fixed inset-0 bg-black/50 z-50 lg:hidden"></div>
        <aside id="mobileSidebar" class="mobile-sidebar fixed top-0 left-0 h-full w-72 bg-white z-50 shadow-2xl lg:hidden overflow-y-auto custom-scroll">
            <div class="p-4 border-b border-gray-100 flex justify-between items-center">
                <a href="{{ route('admin.dashboard') }}" class="text-2xl font-extrabold">
                    <span class="bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent">Trendy</span>
                    <span class="text-gray-800">Admin</span>
                </a>
                <button id="closeMobileMenu" class="text-gray-400 hover:text-gray-600 transition text-xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <nav class="p-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 font-semibold">
                    <i class="fas fa-th-large {{ request()->routeIs('admin.dashboard') ? 'text-pink-600' : '' }}"></i>
                    <span>ড্যাশবোর্ড</span>
                </a>
                <a href="{{ route('admin.orders.index') }}" class="sidebar-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-xl text-gray-500 hover:text-gray-700 font-semibold">
                    <i class="fas fa-shopping-bag {{ request()->routeIs('admin.orders.*') ? 'text-pink-600' : '' }}"></i>
                    <span>অর্ডার</span>
                </a>
                <a href="{{ route('admin.products.index') }}" class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-xl text-gray-500 hover:text-gray-700 font-semibold">
                    <i class="fas fa-box {{ request()->routeIs('admin.products.*') ? 'text-pink-600' : '' }}"></i>
                    <span>প্রোডাক্ট</span>
                </a>
                <a href="{{ route('admin.categories.index') }}" class="sidebar-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-xl text-gray-500 hover:text-gray-700 font-semibold">
                    <i class="fas fa-tags {{ request()->routeIs('admin.categories.*') ? 'text-pink-600' : '' }}"></i>
                    <span>ক্যাটাগরি</span>
                </a>
                <div class="border-t border-gray-100 my-4"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-red-500 hover:text-red-650 font-semibold bg-transparent border-0 cursor-pointer">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>লগআউট</span>
                    </button>
                </form>
            </nav>
        </aside>
        
        <!-- কন্টেন্ট এরিয়া -->
        <main class="flex-1 p-4 md:p-6 space-y-6 overflow-x-hidden">
            @if(session('success'))
                <div class="p-4 mb-4 rounded-xl border border-emerald-500/20 bg-emerald-50 text-emerald-700 flex justify-between items-center">
                    <p class="font-bold text-sm">{{ session('success') }}</p>
                    <button onclick="this.parentElement.remove()" class="text-emerald-700 font-bold hover:scale-110">✕</button>
                </div>
            @endif
            @if(session('error'))
                <div class="p-4 mb-4 rounded-xl border border-rose-500/20 bg-rose-50 text-rose-700 flex justify-between items-center">
                    <p class="font-bold text-sm">{{ session('error') }}</p>
                    <button onclick="this.parentElement.remove()" class="text-rose-700 font-bold hover:scale-110">✕</button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- ৩. স্ক্রল টু টপ -->
    <button onclick="window.scrollTo({top:0,behavior:'smooth'})" 
            id="scrollTopBtn"
            class="fixed bottom-6 right-6 z-40 bg-gradient-to-r from-pink-600 to-purple-600 text-white w-12 h-12 rounded-full shadow-2xl scroll-top hidden">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- ৪. জাভাস্ক্রিপ্ট -->
    <script>
        const menuToggle = document.getElementById('mobileMenuToggle');
        const closeMenu = document.getElementById('closeMobileMenu');
        const mobileSidebar = document.getElementById('mobileSidebar');
        const overlay = document.getElementById('mobileOverlay');

        function openMobileMenu() {
            mobileSidebar.classList.add('open');
            overlay.classList.add('open');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileMenu() {
            mobileSidebar.classList.remove('open');
            overlay.classList.remove('open');
            document.body.style.overflow = 'auto';
        }

        if(menuToggle) menuToggle.addEventListener('click', openMobileMenu);
        if(closeMenu) closeMenu.addEventListener('click', closeMobileMenu);
        if(overlay) overlay.addEventListener('click', closeMobileMenu);

        window.addEventListener('scroll', function() {
            const btn = document.getElementById('scrollTopBtn');
            if (btn) {
                if (window.scrollY > 500) {
                    btn.classList.remove('hidden');
                } else {
                    btn.classList.add('hidden');
                }
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
