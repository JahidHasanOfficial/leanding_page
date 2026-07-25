@extends('layouts.landing')

@section('title', $product->name)

@section('content')
<!-- Ambient background glows -->
<div class="absolute top-20 right-0 w-96 h-96 bg-pink-300 dark:bg-pink-500/10 rounded-full opacity-20 blur-3xl pointer-events-none"></div>
<div class="absolute bottom-20 left-0 w-80 h-80 bg-purple-300 dark:bg-purple-500/10 rounded-full opacity-20 blur-3xl pointer-events-none"></div>

<div class="max-w-7xl mx-auto px-4 py-12 relative z-10">
    <!-- Breadcrumb back link -->
    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 dark:text-gray-400 hover:text-pink-600 dark:hover:text-pink-400 mb-8 transition">
        <i class="fas fa-arrow-left"></i> হোমে ফিরে যান
    </a>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
        
        <!-- Left Side: Product Gallery & Guarantee Badges -->
        <div class="lg:col-span-5 space-y-6">
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

        <!-- Right Side: Details & COD Checkout Form -->
        <div class="lg:col-span-7 space-y-8">
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

            <!-- Instant COD Form Container -->
            <div class="bg-white dark:bg-slate-900/60 border border-slate-200 dark:border-white/5 rounded-3xl p-6 sm:p-8 shadow-xl relative overflow-hidden transition-colors">
                
                <div class="border-b border-gray-100 dark:border-white/5 pb-4 mb-6">
                    <h3 class="text-xl font-bold text-gray-850 dark:text-white">১-ক্লিক ক্যাশ অন ডেলিভারি অর্ডার</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">অর্ডার নিশ্চিত করতে নিচের ফর্মটি পূরণ করুন</p>
                </div>

                @if($product->stock > 0)
                    <form action="{{ route('orders.storeDirect') }}" method="POST" class="space-y-6" id="cod-product-form">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Left form elements: Quantity & cost summary -->
                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <label for="qty_input" class="block text-xs font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wide">পরিমাণ (Quantity)</label>
                                    <div class="flex max-w-[130px] bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl overflow-hidden">
                                        <button type="button" id="qty-minus-btn" class="px-3 py-2 text-gray-500 hover:bg-gray-200/50 dark:hover:bg-white/5 font-bold cursor-pointer">-</button>
                                        <input type="number" id="qty_input" name="quantity" value="1" min="1" max="{{ $product->stock }}" required 
                                               class="w-full bg-transparent text-center text-gray-800 dark:text-white focus:outline-none border-none font-bold [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                                        <button type="button" id="qty-plus-btn" class="px-3 py-2 text-gray-500 hover:bg-gray-200/50 dark:hover:bg-white/5 font-bold cursor-pointer">+</button>
                                    </div>
                                </div>

                                <!-- Cost box -->
                                <div class="bg-slate-50 dark:bg-black/35 border border-slate-100 dark:border-white/5 rounded-2xl p-4 space-y-2">
                                    <div class="flex justify-between text-xs text-gray-500">
                                        <span>ইউনিট মূল্য:</span>
                                        <span class="text-gray-800 dark:text-white font-semibold">${{ number_format($product->price, 2) }}</span>
                                    </div>
                                    <div class="flex justify-between text-xs text-gray-500">
                                        <span>পরিমাণ:</span>
                                        <span id="qty-display" class="text-gray-800 dark:text-white font-semibold">1</span>
                                    </div>
                                    <div class="flex justify-between text-xs text-gray-500">
                                        <span>শিপিং চার্জ:</span>
                                        <span class="text-emerald-500 font-bold uppercase tracking-wider text-[9px] bg-emerald-100 dark:bg-emerald-500/10 px-2 py-0.5 rounded border border-emerald-200/50 dark:border-emerald-500/10">ফ্রি</span>
                                    </div>
                                    <div class="flex justify-between text-sm font-bold text-gray-850 dark:text-white border-t border-slate-100 dark:border-white/5 pt-2 mt-1">
                                        <span>সর্বমোট মূল্য:</span>
                                        <span id="total-price-text" class="text-pink-600 dark:text-pink-400 font-extrabold">${{ number_format($product->price, 2) }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Right form elements: Customer info -->
                            <div class="space-y-4">
                                <div class="space-y-1">
                                    <label for="c_name" class="block text-xs font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wide">আপনার নাম</label>
                                    <input type="text" id="c_name" name="customer_name" placeholder="পূর্ণ নাম লিখুন" required 
                                           value="{{ old('customer_name', Auth::check() ? Auth::user()->name : '') }}"
                                           class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-2.5 text-gray-800 dark:text-white focus:outline-none focus:border-pink-500 transition text-sm">
                                </div>

                                <div class="space-y-1">
                                    <label for="c_phone" class="block text-xs font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wide">মোবাইল নম্বর</label>
                                    <input type="tel" id="c_phone" name="customer_phone" placeholder="সচল মোবাইল নম্বর" required 
                                           value="{{ old('customer_phone') }}"
                                           class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-2.5 text-gray-800 dark:text-white focus:outline-none focus:border-pink-500 transition text-sm">
                                </div>

                                <div class="space-y-1">
                                    <label for="c_addr" class="block text-xs font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wide">পূর্ণ ডেলিভারি ঠিকানা</label>
                                    <textarea id="c_addr" name="shipping_address" rows="2" placeholder="জেলা, থানা, এলাকা ও বাড়ি নম্বর" required
                                              class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-2 text-gray-800 dark:text-white focus:outline-none focus:border-pink-500 transition text-sm">{{ old('shipping_address') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="w-full btn-primary text-white font-extrabold text-base py-3.5 rounded-xl shadow-lg cursor-pointer flex items-center justify-center gap-2">
                            <i class="fas fa-check-circle"></i> অর্ডার কনফার্ম করুন (ক্যাশ অন ডেলিভারি)
                        </button>
                    </form>
                @else
                    <div class="p-4 rounded-xl border border-rose-500/20 bg-rose-50 dark:bg-rose-500/10 text-rose-700 dark:text-rose-400 text-sm text-center font-bold">
                        ⚠️ এই পণ্যটি বর্তমানে স্টক আউট রয়েছে! অনুগ্রহ করে পরবর্তীতে চেষ্টা করুন।
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const qtyInput = document.getElementById('qty_input');
        const qtyDisplay = document.getElementById('qty-display');
        const totalPriceText = document.getElementById('total-price-text');
        
        const qtyMinusBtn = document.getElementById('qty-minus-btn');
        const qtyPlusBtn = document.getElementById('qty-plus-btn');
        
        const unitPrice = parseFloat("{{ $product->price }}") || 0;
        const maxStock = parseInt("{{ $product->stock }}") || 1;

        function updateCalc() {
            if (!qtyInput) return;
            let qty = parseInt(qtyInput.value) || 1;
            qtyDisplay.textContent = qty;
            
            let total = unitPrice * qty;
            totalPriceText.textContent = `$${total.toFixed(2)}`;
        }

        if (qtyMinusBtn) {
            qtyMinusBtn.addEventListener('click', () => {
                let qty = parseInt(qtyInput.value) || 1;
                if (qty > 1) {
                    qtyInput.value = qty - 1;
                    updateCalc();
                }
            });
        }

        if (qtyPlusBtn) {
            qtyPlusBtn.addEventListener('click', () => {
                let qty = parseInt(qtyInput.value) || 1;
                if (qty < maxStock && qty < 10) {
                    qtyInput.value = qty + 1;
                    updateCalc();
                }
            });
        }

        if (qtyInput) {
            qtyInput.addEventListener('input', () => {
                let val = parseInt(qtyInput.value);
                if (isNaN(val) || val < 1) qtyInput.value = 1;
                if (val > maxStock) qtyInput.value = maxStock;
                if (qtyInput.value > 10) qtyInput.value = 10;
                updateCalc();
            });
        }
    });
</script>
@endsection
