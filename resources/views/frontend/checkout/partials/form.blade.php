<form action="{{ route('checkout.store') }}" method="POST" class="space-y-6">
    @csrf

    @if ($errors->any())
        <div class="p-4 rounded-xl border border-rose-500/20 bg-rose-50 dark:bg-rose-500/10 text-rose-700 dark:text-rose-400 text-sm">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-3xl p-6 sm:p-8 shadow-sm space-y-4">
        <h3 class="text-lg font-bold text-slate-900 dark:text-white border-b border-slate-100 dark:border-white/5 pb-2">শিপিং ঠিকানা</h3>
        
        <div class="space-y-1">
            <label for="customer_name" class="block text-xs font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wide">পূর্ণ নাম</label>
            <input type="text" id="customer_name" name="customer_name" placeholder="আপনার পূর্ণ নাম লিখুন" required
                   value="{{ old('customer_name', Auth::check() ? Auth::user()->name : '') }}"
                   class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-2.5 text-gray-800 dark:text-white focus:outline-none focus:border-pink-500 transition text-sm">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="space-y-1">
                <label for="customer_phone" class="block text-xs font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wide">মোবাইল নম্বর</label>
                <input type="tel" id="customer_phone" name="customer_phone" placeholder="মোবাইল নম্বর লিখুন" required
                       value="{{ old('customer_phone') }}"
                       class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-2.5 text-gray-800 dark:text-white focus:outline-none focus:border-pink-500 transition text-sm">
            </div>
            <div class="space-y-1">
                <label for="customer_email" class="block text-xs font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wide">ইমেইল এড্রেস</label>
                <input type="email" id="customer_email" name="customer_email" placeholder="ইমেইল (ঐচ্ছিক)"
                       value="{{ old('customer_email', Auth::check() ? Auth::user()->email : '') }}"
                       class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-2.5 text-gray-800 dark:text-white focus:outline-none focus:border-pink-500 transition text-sm">
            </div>
        </div>

        <div class="space-y-1">
            <label for="shipping_address" class="block text-xs font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wide">ডেলিভারি ঠিকানা</label>
            <textarea id="shipping_address" name="shipping_address" rows="2" placeholder="বাড়ি নম্বর, সড়ক, এলাকা" required
                      class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-2.5 text-gray-800 dark:text-white focus:outline-none focus:border-pink-500 transition text-sm">{{ old('shipping_address') }}</textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="space-y-1">
                <label for="shipping_city" class="block text-xs font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wide">শহর (City)</label>
                <input type="text" id="shipping_city" name="shipping_city" placeholder="যেমন: ঢাকা" required
                       value="{{ old('shipping_city') }}"
                       class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-2.5 text-gray-800 dark:text-white focus:outline-none focus:border-pink-500 transition text-sm">
            </div>
            <div class="space-y-1">
                <label for="shipping_postal_code" class="block text-xs font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wide">পোস্টাল কোড</label>
                <input type="text" id="shipping_postal_code" name="shipping_postal_code" placeholder="যেমন: ১২১২" required
                       value="{{ old('shipping_postal_code') }}"
                       class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-2.5 text-gray-800 dark:text-white focus:outline-none focus:border-pink-500 transition text-sm">
            </div>
            <div class="space-y-1">
                <label for="shipping_country" class="block text-xs font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wide">দেশ</label>
                <input type="text" id="shipping_country" name="shipping_country" value="Bangladesh" required
                       class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-2.5 text-gray-800 dark:text-white focus:outline-none focus:border-pink-500 transition text-sm">
            </div>
        </div>

        <div class="space-y-1">
            <label for="note" class="block text-xs font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wide">অর্ডার নোট</label>
            <input type="text" id="note" name="note" placeholder="যেমন: ডেলিভারির আগে ফোন দিন (ঐচ্ছিক)"
                   value="{{ old('note') }}"
                   class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-2.5 text-gray-800 dark:text-white focus:outline-none focus:border-pink-500 transition text-sm">
        </div>
    </div>

    <div class="flex justify-between items-center pt-4">
        <a href="{{ route('cart.index') }}" class="text-xs font-bold text-slate-500 hover:text-pink-600 transition flex items-center gap-1">
            <i class="fas fa-arrow-left"></i> কার্টে ফিরে যান
        </a>
        <button type="submit" class="btn-primary text-white font-extrabold text-sm px-8 py-3.5 rounded-xl shadow-lg cursor-pointer transition">
            অর্ডার নিশ্চিত করুন (COD)
        </button>
    </div>
</form>
