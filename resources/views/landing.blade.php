@extends('layouts.landing')

@section('content')
    <!-- ============================================================ -->
    <!-- ১. টপ বার (স্টিকি + মোবাইল মেনু) -->
    <!-- ============================================================ -->
    <header class="fixed top-0 left-0 w-full bg-white/95 dark:bg-slate-950/95 backdrop-blur-sm shadow-sm z-50 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <!-- লোগো -->
            <a href="{{ route('home') }}" class="text-2xl font-extrabold">
                <span class="gradient-text">Trendy</span>
                <span class="text-gray-800 dark:text-white">Fashion</span>
            </a>
            
            <!-- ডেস্কটপ মেনু -->
            <nav class="hidden lg:flex items-center gap-8 text-sm font-semibold">
                <a href="#" class="text-gray-700 dark:text-gray-300 hover:text-pink-600 dark:hover:text-pink-400 transition">হোম</a>
                <a href="#collection" class="text-gray-700 dark:text-gray-300 hover:text-pink-600 dark:hover:text-pink-400 transition">কালেকশন</a>
                <a href="#categories" class="text-gray-700 dark:text-gray-300 hover:text-pink-600 dark:hover:text-pink-400 transition">ক্যাটাগরি</a>
                <a href="#reviews" class="text-gray-700 dark:text-gray-300 hover:text-pink-600 dark:hover:text-pink-400 transition">রিভিউ</a>
                <a href="#order-form-section" class="text-gray-700 dark:text-gray-300 hover:text-pink-600 dark:hover:text-pink-400 transition">যোগাযোগ</a>
            </nav>
            
            <!-- ডান পাশের আইকন -->
            <div class="flex items-center gap-4">
                <!-- Theme Toggle Button -->
                <button id="themeToggleBtn" class="text-gray-600 dark:text-gray-300 hover:text-pink-600 dark:hover:text-pink-400 transition text-xl p-1 cursor-pointer">
                    <i id="theme-sun-icon" class="hidden fas fa-sun"></i>
                    <i id="theme-moon-icon" class="hidden fas fa-moon"></i>
                </button>

                <a href="#" class="text-gray-600 dark:text-gray-300 hover:text-pink-600 transition relative">
                    <i class="fas fa-heart text-xl"></i>
                    <span class="absolute -top-2 -right-2 bg-pink-600 text-white text-[10px] w-5 h-5 rounded-full flex items-center justify-center font-bold">12</span>
                </a>
                <a href="#" class="text-gray-600 dark:text-gray-300 hover:text-pink-600 transition relative">
                    <i class="fas fa-shopping-bag text-xl"></i>
                    <span class="absolute -top-2 -right-2 bg-pink-600 text-white text-[10px] w-5 h-5 rounded-full flex items-center justify-center font-bold">3</span>
                </a>
                <a href="#" class="hidden md:inline-block btn-primary text-white px-6 py-2 rounded-full text-sm font-bold">
                    <i class="fas fa-user mr-1"></i> লগইন
                </a>
                <!-- মোবাইল মেনু টগল -->
                <button id="menuToggle" class="lg:hidden text-2xl text-gray-700 dark:text-gray-300 hover:text-pink-600 transition cursor-pointer">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        
        <!-- মোবাইল মেনু (ড্রপডাউন) -->
        <div id="mobileMenu" class="lg:hidden bg-white dark:bg-slate-950 border-t border-gray-100 dark:border-white/5 max-h-0 overflow-hidden mobile-menu transition-all duration-300">
            <div class="px-4 py-4 space-y-3">
                <a href="#" class="block text-gray-700 dark:text-gray-300 hover:text-pink-600 transition font-semibold">হোম</a>
                <a href="#collection" class="block text-gray-700 dark:text-gray-300 hover:text-pink-600 transition font-semibold">কালেকশন</a>
                <a href="#categories" class="block text-gray-700 dark:text-gray-300 hover:text-pink-600 transition font-semibold">ক্যাটাগরি</a>
                <a href="#reviews" class="block text-gray-700 dark:text-gray-300 hover:text-pink-600 transition font-semibold">রিভিউ</a>
                <a href="#order-form-section" class="block text-gray-700 dark:text-gray-300 hover:text-pink-600 transition font-semibold">যোগাযোগ</a>
                <a href="#" class="block btn-primary text-white text-center py-3 rounded-xl font-bold">লগইন</a>
            </div>
        </div>
    </header>

    <!-- Success & Error Alerts -->
    <div class="max-w-7xl mx-auto px-4 pt-24">
        @if(session('success'))
            <div class="p-4 mb-4 rounded-xl border border-emerald-500/20 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 flex justify-between items-center">
                <p class="font-bold text-sm">{{ session('success') }}</p>
                <button onclick="this.parentElement.remove()" class="text-emerald-700 dark:text-emerald-400 font-bold hover:scale-110">✕</button>
            </div>
        @endif
        @if(session('error'))
            <div class="p-4 mb-4 rounded-xl border border-rose-500/20 bg-rose-50 dark:bg-rose-500/10 text-rose-700 dark:text-rose-400 flex justify-between items-center">
                <p class="font-bold text-sm">{{ session('error') }}</p>
                <button onclick="this.parentElement.remove()" class="text-rose-700 dark:text-rose-400 font-bold hover:scale-110">✕</button>
            </div>
        @endif
    </div>

    <!-- ============================================================ -->
    <!-- ২. হিরো সেকশন (Hero Section) -->
    <!-- ============================================================ -->
    <section class="hero-bg min-h-screen flex items-center relative overflow-hidden pt-12 transition-colors duration-300">
        
        <!-- ডেকোরেティブ এলিমেন্ট -->
        <div class="absolute top-20 right-20 w-96 h-96 bg-pink-300 dark:bg-pink-500/10 rounded-full opacity-20 dark:opacity-10 blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-20 left-20 w-80 h-80 bg-purple-300 dark:bg-purple-500/10 rounded-full opacity-20 dark:opacity-10 blur-3xl pointer-events-none"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-pink-200 dark:bg-pink-500/5 rounded-full opacity-10 dark:opacity-5 blur-3xl pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                
                <!-- বাম পাশে: টেক্সট -->
                <div>
                    <!-- ব্যাজ -->
                    <div class="inline-block bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm border border-pink-100 dark:border-white/5 px-6 py-2 rounded-full text-sm font-semibold text-pink-600 dark:text-pink-400 shadow-lg mb-6 floating-badge">
                        <i class="fas fa-star text-yellow-400 mr-2"></i>
                        নতুন কালেকশন ২০২৬
                    </div>
                    
                    <!-- টাইপিং হেডলাইন -->
                    <h1 class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-extrabold leading-tight mb-4 text-gray-800 dark:text-white">
                        আপনার <span class="gradient-text">স্টাইল</span>কে<br />
                        নতুন উচ্চতায় <br />
                        <span id="typedText" class="text-gray-800 dark:text-slate-100"></span>
                        <span class="typing-cursor"></span>
                    </h1>
                    
                    <!-- সাব-হেডলাইন -->
                    @if($featuredProduct)
                        <p class="text-lg md:text-xl text-gray-700 dark:text-gray-300 mb-8 leading-relaxed max-w-lg">
                            {{ $featuredProduct->description }}
                        </p>
                    @else
                        <p class="text-lg md:text-xl text-gray-700 dark:text-gray-300 mb-8 leading-relaxed max-w-lg">
                            ট্রেন্ডি ফ্যাশনে স্বাগতম। এক্সক্লুসিভ কালেকশন, প্রিমিয়াম কোয়ালিটি, 
                            এবং অনন্য ডিজাইন—যা আপনার ব্যক্তিত্বকে তুলে ধরবে।
                        </p>
                    @endif
                    
                    <!-- CTA বাটন -->
                    <div class="flex flex-wrap gap-4">
                        <a href="#collection" class="btn-primary text-white px-10 py-4 rounded-full text-lg font-bold shadow-2xl inline-flex items-center gap-3">
                            <i class="fas fa-shopping-bag"></i>
                            এখনই কেনাকাটা করুন
                        </a>
                        <a href="#order-form-section" class="border-2 border-pink-500 text-pink-600 dark:text-pink-400 px-10 py-4 rounded-full text-lg font-bold hover:bg-pink-50 dark:hover:bg-white/5 transition inline-flex items-center gap-3">
                            <i class="fas fa-truck"></i>
                            সরাসরি অর্ডার করুন
                        </a>
                    </div>
                    
                    <!-- স্ট্যাটাস -->
                    <div class="flex items-center gap-8 mt-10">
                        <div>
                            <p class="text-2xl font-bold text-gray-800 dark:text-white">৫০K+</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">সন্তুষ্ট ক্রেতা</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-gray-800 dark:text-white">৪.৯★</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">গড় রেটিং</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-gray-800 dark:text-white">১৫০+</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">ব্র্যান্ড</p>
                        </div>
                    </div>
                </div>
                
                <!-- ডান পাশে: ইমেজ + ফ্লোটিং এলিমেন্ট -->
                <div class="relative flex justify-center">
                    <div class="relative">
                        @if($featuredProduct && $featuredProduct->image)
                            <img src="{{ \Illuminate\Support\Str::startsWith($featuredProduct->image, ['http://', 'https://']) ? $featuredProduct->image : asset('storage/' . $featuredProduct->image) }}" 
                                 alt="{{ $featuredProduct->name }}" 
                                 class="rounded-3xl shadow-2xl w-full max-w-md object-cover h-[450px] sm:h-[550px] border border-white/10" />
                        @else
                            <img src="https://images.unsplash.com/photo-1539008835657-9e8e9680c956?w=600&h=800&fit=crop&crop=center" 
                                 alt="Fashion Model" 
                                 class="rounded-3xl shadow-2xl w-full max-w-md object-cover h-[450px] sm:h-[550px] border border-white/10" />
                        @endif
                        
                        <!-- ফ্লোটিং কার্ড ১ -->
                        <div class="absolute -bottom-6 -left-6 bg-white dark:bg-slate-800 rounded-2xl shadow-2xl p-4 flex items-center gap-4 border border-slate-100 dark:border-white/5 floating-badge">
                            <div class="bg-pink-100 dark:bg-pink-500/20 p-3 rounded-full">
                                <i class="fas fa-tags text-pink-600 dark:text-pink-400 text-xl"></i>
                            </div>
                            <div>
                                <p class="font-bold text-sm text-slate-800 dark:text-white">৫০% ছাড়</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">নতুন কালেকশনে</p>
                            </div>
                        </div>
                        
                        <!-- ফ্লোটিং কার্ড ২ -->
                        <div class="absolute -top-6 -right-6 bg-white dark:bg-slate-800 rounded-2xl shadow-2xl border border-slate-100 dark:border-white/5 p-4 floating-badge">
                            <i class="fas fa-truck-fast text-pink-600 dark:text-pink-400 text-2xl"></i>
                            <p class="text-xs font-bold mt-1 text-slate-800 dark:text-white">ফ্রি ডেলিভারি</p>
                        </div>
                        
                        <!-- ফ্লোটিং কার্ড ৩ (কাউন্টডাউন) -->
                        <div class="absolute -bottom-6 -right-6 bg-white dark:bg-slate-800 rounded-2xl shadow-2xl border border-slate-100 dark:border-white/5 p-4 text-center floating-badge" style="animation-delay: 1.5s;">
                            <p class="text-xs text-gray-500 dark:text-gray-400 font-semibold">অফার শেষ হতে</p>
                            <div class="flex gap-2 mt-1">
                                <div class="countdown-box bg-pink-600 text-white rounded-lg px-2.5 py-1.5 min-w-[32px] text-center">
                                    <span id="hours" class="text-sm font-bold">12</span>
                                </div>
                                <span class="text-pink-600 font-bold self-center">:</span>
                                <div class="countdown-box bg-pink-600 text-white rounded-lg px-2.5 py-1.5 min-w-[32px] text-center">
                                    <span id="minutes" class="text-sm font-bold">30</span>
                                </div>
                                <span class="text-pink-600 font-bold self-center">:</span>
                                <div class="countdown-box bg-pink-600 text-white rounded-lg px-2.5 py-1.5 min-w-[32px] text-center">
                                    <span id="seconds" class="text-sm font-bold">45</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- ৩. ব্র্যান্ড লোগো (Brands) – অটো স্ক্রল -->
    <!-- ============================================================ -->
    <section class="py-8 bg-white dark:bg-slate-950 border-y border-gray-100 dark:border-white/5 overflow-hidden transition-colors">
        <div class="max-w-7xl mx-auto px-4">
            <p class="text-center text-xs text-gray-400 uppercase tracking-widest mb-4">বিশ্বস্ত ব্র্যান্ডগুলো আমাদের বিশ্বাস করে</p>
            <div class="flex whitespace-nowrap brand-scroll">
                <div class="flex items-center gap-16 opacity-60 dark:opacity-50">
                    <span class="text-2xl font-bold text-gray-400">GUCCI</span>
                    <span class="text-2xl font-bold text-gray-400">PRADA</span>
                    <span class="text-2xl font-bold text-gray-400">ZARA</span>
                    <span class="text-2xl font-bold text-gray-400">H&M</span>
                    <span class="text-2xl font-bold text-gray-400">LOUIS</span>
                    <span class="text-2xl font-bold text-gray-400">CHANEL</span>
                    <!-- duplicate for loop -->
                    <span class="text-2xl font-bold text-gray-400">GUCCI</span>
                    <span class="text-2xl font-bold text-gray-400">PRADA</span>
                    <span class="text-2xl font-bold text-gray-400">ZARA</span>
                    <span class="text-2xl font-bold text-gray-400">H&M</span>
                    <span class="text-2xl font-bold text-gray-400">LOUIS</span>
                    <span class="text-2xl font-bold text-gray-400">CHANEL</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- ৪. ক্যাটাগরি সেকশন (Categories) -->
    <!-- ============================================================ -->
    <section id="categories" class="section-padding bg-gray-50 dark:bg-slate-900/60 transition-colors">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <span class="text-pink-600 dark:text-pink-400 font-semibold text-sm uppercase tracking-wider">ব্রাউজ করুন</span>
                <h2 class="text-3xl md:text-5xl font-extrabold mt-2 text-slate-900 dark:text-white">
                    জনপ্রিয় <span class="gradient-text">ক্যাটাগরি</span>
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mt-4 max-w-2xl mx-auto">আপনার পছন্দের ক্যাটাগরি বেছে নিন</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @php
                    $categoryImages = [
                        'audio-video' => 'https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=400&h=400&fit=crop&crop=center',
                        'electronics' => 'https://images.unsplash.com/photo-1539008835657-9e8e9680c956?w=400&h=400&fit=crop&crop=center',
                        'computers-accessories' => 'https://images.unsplash.com/photo-1582418702059-97ebafb35d09?w=400&h=400&fit=crop&crop=center',
                        'office-supplies' => 'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=400&h=400&fit=crop&crop=center',
                        'home-living' => 'https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?w=400&h=400&fit=crop&crop=center'
                    ];
                @endphp

                @forelse(\App\Models\Category::where('is_active', true)->get() as $cat)
                    <a href="#collection" class="category-card relative rounded-2xl overflow-hidden group h-48 border border-slate-200 dark:border-white/5 shadow-sm">
                        <img src="{{ $categoryImages[$cat->slug] ?? 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=400&h=400&fit=crop&crop=center' }}" 
                             alt="{{ $cat->name }}" 
                             class="w-full h-full object-cover" />
                        <div class="overlay absolute inset-0 flex items-end p-4">
                            <div>
                                <h3 class="text-white font-bold text-lg">{{ $cat->name }}</h3>
                                <p class="text-white/80 text-sm">কালেকশন দেখুন</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-8">
                        <p class="text-slate-500">কোন ক্যাটাগরি পাওয়া যায়নি।</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- ৫. ফিচার্ড কালেকশন (Featured Collection) -->
    <!-- ============================================================ -->
    <section id="collection" class="section-padding bg-white dark:bg-slate-950 transition-colors">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center mb-12">
                <div>
                    <span class="text-pink-600 dark:text-pink-400 font-semibold text-sm uppercase tracking-wider">কালেকশন</span>
                    <h2 class="text-3xl md:text-5xl font-extrabold mt-2 text-slate-900 dark:text-white">
                        এই সপ্তাহের <span class="gradient-text">হটেস্ট</span> ফ্যাশন
                    </h2>
                </div>
                <a href="#order-form-section" class="text-pink-600 dark:text-pink-400 font-semibold hover:underline text-sm flex items-center gap-1">
                    অর্ডার করতে নিচে যান <i class="fas fa-arrow-down ml-2"></i>
                </a>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($products as $product)
                    <!-- প্রোডাক্ট কার্ড -->
                    <div class="card-hover bg-white dark:bg-slate-900/30 rounded-2xl overflow-hidden shadow-lg group border border-gray-100 dark:border-white/5 flex flex-col justify-between transition-all duration-300">
                        <div>
                            <div class="relative overflow-hidden h-72 bg-slate-100 dark:bg-slate-950 border-b border-slate-200 dark:border-white/5">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500" />
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center text-slate-400 dark:text-slate-600 bg-slate-100 dark:bg-slate-950">
                                        <span class="text-5xl">🛍️</span>
                                        <span class="text-xs text-slate-400 dark:text-slate-500 mt-2">No Image</span>
                                    </div>
                                @endif
                                <div class="absolute top-3 left-3 flex flex-col gap-2">
                                    <span class="bg-pink-600 text-white text-[10px] font-bold px-3 py-1 rounded-full">নতুন</span>
                                    <span class="bg-green-500 text-white text-[10px] font-bold px-3 py-1 rounded-full">-৪৫%</span>
                                </div>
                                <button class="absolute top-3 right-3 bg-white dark:bg-slate-800 rounded-full w-10 h-10 flex items-center justify-center shadow-lg hover:bg-pink-50 dark:hover:bg-slate-700 transition cursor-pointer">
                                    <i class="far fa-heart text-pink-600 dark:text-pink-400 text-lg"></i>
                                </button>
                            </div>
                            
                            <div class="p-5 space-y-2">
                                <div class="flex items-center gap-1 text-xs star-rating mb-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="text-gray-400 dark:text-gray-505 ml-1">(৮৫)</span>
                                </div>
                                @if($product->category)
                                    <p class="text-xs text-pink-600 dark:text-pink-400 font-semibold uppercase">{{ $product->category->name }}</p>
                                @endif
                                <h3 class="font-bold text-lg text-slate-900 dark:text-white mt-1 hover:text-pink-600 dark:hover:text-pink-400 transition line-clamp-1">
                                    {{ $product->name }}
                                </h3>
                                <p class="text-xs text-slate-500 dark:text-gray-400 line-clamp-2 leading-relaxed">
                                    {{ $product->description }}
                                </p>
                                <div class="flex items-center gap-2 mt-2 pt-1">
                                    <span class="text-2xl font-bold text-gray-800 dark:text-white">${{ number_format($product->price, 2) }}</span>
                                    <span class="text-sm text-gray-400 dark:text-gray-505 line-through">${{ number_format($product->price * 1.8, 2) }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="p-5 pt-0">
                            <button type="button" 
                                    onclick="selectAndScrollToProduct({{ $product->id }})"
                                    class="w-full btn-primary text-white py-3.5 rounded-xl font-bold text-center flex items-center justify-center gap-2 cursor-pointer">
                                <i class="fas fa-shopping-cart mr-1"></i> সরাসরি কিনুন
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10 bg-slate-50 dark:bg-slate-900/30 border border-slate-200 dark:border-white/5 rounded-3xl">
                        <span class="text-5xl">🛍️</span>
                        <p class="text-slate-500 mt-2">কোন পণ্য পাওয়া যায়নি।</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- ৬. কেন আমাদের থেকে কিনবেন (Features) -->
    <!-- ============================================================ -->
    <section class="section-padding bg-gradient-to-br from-pink-50 to-purple-50 dark:from-slate-950 dark:to-slate-900/40 border-y border-gray-100 dark:border-white/5 transition-colors">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <span class="text-pink-600 dark:text-pink-400 font-semibold text-sm uppercase tracking-wider">সুবিধা</span>
                <h2 class="text-3xl md:text-5xl font-extrabold mt-2 text-slate-900 dark:text-white">
                    কেন <span class="gradient-text">ট্রেন্ডি ফ্যাশন</span>?
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mt-4 max-w-2xl mx-auto">আমরা কেন আপনার সেরা পছন্দ—জানুন</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white dark:bg-slate-900/30 p-8 rounded-3xl shadow-xl text-center card-hover border border-gray-100 dark:border-white/5">
                    <div class="bg-gradient-to-r from-pink-500 to-purple-500 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <i class="fas fa-truck-fast text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">ফ্রি ডেলিভারি</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">সারা বাংলাদেশে ১০০০৳+ অর্ডারে ফ্রি ডেলিভারি। দ্রুত ও নিরাপদ হোম ডেলিভারি।</p>
                </div>
                
                <div class="bg-white dark:bg-slate-900/30 p-8 rounded-3xl shadow-xl text-center card-hover border border-gray-100 dark:border-white/5">
                    <div class="bg-gradient-to-r from-pink-500 to-purple-500 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <i class="fas fa-undo-alt text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">৭ দিন রিটার্ন</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">পছন্দ না হলে ৭ দিনের মধ্যে ফেরত দিন। ১০০% মানি-ব্যাক গ্যারান্টি।</p>
                </div>
                
                <div class="bg-white dark:bg-slate-900/30 p-8 rounded-3xl shadow-xl text-center card-hover border border-gray-100 dark:border-white/5">
                    <div class="bg-gradient-to-r from-pink-500 to-purple-500 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <i class="fas fa-award text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">প্রিমিয়াম কোয়ালিটি</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">উচ্চমানের ফেব্রিক ও টেকসই ডিজাইন। প্রতিটি পণ্য ১০০% অরিজিনাল।</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- ৭. কাস্টমার টেস্টিমোনিয়াল -->
    <!-- ============================================================ -->
    <section id="reviews" class="section-padding bg-white dark:bg-slate-950 transition-colors">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <span class="text-pink-600 dark:text-pink-400 font-semibold text-sm uppercase tracking-wider">রিভিউ</span>
                <h2 class="text-3xl md:text-5xl font-extrabold mt-2 text-slate-900 dark:text-white">
                    আমাদের ক্রেতারা <span class="gradient-text">কী বলেন</span>
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mt-4 max-w-2xl mx-auto">২,৫০০+ সন্তুষ্ট ক্রেতার মতামত</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Review 1 -->
                <div class="bg-gray-50 dark:bg-slate-900/30 p-8 rounded-3xl shadow-lg card-hover border border-gray-100 dark:border-white/5">
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-6 text-sm italic">
                        "অসাধারণ কোয়ালিটি! আমি যে জ্যাকেটটি কিনেছি তা দেখতে অনেক প্রিমিয়াম। ডেলিভারিও ছিল সময়মতো।"
                    </p>
                    <div class="flex items-center gap-4">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop&crop=center" 
                             alt="User" 
                             class="w-12 h-12 rounded-full object-cover border-2 border-pink-200" />
                        <div>
                            <p class="font-bold text-slate-800 dark:text-white text-sm">সাবরিনা আক্তার</p>
                            <p class="text-xs text-gray-500">ف্যাশন ব্লগার</p>
                        </div>
                    </div>
                </div>
                
                <!-- Review 2 -->
                <div class="bg-gray-50 dark:bg-slate-900/30 p-8 rounded-3xl shadow-lg card-hover border border-gray-100 dark:border-white/5">
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-6 text-sm italic">
                        "ট্রেন্ডি ফ্যাশন আমার গো-টু ব্র্যান্ড। প্রতিটি পণ্যের ডিজাইন অনন্য। দামও খুব রিজনেবল।"
                    </p>
                    <div class="flex items-center gap-4">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&crop=center" 
                             alt="User" 
                             class="w-12 h-12 rounded-full object-cover border-2 border-pink-200" />
                        <div>
                            <p class="font-bold text-slate-800 dark:text-white text-sm">রাহুল চৌধুরী</p>
                            <p class="text-xs text-gray-500">ব্যবসায়ী</p>
                        </div>
                    </div>
                </div>
                
                <!-- Review 3 -->
                <div class="bg-gray-50 dark:bg-slate-900/30 p-8 rounded-3xl shadow-lg card-hover border border-gray-100 dark:border-white/5">
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-6 text-sm italic">
                        "আমি ৩ বার অর্ডার করেছি। প্রতিবারই প্যাকেজিং ও প্রোডাক্ট কোয়ালিটি এক্সিলেন্ট। ১০/১০ সুপারিশ।"
                    </p>
                    <div class="flex items-center gap-4">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&h=100&fit=crop&crop=center" 
                             alt="User" 
                             class="w-12 h-12 rounded-full object-cover border-2 border-pink-200" />
                        <div>
                            <p class="font-bold text-slate-800 dark:text-white text-sm">নিশাত তাসনিম</p>
                            <p class="text-xs text-gray-500">ইউআই/ইউএক্স ডিজাইনার</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- ৮. FAQ (প্রশ্নোত্তর) -->
    <!-- ============================================================ -->
    <section class="section-padding bg-slate-50 dark:bg-slate-900/60 border-t border-slate-200/50 dark:border-white/5 transition-colors">
        <div class="max-w-4xl mx-auto px-4">
            <div class="text-center mb-12">
                <span class="text-pink-600 dark:text-pink-400 font-semibold text-sm uppercase tracking-wider">সচরাচর জিজ্ঞাসা</span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 dark:text-white mt-2">
                    আপনার <span class="gradient-text">প্রশ্ন</span> ও উত্তর
                </h2>
            </div>
            
            <div class="space-y-4">
                <!-- FAQ 1 -->
                <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 p-6 rounded-2xl shadow-md transition">
                    <button type="button" class="w-full text-left font-bold text-lg text-slate-900 dark:text-white flex justify-between items-center focus:outline-none cursor-pointer" onclick="toggleAccordion('faq1')">
                        <span>প্রোডাক্ট ফেরত দেওয়ার নিয়ম কী?</span>
                        <i id="faq1-icon" class="fas fa-chevron-down text-pink-600 transition-transform"></i>
                    </button>
                    <div id="faq1" class="max-h-0 overflow-hidden transition-all duration-300">
                        <p class="text-slate-600 dark:text-gray-400 text-sm mt-3 leading-relaxed">আমরা ৭ দিনের রিটার্ন পলিসি অফার করি। পণ্য অক্ষত অবস্থায় ফেরত দিলে সম্পূর্ণ টাকা ফেরত পাবেন।</p>
                    </div>
                </div>
                
                <!-- FAQ 2 -->
                <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 p-6 rounded-2xl shadow-md transition">
                    <button type="button" class="w-full text-left font-bold text-lg text-slate-900 dark:text-white flex justify-between items-center focus:outline-none cursor-pointer" onclick="toggleAccordion('faq2')">
                        <span>ডেলিভারি কতদিন সময় নেয়?</span>
                        <i id="faq2-icon" class="fas fa-chevron-down text-pink-600 transition-transform"></i>
                    </button>
                    <div id="faq2" class="max-h-0 overflow-hidden transition-all duration-300">
                        <p class="text-slate-600 dark:text-gray-400 text-sm mt-3 leading-relaxed">ঢাকার মধ্যে ২-৩ কর্মদিবস এবং ঢাকার বাইরে ৩-৫ কর্মদিবস সময় লাগে।</p>
                    </div>
                </div>
                
                <!-- FAQ 3 -->
                <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 p-6 rounded-2xl shadow-md transition">
                    <button type="button" class="w-full text-left font-bold text-lg text-slate-900 dark:text-white flex justify-between items-center focus:outline-none cursor-pointer" onclick="toggleAccordion('faq3')">
                        <span>কীভাবে পেমেন্ট করতে পারি?</span>
                        <i id="faq3-icon" class="fas fa-chevron-down text-pink-600 transition-transform"></i>
                    </button>
                    <div id="faq3" class="max-h-0 overflow-hidden transition-all duration-300">
                        <p class="text-slate-600 dark:text-gray-400 text-sm mt-3 leading-relaxed">কোন অনলাইন পেমেন্ট গেটওয়ের ঝামেলা নেই। আমাদের সম্পূর্ণ ক্যাশ অন ডেলিভারি (Cash on Delivery) সিস্টেম। প্রোডাক্ট হাতে পেয়ে দেখে সম্পূর্ণ পেমেন্ট করতে পারবেন।</p>
                    </div>
                </div>
                
                <!-- FAQ 4 -->
                <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 p-6 rounded-2xl shadow-md transition">
                    <button type="button" class="w-full text-left font-bold text-lg text-slate-900 dark:text-white flex justify-between items-center focus:outline-none cursor-pointer" onclick="toggleAccordion('faq4')">
                        <span>প্রোডাক্ট অরিজিনাল কিনা কীভাবে বুঝব?</span>
                        <i id="faq4-icon" class="fas fa-chevron-down text-pink-600 transition-transform"></i>
                    </button>
                    <div id="faq4" class="max-h-0 overflow-hidden transition-all duration-300">
                        <p class="text-slate-600 dark:text-gray-400 text-sm mt-3 leading-relaxed">আমাদের প্রতিটি পণ্যে অরিজিনালিটি ট্যাগ ও QR কোড থাকে। স্ক্যান করেই ভেরিফাই করতে পারবেন।</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- ৯. নিউজলেটার সাবস্ক্রাইব -->
    <!-- ============================================================ -->
    <section class="section-padding bg-gradient-to-r from-pink-600 to-purple-600 text-white relative overflow-hidden">
        <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
        
        <div class="max-w-3xl mx-auto px-4 text-center relative z-10">
            <h2 class="text-3xl md:text-5xl font-extrabold mb-4 text-white">
                আপডেট থাকুন!
            </h2>
            <p class="text-lg opacity-90 mb-8 text-pink-100">
                নতুন কালেকশন, অফার ও ডিসকাউন্ট পেতে সাবস্ক্রাইব করুন
            </p>
            
            <form class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto" onsubmit="event.preventDefault(); alert('ধন্যবাদ! ইমেইল সফলভাবে নিবন্ধিত হয়েছে।'); this.reset();">
                <input type="email" placeholder="আপনার ইমেইল লিখুন" class="flex-1 px-6 py-4 rounded-full text-gray-800 focus:outline-none text-base" required />
                <button type="submit" class="bg-white text-pink-600 px-8 py-4 rounded-full font-bold hover:bg-pink-50 transition shadow-lg cursor-pointer">সাবস্ক্রাইব</button>
            </form>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- ১০. ক্যাশ অন ডেলিভারি অর্ডার ফর্ম (Checkout Form) -->
    <!-- ============================================================ -->
    <section id="order-form-section" class="section-padding bg-gray-50 dark:bg-slate-900/60 transition-colors duration-300">
        <div class="max-w-4xl mx-auto px-4">
            <div class="bg-white dark:bg-slate-900/80 border border-slate-200 dark:border-white/5 rounded-3xl p-8 sm:p-12 shadow-2xl">
                
                <div class="text-center mb-10 pb-6 border-b border-gray-100 dark:border-white/5">
                    <span class="text-xs font-bold text-pink-600 dark:text-pink-400 uppercase tracking-widest">ক্যাশ অন ডেলিভারি অর্ডার ফর্ম</span>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-gray-800 dark:text-white mt-1">অর্ডার নিশ্চিত করতে ফর্মটি পূরণ করুন</h3>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-2">ফর্ম সাবমিট করলে আমাদের প্রতিনিধি কল দিয়ে অর্ডার ভেরিফাই করবেন। কোন এডভান্স পেমেন্ট লাগবে না।</p>
                </div>

                <form action="{{ route('orders.storeDirect') }}" method="POST" class="space-y-8" id="cod-order-form">
                    @csrf

                    @if ($errors->any())
                        <div class="p-4 rounded-xl border border-rose-500/20 bg-rose-50 dark:bg-rose-500/10 text-rose-700 dark:text-rose-400 text-sm">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Left Panel: Product Selection & Pricing -->
                        <div class="space-y-6">
                            <h4 class="text-lg font-bold text-gray-850 dark:text-white border-b border-gray-100 dark:border-white/5 pb-2">১. পণ্য সিলেক্ট করুন</h4>
                            
                            <div class="space-y-2">
                                <label for="product_select" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">পণ্য নির্বাচন করুন</label>
                                <select id="product_select" name="product_id" required 
                                        class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-3.5 text-gray-800 dark:text-white focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500 transition-colors cursor-pointer text-sm">
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" 
                                                data-price="{{ $product->price }}" 
                                                {{ ($featuredProduct && $featuredProduct->id == $product->id) ? 'selected' : '' }}>
                                            {{ $product->name }} (${{ number_format($product->price, 2) }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="space-y-2">
                                <label for="quantity_input" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">পরিমাণ (Quantity)</label>
                                <div class="flex max-w-[140px] bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl overflow-hidden">
                                    <button type="button" id="btn-qty-minus" 
                                            class="px-4 py-3 text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white hover:bg-gray-200/50 dark:hover:bg-white/5 active:bg-gray-200 dark:active:bg-white/10 font-bold transition cursor-pointer">-</button>
                                    <input type="number" id="quantity_input" name="quantity" value="1" min="1" max="10" required 
                                           class="w-full bg-transparent text-center text-gray-800 dark:text-white focus:outline-none border-none [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none font-bold">
                                    <button type="button" id="btn-qty-plus" 
                                            class="px-4 py-3 text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white hover:bg-gray-200/50 dark:hover:bg-white/5 active:bg-gray-200 dark:active:bg-white/10 font-bold transition cursor-pointer">+</button>
                                </div>
                            </div>

                            <!-- Live Price Detail Card -->
                            <div class="bg-gray-50 dark:bg-black/35 border border-gray-100 dark:border-white/5 rounded-2xl p-5 space-y-3 transition-colors">
                                <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                                    <span>ইউনিট মূল্য:</span>
                                    <span id="unit-price-display" class="text-gray-850 dark:text-white font-bold">$0.00</span>
                                </div>
                                <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                                    <span>পরিমাণ:</span>
                                    <span id="quantity-display" class="text-gray-850 dark:text-white font-bold">1</span>
                                </div>
                                <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                                    <span>ডেলিভারি চার্জ:</span>
                                    <span class="text-emerald-600 dark:text-emerald-400 font-extrabold uppercase tracking-wider bg-emerald-100 dark:bg-emerald-500/10 border border-emerald-200 dark:border-emerald-500/20 px-2 py-0.5 rounded text-[10px]">ফ্রি ডেলিভারি</span>
                                </div>
                                <div class="flex justify-between text-base font-bold text-gray-950 dark:text-white border-t border-gray-250 dark:border-white/5 pt-3">
                                    <span>মোট মূল্য:</span>
                                    <span id="total-price-display" class="text-pink-600 dark:text-pink-400 text-xl font-black">$0.00</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right Panel: Shipping Address Inputs -->
                        <div class="space-y-6">
                            <h4 class="text-lg font-bold text-gray-855 dark:text-white border-b border-gray-100 dark:border-white/5 pb-2">২. আপনার ঠিকানা লিখুন</h4>

                            <div class="space-y-2">
                                <label for="customer_name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">আপনার সম্পূর্ণ নাম</label>
                                <input type="text" id="customer_name" name="customer_name" placeholder="যেমন: সাজ্জাদ হোসেন" required 
                                       value="{{ old('customer_name', Auth::check() ? Auth::user()->name : '') }}"
                                       class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-3.5 text-gray-800 dark:text-white placeholder-gray-400 dark:placeholder-gray-600 focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500 transition-colors text-sm font-medium">
                            </div>

                            <div class="space-y-2">
                                <label for="customer_phone" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">মোবাইল নম্বর</label>
                                <input type="tel" id="customer_phone" name="customer_phone" placeholder="যেমন: 017XXXXXXXX" required 
                                       value="{{ old('customer_phone') }}"
                                       class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-3.5 text-gray-800 dark:text-white placeholder-gray-400 dark:placeholder-gray-600 focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500 transition-colors text-sm font-medium">
                            </div>

                            <div class="space-y-2">
                                <label for="customer_email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">ইমেইল এড্রেস (ঐচ্ছিক)</label>
                                <input type="email" id="customer_email" name="customer_email" placeholder="যেমন: user@example.com" 
                                       value="{{ old('customer_email', Auth::check() ? Auth::user()->email : '') }}"
                                       class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-3.5 text-gray-800 dark:text-white placeholder-gray-400 dark:placeholder-gray-600 focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500 transition-colors text-sm font-medium">
                            </div>

                            <div class="space-y-2">
                                <label for="shipping_address" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">পূর্ণ ঠিকানা</label>
                                <textarea id="shipping_address" name="shipping_address" rows="3" placeholder="জেলা, থানা, এলাকা এবং রোড নম্বর লিখুন" required
                                          class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-3 text-gray-800 dark:text-white placeholder-gray-400 dark:placeholder-gray-600 focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500 transition-colors text-sm font-medium">{{ old('shipping_address') }}</textarea>
                            </div>

                            <div class="space-y-2">
                                <label for="note" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">বিশেষ অনুরোধ (ঐচ্ছিক)</label>
                                <input type="text" id="note" name="note" placeholder="যেমন: ডেলিভারির আগে কল দিন" 
                                       value="{{ old('note') }}"
                                       class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-3.5 text-gray-800 dark:text-white placeholder-gray-400 dark:placeholder-gray-600 focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500 transition-colors text-sm font-medium">
                            </div>
                        </div>
                    </div>

                    <div class="text-center pt-4">
                        <button type="submit" class="w-full btn-primary text-white font-extrabold text-lg py-4 rounded-xl shadow-lg cursor-pointer flex items-center justify-center gap-2">
                            <i class="fas fa-check-circle"></i> অর্ডার নিশ্চিত করুন (ক্যাশ অন ডেলিভারি)
                        </button>
                        <p class="text-slate-400 dark:text-gray-500 text-xs mt-4">✓ অর্ডার কনফার্ম করতে কোনো অগ্রিম পেমেন্টের প্রয়োজন নেই।</p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- ১১. ফুটার (Footer) -->
    <!-- ============================================================ -->
    <footer class="bg-gray-900 text-white py-12 transition-colors">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4"><span class="gradient-text">Trendy</span> Fashion</h3>
                <p class="text-gray-400 text-sm leading-relaxed">ট্রেন্ডি ফ্যাশন—আপনার প্রতিদিনের ফ্যাশন পার্টনার। প্রিমিয়াম কোয়ালিটি ও ইউনিক ডিজাইন গ্যারান্টি।</p>
            </div>
            <div>
                <h4 class="font-bold text-lg mb-4">কুইক লিঙ্ক</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-pink-500 transition">হোম</a></li>
                    <li><a href="#collection" class="hover:text-pink-500 transition">কালেকশন</a></li>
                    <li><a href="#categories" class="hover:text-pink-500 transition">ক্যাটাগরি</a></li>
                    <li><a href="#reviews" class="hover:text-pink-500 transition">রিভিউ</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-lg mb-4">সহায়তা</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-pink-500 transition">ডেলিভারি পলিসি</a></li>
                    <li><a href="#" class="hover:text-pink-500 transition">রিটার্ন পলিসি</a></li>
                    <li><a href="#" class="hover:text-pink-500 transition">প্রাইভেসি পলিসি</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-lg mb-4">যোগাযোগ</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><i class="fas fa-phone mr-2"></i> +৮৮০ ১৭১২৩৪৫৬৭৮</li>
                    <li><i class="fas fa-envelope mr-2"></i> support@trendyfashion.com</li>
                    <li><i class="fas fa-map-marker-alt mr-2"></i> ঢাকা, বাংলাদেশ</li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 border-t border-gray-800 mt-8 pt-8 text-center text-sm text-gray-500">
            &copy; ২০২৬ Trendy Fashion. All rights reserved.
        </div>
    </footer>

    <!-- ============================================================ -->
    <!-- ১২. স্ক্রল টু টপ বাটন -->
    <!-- ============================================================ -->
    <button id="scrollTopBtn" class="fixed bottom-6 right-6 z-40 bg-pink-600 hover:bg-pink-700 text-white w-12 h-12 rounded-full shadow-lg flex items-center justify-center translate-y-20 opacity-0 transition-all duration-300 hover:scale-105 active:scale-95 cursor-pointer">
        <i class="fas fa-chevron-up text-lg"></i>
    </button>

    <!-- ============================================================ -->
    <!-- ১৩. ক্লায়েন্ট স্ক্রিপ্টসমূহ -->
    <!-- ============================================================ -->
    <script>
        // Accordion Toggle function
        function toggleAccordion(faqId) {
            const item = document.getElementById(faqId);
            const icon = document.getElementById(faqId + '-icon');
            
            // Close all other FAQs first
            const allFaqs = ['faq1', 'faq2', 'faq3', 'faq4'];
            allFaqs.forEach(id => {
                if (id !== faqId) {
                    const otherItem = document.getElementById(id);
                    const otherIcon = document.getElementById(id + '-icon');
                    if (otherItem) {
                        otherItem.style.maxHeight = '0px';
                        if (otherIcon) otherIcon.style.transform = 'rotate(0deg)';
                    }
                }
            });

            if (item.style.maxHeight === '0px' || item.style.maxHeight === '') {
                item.style.maxHeight = item.scrollHeight + 'px';
                icon.style.transform = 'rotate(180deg)';
            } else {
                item.style.maxHeight = '0px';
                icon.style.transform = 'rotate(0deg)';
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Typing animation strings
            const typedStrings = ["তুলে ধরুন।", "সাজিয়ে নিন।", "প্রকাশ করুন।"];
            let stringIndex = 0;
            let charIndex = 0;
            let isDeleting = false;
            const typedTextSpan = document.getElementById("typedText");
            
            function typeEffect() {
                if (!typedTextSpan) return;
                const currentString = typedStrings[stringIndex];
                
                if (isDeleting) {
                    typedTextSpan.textContent = currentString.substring(0, charIndex - 1);
                    charIndex--;
                } else {
                    typedTextSpan.textContent = currentString.substring(0, charIndex + 1);
                    charIndex++;
                }
                
                let speed = isDeleting ? 50 : 100;
                
                if (!isDeleting && charIndex === currentString.length) {
                    speed = 2000;
                    isDeleting = true;
                } else if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    stringIndex = (stringIndex + 1) % typedStrings.length;
                    speed = 500;
                }
                
                setTimeout(typeEffect, speed);
            }
            
            typeEffect();

            // Mobile Menu Toggle
            const menuToggleBtn = document.getElementById('menuToggle');
            const mobileMenu = document.getElementById('mobileMenu');

            menuToggleBtn.addEventListener('click', () => {
                if (mobileMenu.style.maxHeight === '0px' || mobileMenu.style.maxHeight === '') {
                    mobileMenu.style.maxHeight = mobileMenu.scrollHeight + 'px';
                } else {
                    mobileMenu.style.maxHeight = '0px';
                }
            });

            const mobileLinks = mobileMenu.querySelectorAll('a');
            mobileLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.style.maxHeight = '0px';
                });
            });

            // Scroll to Top button logic
            const scrollTopBtn = document.getElementById('scrollTopBtn');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 400) {
                    scrollTopBtn.classList.remove('opacity-0', 'translate-y-20');
                    scrollTopBtn.classList.add('opacity-100', 'translate-y-0');
                } else {
                    scrollTopBtn.classList.add('opacity-0', 'translate-y-20');
                    scrollTopBtn.classList.remove('opacity-100', 'translate-y-0');
                }
            });

            scrollTopBtn.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

            // Price calculator inputs
            const productSelect = document.getElementById('product_select');
            const quantityInput = document.getElementById('quantity_input');
            const unitPriceDisplay = document.getElementById('unit-price-display');
            const quantityDisplay = document.getElementById('quantity-display');
            const totalPriceDisplay = document.getElementById('total-price-display');
            
            const btnQtyMinus = document.getElementById('btn-qty-minus');
            const btnQtyPlus = document.getElementById('btn-qty-plus');

            // Global scroll connector function
            window.selectAndScrollToProduct = function(productId) {
                if (productSelect) {
                    productSelect.value = productId;
                    const event = new Event('change');
                    productSelect.dispatchEvent(event);
                }
                
                const targetSection = document.getElementById('order-form-section');
                if (targetSection) {
                    targetSection.scrollIntoView({ behavior: 'smooth' });
                }
            };

            // Recalculator
            function updatePricing() {
                if (!productSelect) return;
                const selectedOption = productSelect.options[productSelect.selectedIndex];
                if (!selectedOption) return;

                const price = parseFloat(selectedOption.getAttribute('data-price')) || 0;
                const quantity = parseInt(quantityInput.value) || 1;
                const total = price * quantity;

                unitPriceDisplay.textContent = `$${price.toFixed(2)}`;
                quantityDisplay.textContent = quantity;
                totalPriceDisplay.textContent = `$${total.toFixed(2)}`;
            }

            updatePricing();

            if (productSelect) {
                productSelect.addEventListener('change', updatePricing);
            }

            if (btnQtyMinus) {
                btnQtyMinus.addEventListener('click', () => {
                    let val = parseInt(quantityInput.value) || 1;
                    if (val > 1) {
                        quantityInput.value = val - 1;
                        updatePricing();
                    }
                });
            }

            if (btnQtyPlus) {
                btnQtyPlus.addEventListener('click', () => {
                    let val = parseInt(quantityInput.value) || 1;
                    if (val < 10) {
                        quantityInput.value = val + 1;
                        updatePricing();
                    }
                });
            }

            if (quantityInput) {
                quantityInput.addEventListener('input', () => {
                    let val = parseInt(quantityInput.value);
                    if (isNaN(val) || val < 1) quantityInput.value = 1;
                    if (val > 10) quantityInput.value = 10;
                    updatePricing();
                });
            }

            // Urgency countdown (12h 30m 45s)
            const hoursBox = document.getElementById('hours');
            const minutesBox = document.getElementById('minutes');
            const secondsBox = document.getElementById('seconds');
            
            let countdownTime = (12 * 3600 + 30 * 60 + 45) * 1000;
            
            let interval = setInterval(() => {
                countdownTime -= 1000;
                if (countdownTime <= 0) {
                    clearInterval(interval);
                    return;
                }
                
                const hrs = Math.floor((countdownTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const mins = Math.floor((countdownTime % (1000 * 60 * 60)) / (1000 * 60));
                const secs = Math.floor((countdownTime % (1000 * 60)) / 1000);
                
                if (hoursBox) hoursBox.textContent = String(hrs).padStart(2, '0');
                if (minutesBox) minutesBox.textContent = String(mins).padStart(2, '0');
                if (secondsBox) secondsBox.textContent = String(secs).padStart(2, '0');
            }, 1000);

            // Theme toggling persistence in headers
            const themeSunIcon = document.getElementById('theme-sun-icon');
            const themeMoonIcon = document.getElementById('theme-moon-icon');

            if (document.documentElement.classList.contains('dark')) {
                themeSunIcon.classList.remove('hidden');
            } else {
                themeMoonIcon.classList.remove('hidden');
            }

            const themeToggleBtn = document.getElementById('themeToggleBtn');
            themeToggleBtn.addEventListener('click', () => {
                themeSunIcon.classList.toggle('hidden');
                themeMoonIcon.classList.toggle('hidden');

                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                }
            });
        });
    </script>
@endsection
