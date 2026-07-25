<div class="card-hover bg-white dark:bg-slate-900/30 rounded-3xl overflow-hidden shadow-lg group border border-slate-200 dark:border-white/5 flex flex-col justify-between transition-all duration-300">
    <div>
        <!-- Product Image Area -->
        <div class="relative overflow-hidden h-64 bg-slate-100 dark:bg-slate-950 border-b border-slate-200 dark:border-white/5">
            @if($product->image)
                <img src="{{ \Illuminate\Support\Str::startsWith($product->image, ['http://', 'https://']) ? $product->image : asset('storage/' . $product->image) }}" 
                     alt="{{ $product->name }}" 
                     class="w-full h-full object-cover group-hover:scale-110 transition duration-500" />
            @else
                <div class="w-full h-full flex flex-col items-center justify-center text-slate-400 dark:text-slate-600">
                    <span class="text-5xl">🛍️</span>
                    <span class="text-xs text-slate-400 dark:text-slate-500 mt-2">No Image</span>
                </div>
            @endif
            <div class="absolute top-3 left-3 flex flex-col gap-2">
                <span class="bg-pink-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">নতুন</span>
                <span class="bg-green-500 text-white text-[10px] font-bold px-3 py-1 rounded-full">-৪৫%</span>
            </div>
            @if($product->category)
                <span class="absolute bottom-3 left-3 bg-white/95 dark:bg-slate-800/95 text-slate-700 dark:text-gray-300 text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-lg border border-slate-200/50 dark:border-white/5">
                    {{ $product->category->name }}
                </span>
            @endif
        </div>
        
        <!-- Content Details -->
        <div class="p-5 space-y-2">
            <div class="flex items-center gap-1 text-xs star-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <span class="text-gray-400 dark:text-gray-500 ml-1">(৪৫টি রিভিউ)</span>
            </div>
            <h3 class="font-bold text-lg text-slate-900 dark:text-white mt-1 hover:text-pink-600 transition line-clamp-1">
                <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
            </h3>
            <p class="text-xs text-slate-500 dark:text-gray-400 line-clamp-2 leading-relaxed">
                {{ $product->description }}
            </p>
            <div class="flex items-center gap-2 mt-2 pt-1">
                <span class="text-2xl font-bold text-gray-800 dark:text-white">${{ number_format($product->price, 2) }}</span>
                <span class="text-sm text-gray-400 line-through">${{ number_format($product->price * 1.8, 2) }}</span>
            </div>
        </div>
    </div>

    <!-- Action control buttons -->
    <div class="p-5 pt-0">
        <a href="{{ route('products.show', $product) }}" 
           class="w-full btn-primary text-white py-3 rounded-xl font-bold text-center block text-sm shadow-md transition-all duration-200">
            বিস্তারিত দেখুন
        </a>
    </div>
</div>
