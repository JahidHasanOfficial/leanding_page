<section id="collection" class="section-padding bg-white dark:bg-slate-950 transition-colors">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center mb-12">
            <div>
                <span class="text-pink-600 dark:text-pink-400 font-semibold text-sm uppercase tracking-wider">কালেকশন</span>
                <h2 class="text-3xl md:text-5xl font-extrabold mt-2 text-slate-900 dark:text-white">
                    এই সপ্তাহের <span class="gradient-text">হটেস্ট</span> ফ্যাশন
                </h2>
            </div>
            <a href="{{ route('products.index') }}" class="text-pink-600 dark:text-pink-400 font-semibold hover:underline text-sm flex items-center gap-1">
                সব কালেকশন দেখুন <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($products->take(8) as $product)
                <!-- প্রোডাক্ট কার্ড -->
                <div class="card-hover bg-white dark:bg-slate-900/30 rounded-2xl overflow-hidden shadow-lg group border border-gray-100 dark:border-white/5 flex flex-col justify-between transition-all duration-300">
                    <div>
                        <div class="relative overflow-hidden h-72 bg-slate-100 dark:bg-slate-950 border-b border-slate-200 dark:border-white/5">
                            @if($product->image)
                                <img src="{{ \Illuminate\Support\Str::startsWith($product->image, ['http://', 'https://']) ? $product->image : asset('storage/' . $product->image) }}" 
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
                            <a href="{{ route('products.show', $product) }}" class="absolute bottom-3 left-1/2 -translate-x-1/2 bg-white/90 backdrop-blur-sm px-6 py-2 rounded-full text-sm font-bold text-gray-700 opacity-0 group-hover:opacity-100 transition shadow-lg hover:bg-pink-600 hover:text-white">
                                <i class="fas fa-eye mr-2"></i> বিস্তারিত
                            </a>
                        </div>
                        
                        <div class="p-5 space-y-2">
                            <div class="flex items-center gap-1 text-xs star-rating mb-1">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="text-gray-400 dark:text-gray-500 ml-1">(৮৫)</span>
                            </div>
                            @if($product->category)
                                <p class="text-xs text-pink-600 dark:text-pink-400 font-semibold uppercase">{{ $product->category->name }}</p>
                            @endif
                            <h3 class="font-bold text-lg text-slate-900 dark:text-white mt-1 hover:text-pink-600 dark:hover:text-pink-400 transition line-clamp-1">
                                <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                            </h3>
                            <p class="text-xs text-slate-500 dark:text-gray-400 line-clamp-2 leading-relaxed">
                                {{ $product->description }}
                            </p>
                            <div class="flex items-center gap-2 mt-2 pt-1">
                                <span class="text-2xl font-bold text-gray-800 dark:text-white">${{ number_format($product->price, 2) }}</span>
                                <span class="text-sm text-gray-400 dark:text-gray-500 line-through">${{ number_format($product->price * 1.8, 2) }}</span>
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
