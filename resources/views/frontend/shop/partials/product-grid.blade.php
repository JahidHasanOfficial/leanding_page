@if($products->count() > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $product)
            @include('frontend.shop.partials.product-card', ['product' => $product])
        @endforeach
    </div>
@else
    <div class="text-center py-16 bg-white dark:bg-slate-900/40 border border-slate-200 dark:border-white/5 rounded-3xl">
        <span class="text-5xl">🛍️</span>
        <p class="text-slate-500 dark:text-gray-400 mt-2">এই ক্যাটাগরিতে কোনো পণ্য পাওয়া যায়নি।</p>
    </div>
@endif
