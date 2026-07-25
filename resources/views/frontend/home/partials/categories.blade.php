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
                    'electronics' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400&h=400&fit=crop&crop=center',
                    'computers-accessories' => 'https://images.unsplash.com/photo-1582418702059-97ebafb35d09?w=400&h=400&fit=crop&crop=center',
                    'office-supplies' => 'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=400&h=400&fit=crop&crop=center',
                    'home-living' => 'https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?w=400&h=400&fit=crop&crop=center'
                ];
            @endphp

            @forelse($categories as $cat)
                <a href="{{ route('products.index', ['category' => $cat->id]) }}" class="category-card relative rounded-2xl overflow-hidden group h-48 border border-slate-200 dark:border-white/5 shadow-sm">
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
