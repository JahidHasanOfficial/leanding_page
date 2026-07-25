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
