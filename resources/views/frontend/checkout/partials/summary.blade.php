<div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-3xl p-6 shadow-sm space-y-6 transition-colors">
    <h4 class="text-base font-bold text-slate-850 dark:text-white border-b border-slate-100 dark:border-white/5 pb-2">অর্ডার সারাংশ</h4>
    
    <div class="divide-y divide-slate-100 dark:divide-white/5">
        @foreach($cartItems as $item)
            <div class="py-3 flex justify-between items-center gap-4">
                <div class="text-xs font-medium text-slate-700 dark:text-gray-300">
                    <span class="font-bold text-slate-900 dark:text-white">{{ $item->product->name }}</span> × {{ $item->quantity }}
                </div>
                <div class="text-xs font-bold text-slate-900 dark:text-white">
                    ${{ number_format($item->quantity * $item->product->price, 2) }}
                </div>
            </div>
        @endforeach
    </div>

    <div class="space-y-3 pt-3 border-t border-slate-100 dark:border-white/5">
        <div class="flex justify-between text-xs text-gray-500">
            <span>উপ-মোট মূল্য:</span>
            <span class="text-gray-800 dark:text-white font-semibold">${{ number_format($total, 2) }}</span>
        </div>
        <div class="flex justify-between text-xs text-gray-500">
            <span>ডেলিভারি চার্জ:</span>
            <span class="text-emerald-500 font-bold uppercase tracking-wider text-[9px] bg-emerald-100 dark:bg-emerald-500/10 px-2 py-0.5 rounded border border-emerald-250/50">ফ্রি</span>
        </div>
        <hr class="border-slate-100 dark:border-white/5">
        <div class="flex justify-between text-sm font-bold text-gray-900 dark:text-white">
            <span>সর্বমোট মূল্য:</span>
            <span class="text-pink-650 dark:text-pink-400 font-black">${{ number_format($total, 2) }}</span>
        </div>
    </div>
</div>
