@if($cartItems->count() > 0)
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-3xl p-6 shadow-sm space-y-6 transition-colors">
        <h4 class="text-base font-bold text-slate-850 dark:text-white border-b border-slate-100 dark:border-white/5 pb-2">অর্ডার সারাংশ</h4>
        
        <div class="space-y-3">
            <div class="flex justify-between text-xs text-gray-500">
                <span>সর্বমোট পণ্য:</span>
                <span class="text-gray-800 dark:text-white font-semibold">{{ $cartCount }} টি</span>
            </div>
            <div class="flex justify-between text-xs text-gray-500">
                <span>উপ-মোট মূল্য:</span>
                <span class="text-gray-800 dark:text-white font-semibold">${{ number_format($cartTotal, 2) }}</span>
            </div>
            <div class="flex justify-between text-xs text-gray-500">
                <span>শিপিং চার্জ:</span>
                <span class="text-emerald-500 font-bold uppercase tracking-wider text-[9px] bg-emerald-100 dark:bg-emerald-500/10 px-2 py-0.5 rounded border border-emerald-200/50 dark:border-emerald-500/10">ফ্রি</span>
            </div>
            <hr class="border-slate-100 dark:border-white/5">
            <div class="flex justify-between text-sm font-bold text-gray-900 dark:text-white">
                <span>সর্বমোট মূল্য:</span>
                <span class="text-pink-600 dark:text-pink-400 font-black">${{ number_format($cartTotal, 2) }}</span>
            </div>
        </div>

        <a href="{{ route('checkout.index') }}" class="w-full btn-primary text-white py-3.5 rounded-xl font-bold text-center block text-sm shadow-md cursor-pointer transition">
            চেকআউট করতে এগিয়ে যান <i class="fas fa-arrow-right ml-2 text-xs"></i>
        </a>
    </div>
@endif
