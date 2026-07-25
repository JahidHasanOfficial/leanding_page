<div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-3xl p-5 shadow-sm flex flex-col md:flex-row justify-between items-center gap-4 transition-colors">
    <div class="w-full md:w-80">
        <form action="{{ route('products.index') }}" method="GET" class="flex gap-2">
            @if($selectedCategory)
                <input type="hidden" name="category" value="{{ $selectedCategory }}">
            @endif
            <input type="text" name="search" placeholder="পণ্য খুঁজুন..." value="{{ request('search') }}"
                   class="flex-1 bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-white/10 rounded-xl px-4 py-2.5 text-xs focus:outline-none focus:border-pink-500 dark:text-white">
            <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white px-5 py-2.5 rounded-xl text-xs font-bold cursor-pointer transition">খুঁজুন</button>
        </form>
    </div>
    <div class="text-xs text-gray-500 dark:text-gray-400 font-semibold">
        মোট {{ $products->total() }} টি পণ্য পাওয়া গেছে
    </div>
</div>
