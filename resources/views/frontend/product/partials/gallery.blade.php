<div class="space-y-6">
    <!-- Large Image container -->
    <div class="bg-slate-100 dark:bg-slate-950 border border-slate-200 dark:border-white/5 rounded-3xl overflow-hidden aspect-square flex items-center justify-center shadow-lg relative group">
        @if($product->image)
            <img src="{{ \Illuminate\Support\Str::startsWith($product->image, ['http://', 'https://']) ? $product->image : asset('storage/' . $product->image) }}" 
                 alt="{{ $product->name }}" 
                 class="object-cover w-full h-full group-hover:scale-105 transition duration-500">
        @else
            <div class="text-center opacity-40">
                <span class="text-6xl">📦</span>
                <p class="text-xs mt-2 text-slate-500 dark:text-gray-400">কোন ছবি আপলোড করা হয়নি</p>
            </div>
        @endif
        
        @if($product->category)
            <span class="absolute top-4 left-4 bg-pink-600 text-white text-xs font-bold uppercase tracking-wider px-3.5 py-1.5 rounded-xl shadow-md">
                {{ $product->category->name }}
            </span>
        @endif
    </div>

    <!-- Guarantee Checklist Box -->
    <div class="bg-white dark:bg-slate-900/40 border border-slate-200/60 dark:border-white/5 rounded-2xl p-6 space-y-4 shadow-sm transition-colors">
        <h5 class="font-bold text-gray-800 dark:text-white border-b border-gray-100 dark:border-white/5 pb-2 text-sm flex items-center gap-2">
            <i class="fas fa-shield-halved text-pink-600"></i> শপিং গ্যারান্টি
        </h5>
        <ul class="space-y-3 text-xs sm:text-sm text-slate-600 dark:text-gray-400">
            <li class="flex items-center gap-2.5">
                <span class="text-emerald-500 font-bold">✓</span> সারা বাংলাদেশে ক্যাশ অন ডেলিভারি (COD)
            </li>
            <li class="flex items-center gap-2.5">
                <span class="text-emerald-500 font-bold">✓</span> সম্পূর্ণ ফ্রি শিপিং সুবিধা
            </li>
            <li class="flex items-center gap-2.5">
                <span class="text-emerald-500 font-bold">✓</span> ৭ দিনের সহজ রিটার্ন পলিসি
            </li>
            <li class="flex items-center gap-2.5">
                <span class="text-emerald-500 font-bold">✓</span> ১০০% অরিজিনাল ও এক্সক্লুসিভ কোয়ালিটি পণ্য
            </li>
        </ul>
    </div>
</div>
