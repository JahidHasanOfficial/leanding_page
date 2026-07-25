<div class="space-y-4">
    <div class="flex items-center gap-2 text-xs text-yellow-400 star-rating">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <span class="text-gray-400 dark:text-gray-500 ml-1 text-sm font-semibold">(১১০টি কাস্টমার রিভিউ)</span>
    </div>

    <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-850 dark:text-white">{{ $product->name }}</h1>
    
    <div class="flex items-center gap-4">
        <span class="text-3xl font-black text-pink-600 dark:text-pink-400">${{ number_format($product->price, 2) }}</span>
        <span class="text-lg text-slate-400 line-through">${{ number_format($product->price * 1.8, 2) }}</span>
        <span class="bg-green-500 text-white text-xs font-bold px-2.5 py-1 rounded-lg uppercase tracking-wide">-৪৫% ডিসকাউন্ট</span>
    </div>

    <p class="text-slate-600 dark:text-gray-300 text-sm sm:text-base leading-relaxed">
        {{ $product->description }} এই প্রিমিয়াম কোয়ালিটি সম্পন্ন পণ্যটি আপনাকে দেবে সেরা ফিনিশিং ও স্টাইলিশ লুক। আজই অর্ডার করুন এবং সম্পূর্ণ ঝুঁকিমুক্ত শপিংয়ের অভিজ্ঞতা উপভোগ করুন।
    </p>

    <div class="flex items-center gap-6 pt-2 text-sm text-slate-500 dark:text-gray-400">
        <div>
            <strong>স্টক স্ট্যাটাস:</strong> 
            @if($product->stock > 10)
                <span class="text-emerald-600 dark:text-emerald-400 font-bold">ইন স্টক ({{ $product->stock }} টি উপলব্ধ)</span>
            @elseif($product->stock > 0)
                <span class="text-amber-600 dark:text-amber-400 font-bold">সীমিত স্টক ({{ $product->stock }} টি উপলব্ধ)</span>
            @else
                <span class="text-rose-600 font-bold">স্টক আউট</span>
            @endif
        </div>
    </div>
</div>
