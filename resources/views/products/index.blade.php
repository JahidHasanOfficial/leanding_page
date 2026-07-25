@extends('layouts.landing')

@section('title', 'আমাদের প্রোডাক্ট কালেকশন')

@section('content')
<!-- Ambient background glows -->
<div class="absolute top-20 right-0 w-96 h-96 bg-pink-300 dark:bg-pink-500/10 rounded-full opacity-20 blur-3xl pointer-events-none"></div>
<div class="absolute bottom-20 left-0 w-80 h-80 bg-purple-300 dark:bg-purple-500/10 rounded-full opacity-20 blur-3xl pointer-events-none"></div>

<div class="max-w-7xl mx-auto px-4 py-12 relative z-10">
    <!-- Header of the catalog -->
    <div class="text-center max-w-2xl mx-auto mb-12">
        <span class="text-pink-600 dark:text-pink-400 font-semibold text-sm uppercase tracking-wider">শপ ক্যাটালগ</span>
        <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 dark:text-white mt-2">আমাদের পণ্য কালেকশন</h1>
        <p class="text-slate-500 dark:text-gray-400 text-sm mt-3">আপনার প্রয়োজনীয় কোয়ালিটি পণ্যটি বেছে নিয়ে সরাসরি ক্যাশ অন ডেলিভারিতে অর্ডার করুন।</p>
    </div>

    <!-- Category filter chips -->
    @if($categories->count() > 0)
        <div class="bg-white dark:bg-slate-900/40 border border-slate-200 dark:border-white/5 rounded-3xl p-6 mb-12 shadow-sm flex flex-col md:flex-row justify-between items-center gap-6 transition-colors">
            <span class="text-sm font-bold text-gray-800 dark:text-white flex items-center gap-2">
                <i class="fas fa-filter text-pink-600"></i> ক্যাটাগরি ফিল্টার:
            </span>
            <div class="flex flex-wrap gap-2.5">
                <a href="{{ route('products.index') }}" 
                   class="px-5 py-2.5 rounded-full text-xs font-bold transition-all {{ !$selectedCategory ? 'bg-gradient-to-r from-pink-500 to-purple-600 text-white shadow-md' : 'bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-gray-300 hover:bg-pink-50' }}">
                    সব কালেকশন
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('products.index', ['category' => $category->id]) }}" 
                       class="px-5 py-2.5 rounded-full text-xs font-bold transition-all {{ $selectedCategory == $category->id ? 'bg-gradient-to-r from-pink-500 to-purple-600 text-white shadow-md' : 'bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-gray-300 hover:bg-pink-50' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Catalog Product Grid -->
    @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($products as $product)
                <div class="card-hover bg-white dark:bg-slate-900/30 rounded-3xl overflow-hidden shadow-lg group border border-slate-200 dark:border-white/5 flex flex-col justify-between transition-all duration-300">
                    <div>
                        <!-- Product Image Area -->
                        <div class="relative overflow-hidden h-64 bg-slate-100 dark:bg-slate-950 border-b border-slate-250/50 dark:border-white/5">
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
                                <span class="text-gray-400 dark:text-gray-550 ml-1">(৪৫টি রিভিউ)</span>
                            </div>
                            <h3 class="font-bold text-lg text-slate-900 dark:text-white mt-1 hover:text-pink-600 transition line-clamp-1">
                                {{ $product->name }}
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
                    <div class="p-5 pt-0 space-y-2">
                        <a href="{{ route('products.show', $product) }}" 
                           class="w-full btn-primary text-white py-3 rounded-xl font-bold text-center block text-sm shadow-md transition-all duration-200">
                            বিস্তারিত দেখুন
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Custom Pagination Wrapper -->
        <div class="mt-16 flex justify-center">
            {{ $products->links() }}
        </div>
    @else
        <div class="text-center py-16 bg-white dark:bg-slate-900/40 border border-slate-200 dark:border-white/5 rounded-3xl">
            <span class="text-5xl">🛍️</span>
            <p class="text-slate-500 dark:text-gray-400 mt-2">এই ক্যাটাগরিতে কোনো পণ্য পাওয়া যায়নি।</p>
        </div>
    @endif
</div>
@endsection
