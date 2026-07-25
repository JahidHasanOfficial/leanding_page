@extends('layouts.frontend')

@section('title', 'Trendy Fashion – প্রিমিয়াম ফ্যাশন ব্র্যান্ড')

@section('content')

    <!-- ১. হিরো সেকশন -->
    @include('frontend.home.partials.hero')

    <!-- ২. ব্র্যান্ড লোগো স্ক্রল -->
    <section class="py-8 bg-white dark:bg-slate-950 border-y border-gray-100 dark:border-white/5 overflow-hidden transition-colors">
        <div class="max-w-7xl mx-auto px-4">
            <p class="text-center text-xs text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-4">বিশ্বস্ত ব্র্যান্ডগুলো আমাদের বিশ্বাস করে</p>
            <div class="flex whitespace-nowrap brand-scroll">
                <div class="flex items-center gap-16 opacity-60 dark:opacity-50">
                    <span class="text-2xl font-bold text-gray-400">GUCCI</span>
                    <span class="text-2xl font-bold text-gray-400">PRADA</span>
                    <span class="text-2xl font-bold text-gray-400">ZARA</span>
                    <span class="text-2xl font-bold text-gray-400">H&M</span>
                    <span class="text-2xl font-bold text-gray-400">LOUIS</span>
                    <span class="text-2xl font-bold text-gray-400">CHANEL</span>
                    <span class="text-2xl font-bold text-gray-400">GUCCI</span>
                    <span class="text-2xl font-bold text-gray-400">PRADA</span>
                    <span class="text-2xl font-bold text-gray-400">ZARA</span>
                    <span class="text-2xl font-bold text-gray-400">H&M</span>
                    <span class="text-2xl font-bold text-gray-400">LOUIS</span>
                    <span class="text-2xl font-bold text-gray-400">CHANEL</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ৩. ক্যাটাগরি সেকশন -->
    @include('frontend.home.partials.categories')

    <!-- ৪. ফিচার্ড কালেকশন -->
    @include('frontend.home.partials.featured')

    <!-- ৫. কেন আমাদের পছন্দ করবেন (Features) -->
    <section class="section-padding bg-gradient-to-br from-pink-50 to-purple-50 dark:from-slate-950 dark:to-slate-900/40 border-y border-gray-100 dark:border-white/5 transition-colors">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <span class="text-pink-600 dark:text-pink-400 font-semibold text-sm uppercase tracking-wider">সুবিধা</span>
                <h2 class="text-3xl md:text-5xl font-extrabold mt-2 text-slate-900 dark:text-white">
                    কেন <span class="gradient-text">ট্রেন্ডি ফ্যাশন</span>?
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mt-4 max-w-2xl mx-auto">আমরা কেন আপনার সেরা পছন্দ—জানুন</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white dark:bg-slate-900/30 p-8 rounded-3xl shadow-xl text-center card-hover border border-gray-100 dark:border-white/5 animate-fade-in">
                    <div class="bg-gradient-to-r from-pink-500 to-purple-500 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <i class="fas fa-truck-fast text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">ফ্রি ডেলিভারি</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">সারা বাংলাদেশে ১০০০৳+ অর্ডারে ফ্রি ডেলিভারি। দ্রুত ও নিরাপদ হোম ডেলিভারি।</p>
                </div>
                
                <div class="bg-white dark:bg-slate-900/30 p-8 rounded-3xl shadow-xl text-center card-hover border border-gray-100 dark:border-white/5 animate-fade-in" style="animation-delay: 0.1s;">
                    <div class="bg-gradient-to-r from-pink-500 to-purple-500 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <i class="fas fa-undo-alt text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">৭ দিন রিটার্ন</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">পছন্দ না হলে ৭ দিনের মধ্যে ফেরত দিন। ১০০% মানি-ব্যাক গ্যারান্টি।</p>
                </div>
                
                <div class="bg-white dark:bg-slate-900/30 p-8 rounded-3xl shadow-xl text-center card-hover border border-gray-100 dark:border-white/5 animate-fade-in" style="animation-delay: 0.2s;">
                    <div class="bg-gradient-to-r from-pink-500 to-purple-500 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <i class="fas fa-award text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">প্রিমিয়াম কোয়ালিটি</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">উচ্চমানের ফেব্রিক ও টেকসই ডিজাইন। প্রতিটি পণ্য ১০০% অরিজিনাল।</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ৬. কাস্টমার রিভিউ টেস্টিমোনিয়াল -->
    @include('frontend.home.partials.testimonials')

    <!-- ৭. প্রশ্নোত্তর (FAQ) -->
    <section class="section-padding bg-slate-50 dark:bg-slate-900/60 border-t border-slate-200/50 dark:border-white/5 transition-colors">
        <div class="max-w-4xl mx-auto px-4">
            <div class="text-center mb-12">
                <span class="text-pink-600 dark:text-pink-400 font-semibold text-sm uppercase tracking-wider">সচরাচর জিজ্ঞাসা</span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 dark:text-white mt-2">
                    আপনার <span class="gradient-text">প্রশ্ন</span> ও উত্তর
                </h2>
            </div>
            
            <div class="space-y-4">
                <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 p-6 rounded-2xl shadow-md transition">
                    <button type="button" class="w-full text-left font-bold text-lg text-slate-900 dark:text-white flex justify-between items-center focus:outline-none cursor-pointer" onclick="toggleAccordion('faq1')">
                        <span>প্রোডাক্ট ফেরত দেওয়ার নিয়ম কী?</span>
                        <i id="faq1-icon" class="fas fa-chevron-down text-pink-600 transition-transform"></i>
                    </button>
                    <div id="faq1" class="max-h-0 overflow-hidden transition-all duration-300">
                        <p class="text-slate-600 dark:text-gray-400 text-sm mt-3 leading-relaxed">আমরা ৭ দিনের রিটার্ন পলিসি অফার করি। পণ্য অক্ষত অবস্থায় ফেরত দিলে সম্পূর্ণ টাকা ফেরত পাবেন।</p>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 p-6 rounded-2xl shadow-md transition">
                    <button type="button" class="w-full text-left font-bold text-lg text-slate-900 dark:text-white flex justify-between items-center focus:outline-none cursor-pointer" onclick="toggleAccordion('faq2')">
                        <span>ডেলিভারি কতদিন সময় নেয়?</span>
                        <i id="faq2-icon" class="fas fa-chevron-down text-pink-600 transition-transform"></i>
                    </button>
                    <div id="faq2" class="max-h-0 overflow-hidden transition-all duration-300">
                        <p class="text-slate-600 dark:text-gray-400 text-sm mt-3 leading-relaxed">ঢাকার মধ্যে ২-৩ কর্মদিবস এবং ঢাকার বাইরে ৩-৫ কর্মদিবস সময় লাগে।</p>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 p-6 rounded-2xl shadow-md transition">
                    <button type="button" class="w-full text-left font-bold text-lg text-slate-900 dark:text-white flex justify-between items-center focus:outline-none cursor-pointer" onclick="toggleAccordion('faq3')">
                        <span>কীভাবে পেমেন্ট করতে পারি?</span>
                        <i id="faq3-icon" class="fas fa-chevron-down text-pink-600 transition-transform"></i>
                    </button>
                    <div id="faq3" class="max-h-0 overflow-hidden transition-all duration-300">
                        <p class="text-slate-600 dark:text-gray-400 text-sm mt-3 leading-relaxed">কোন অনলাইন পেমেন্ট গেটওয়ের ঝামেলা নেই। আমাদের সম্পূর্ণ ক্যাশ অন ডেলিভারি (Cash on Delivery) সিস্টেম। প্রোডাক্ট হাতে পেয়ে দেখে সম্পূর্ণ পেমেন্ট করতে পারবেন।</p>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 p-6 rounded-2xl shadow-md transition">
                    <button type="button" class="w-full text-left font-bold text-lg text-slate-900 dark:text-white flex justify-between items-center focus:outline-none cursor-pointer" onclick="toggleAccordion('faq4')">
                        <span>প্রোডাক্ট অরিজিনাল কিনা কীভাবে বুঝব?</span>
                        <i id="faq4-icon" class="fas fa-chevron-down text-pink-600 transition-transform"></i>
                    </button>
                    <div id="faq4" class="max-h-0 overflow-hidden transition-all duration-300">
                        <p class="text-slate-600 dark:text-gray-400 text-sm mt-3 leading-relaxed">আমাদের প্রতিটি পণ্যে অরিজিনালিটি ট্যাগ ও QR কোড থাকে। স্ক্যান করেই ভেরিফাই করতে পারবেন।</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ৮. নিউজলেটার ইন-লাইন -->
    @include('frontend.home.partials.newsletter')

    <!-- ৯. ক্যাশ অন ডেলিভারি অর্ডার ফর্ম (Checkout Form) -->
    <section id="order-form-section" class="section-padding bg-gray-50 dark:bg-slate-900/60 transition-colors duration-300">
        <div class="max-w-4xl mx-auto px-4">
            <div class="bg-white dark:bg-slate-900/80 border border-slate-200 dark:border-white/5 rounded-3xl p-8 sm:p-12 shadow-2xl">
                
                <div class="text-center mb-10 pb-6 border-b border-gray-100 dark:border-white/5">
                    <span class="text-xs font-bold text-pink-600 dark:text-pink-400 uppercase tracking-widest">ক্যাশ অন ডেলিভারি অর্ডার ফর্ম</span>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-gray-800 dark:text-white mt-1">অর্ডার নিশ্চিত করতে ফর্মটি পূরণ করুন</h3>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-2">ফর্ম সাবমিট করলে আমাদের প্রতিনিধি কল দিয়ে অর্ডার ভেরিফাই করবেন। কোন এডভান্স পেমেন্ট লাগবে না।</p>
                </div>

                <form action="{{ route('checkout.storeDirect') }}" method="POST" class="space-y-8" id="cod-order-form">
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

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Left Panel: Product Selection & Pricing -->
                        <div class="space-y-6">
                            <h4 class="text-lg font-bold text-gray-850 dark:text-white border-b border-gray-100 dark:border-white/5 pb-2">১. পণ্য সিলেক্ট করুন</h4>
                            
                            <div class="space-y-2">
                                <label for="product_select" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">পণ্য নির্বাচন করুন</label>
                                <select id="product_select" name="product_id" required 
                                        class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-3.5 text-gray-800 dark:text-white focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500 transition-colors cursor-pointer text-sm">
                                    @foreach($products as $prod)
                                        <option value="{{ $prod->id }}" 
                                                data-price="{{ $prod->price }}" 
                                                {{ ($featuredProduct && $featuredProduct->id == $prod->id) ? 'selected' : '' }}>
                                            {{ $prod->name }} (${{ number_format($prod->price, 2) }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="space-y-2">
                                <label for="quantity_input" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">পরিমাণ (Quantity)</label>
                                <div class="flex max-w-[140px] bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl overflow-hidden">
                                    <button type="button" id="btn-qty-minus" 
                                            class="px-4 py-3 text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white hover:bg-gray-200/50 dark:hover:bg-white/5 active:bg-gray-200 dark:active:bg-white/10 font-bold transition cursor-pointer">-</button>
                                    <input type="number" id="quantity_input" name="quantity" value="1" min="1" max="10" required 
                                           class="w-full bg-transparent text-center text-gray-800 dark:text-white focus:outline-none border-none [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none font-bold">
                                    <button type="button" id="btn-qty-plus" 
                                            class="px-4 py-3 text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white hover:bg-gray-200/50 dark:hover:bg-white/5 active:bg-gray-200 dark:active:bg-white/10 font-bold transition cursor-pointer">+</button>
                                </div>
                            </div>

                            <!-- Live Price Detail Card -->
                            <div class="bg-gray-50 dark:bg-black/35 border border-gray-100 dark:border-white/5 rounded-2xl p-5 space-y-3 transition-colors">
                                <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                                    <span>ইউনিট মূল্য:</span>
                                    <span id="unit-price-display" class="text-gray-855 dark:text-white font-bold">$0.00</span>
                                </div>
                                <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                                    <span>পরিমাণ:</span>
                                    <span id="quantity-display" class="text-gray-855 dark:text-white font-bold">1</span>
                                </div>
                                <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                                    <span>ডেলিভারি চার্জ:</span>
                                    <span class="text-emerald-600 dark:text-emerald-400 font-extrabold uppercase tracking-wider bg-emerald-100 dark:bg-emerald-500/10 border border-emerald-200 dark:border-emerald-500/20 px-2 py-0.5 rounded text-[10px]">ফ্রি ডেলিভারি</span>
                                </div>
                                <div class="flex justify-between text-base font-bold text-gray-950 dark:text-white border-t border-gray-250 dark:border-white/5 pt-3">
                                    <span>মোট মূল্য:</span>
                                    <span id="total-price-display" class="text-pink-600 dark:text-pink-400 text-xl font-black">$0.00</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right Panel: Shipping Address Inputs -->
                        <div class="space-y-6">
                            <h4 class="text-lg font-bold text-gray-855 dark:text-white border-b border-gray-100 dark:border-white/5 pb-2">২. আপনার ঠিকানা লিখুন</h4>

                            <div class="space-y-2">
                                <label for="customer_name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">আপনার সম্পূর্ণ নাম</label>
                                <input type="text" id="customer_name" name="customer_name" placeholder="যেমন: সাজ্জাদ হোসেন" required 
                                       value="{{ old('customer_name', Auth::check() ? Auth::user()->name : '') }}"
                                       class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-3.5 text-gray-800 dark:text-white placeholder-gray-400 dark:placeholder-gray-600 focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500 transition-colors text-sm font-medium">
                            </div>

                            <div class="space-y-2">
                                <label for="customer_phone" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">মোবাইল নম্বর</label>
                                <input type="tel" id="customer_phone" name="customer_phone" placeholder="যেমন: 017XXXXXXXX" required 
                                       value="{{ old('customer_phone') }}"
                                       class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-3.5 text-gray-800 dark:text-white placeholder-gray-400 dark:placeholder-gray-600 focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500 transition-colors text-sm font-medium">
                            </div>

                            <div class="space-y-2">
                                <label for="customer_email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">ইমেইল এড্রেস (ঐচ্ছিক)</label>
                                <input type="email" id="customer_email" name="customer_email" placeholder="যেমন: user@example.com" 
                                       value="{{ old('customer_email', Auth::check() ? Auth::user()->email : '') }}"
                                       class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-3.5 text-gray-800 dark:text-white placeholder-gray-400 dark:placeholder-gray-600 focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500 transition-colors text-sm font-medium">
                            </div>

                            <div class="space-y-2">
                                <label for="shipping_address" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">পূর্ণ ঠিকানা</label>
                                <textarea id="shipping_address" name="shipping_address" rows="3" placeholder="জেলা, থানা, এলাকা এবং রোড নম্বর লিখুন" required
                                          class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-3 text-gray-800 dark:text-white placeholder-gray-400 dark:placeholder-gray-600 focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500 transition-colors text-sm font-medium">{{ old('shipping_address') }}</textarea>
                            </div>

                            <div class="space-y-2">
                                <label for="note" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">विशेष অনুরোধ (ঐচ্ছিক)</label>
                                <input type="text" id="note" name="note" placeholder="যেমন: ডেলিভারির আগে কল দিন" 
                                       value="{{ old('note') }}"
                                       class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-3.5 text-gray-800 dark:text-white placeholder-gray-400 dark:placeholder-gray-600 focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500 transition-colors text-sm font-medium">
                            </div>
                        </div>
                    </div>

                    <div class="text-center pt-4">
                        <button type="submit" class="w-full btn-primary text-white font-extrabold text-lg py-4 rounded-xl shadow-lg cursor-pointer flex items-center justify-center gap-2">
                            <i class="fas fa-check-circle"></i> অর্ডার নিশ্চিত করুন (ক্যাশ অন ডেলিভারি)
                        </button>
                        <p class="text-slate-400 dark:text-gray-500 text-xs mt-4">✓ অর্ডার কনফার্ম করতে কোনো অগ্রিম পেমেন্টের প্রয়োজন নেই।</p>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        // Accordion Toggle function
        function toggleAccordion(faqId) {
            const item = document.getElementById(faqId);
            const icon = document.getElementById(faqId + '-icon');
            
            // Close all other FAQs first
            const allFaqs = ['faq1', 'faq2', 'faq3', 'faq4'];
            allFaqs.forEach(id => {
                if (id !== faqId) {
                    const otherItem = document.getElementById(id);
                    const otherIcon = document.getElementById(id + '-icon');
                    if (otherItem) {
                        otherItem.style.maxHeight = '0px';
                        if (otherIcon) otherIcon.style.transform = 'rotate(0deg)';
                    }
                }
            });

            if (item.style.maxHeight === '0px' || item.style.maxHeight === '') {
                item.style.maxHeight = item.scrollHeight + 'px';
                icon.style.transform = 'rotate(180deg)';
            } else {
                item.style.maxHeight = '0px';
                icon.style.transform = 'rotate(0deg)';
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Typing animation strings
            const typedStrings = ["তুলে ধরুন।", "সাজিয়ে নিন।", "প্রকাশ করুন।"];
            let stringIndex = 0;
            let charIndex = 0;
            let isDeleting = false;
            const typedTextSpan = document.getElementById("typedText");
            
            function typeEffect() {
                if (!typedTextSpan) return;
                const currentString = typedStrings[stringIndex];
                
                if (isDeleting) {
                    typedTextSpan.textContent = currentString.substring(0, charIndex - 1);
                    charIndex--;
                } else {
                    typedTextSpan.textContent = currentString.substring(0, charIndex + 1);
                    charIndex++;
                }
                
                let speed = isDeleting ? 50 : 100;
                
                if (!isDeleting && charIndex === currentString.length) {
                    speed = 2000;
                    isDeleting = true;
                } else if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    stringIndex = (stringIndex + 1) % typedStrings.length;
                    speed = 500;
                }
                
                setTimeout(typeEffect, speed);
            }
            
            typeEffect();

            // Mobile Menu Toggle logic
            const menuToggleBtn = document.getElementById('menuToggle');
            const mobileMenu = document.getElementById('mobileMenu');

            if (menuToggleBtn && mobileMenu) {
                menuToggleBtn.addEventListener('click', () => {
                    if (mobileMenu.style.maxHeight === '0px' || mobileMenu.style.maxHeight === '') {
                        mobileMenu.style.maxHeight = mobileMenu.scrollHeight + 'px';
                    } else {
                        mobileMenu.style.maxHeight = '0px';
                    }
                });

                const mobileLinks = mobileMenu.querySelectorAll('a');
                mobileLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        mobileMenu.style.maxHeight = '0px';
                    });
                });
            }

            // Price calculator inputs
            const productSelect = document.getElementById('product_select');
            const quantityInput = document.getElementById('quantity_input');
            const unitPriceDisplay = document.getElementById('unit-price-display');
            const quantityDisplay = document.getElementById('quantity-display');
            const totalPriceDisplay = document.getElementById('total-price-display');
            
            const btnQtyMinus = document.getElementById('btn-qty-minus');
            const btnQtyPlus = document.getElementById('btn-qty-plus');

            // Global scroll connector function
            window.selectAndScrollToProduct = function(productId) {
                if (productSelect) {
                    productSelect.value = productId;
                    const event = new Event('change');
                    productSelect.dispatchEvent(event);
                }
                
                const targetSection = document.getElementById('order-form-section');
                if (targetSection) {
                    targetSection.scrollIntoView({ behavior: 'smooth' });
                }
            };

            // Recalculator
            function updatePricing() {
                if (!productSelect) return;
                const selectedOption = productSelect.options[productSelect.selectedIndex];
                if (!selectedOption) return;

                const price = parseFloat(selectedOption.getAttribute('data-price')) || 0;
                const quantity = parseInt(quantityInput.value) || 1;
                const total = price * quantity;

                unitPriceDisplay.textContent = `$${price.toFixed(2)}`;
                quantityDisplay.textContent = quantity;
                totalPriceDisplay.textContent = `$${total.toFixed(2)}`;
            }

            updatePricing();

            if (productSelect) {
                productSelect.addEventListener('change', updatePricing);
            }

            if (btnQtyMinus) {
                btnQtyMinus.addEventListener('click', () => {
                    let val = parseInt(quantityInput.value) || 1;
                    if (val > 1) {
                        quantityInput.value = val - 1;
                        updatePricing();
                    }
                });
            }

            if (btnQtyPlus) {
                btnQtyPlus.addEventListener('click', () => {
                    let val = parseInt(quantityInput.value) || 1;
                    if (val < 10) {
                        quantityInput.value = val + 1;
                        updatePricing();
                    }
                });
            }

            if (quantityInput) {
                quantityInput.addEventListener('input', () => {
                    let val = parseInt(quantityInput.value);
                    if (isNaN(val) || val < 1) quantityInput.value = 1;
                    if (val > 10) quantityInput.value = 10;
                    updatePricing();
                });
            }

            // Urgency countdown (12h 30m 45s)
            const hoursBox = document.getElementById('hours');
            const minutesBox = document.getElementById('minutes');
            const secondsBox = document.getElementById('seconds');
            
            let countdownTime = (12 * 3600 + 30 * 60 + 45) * 1000;
            
            let interval = setInterval(() => {
                countdownTime -= 1000;
                if (countdownTime <= 0) {
                    clearInterval(interval);
                    return;
                }
                
                const hrs = Math.floor((countdownTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const mins = Math.floor((countdownTime % (1000 * 60 * 60)) / (1000 * 60));
                const secs = Math.floor((countdownTime % (1000 * 60)) / 1000);
                
                if (hoursBox) hoursBox.textContent = String(hrs).padStart(2, '0');
                if (minutesBox) minutesBox.textContent = String(mins).padStart(2, '0');
                if (secondsBox) secondsBox.textContent = String(secs).padStart(2, '0');
            }, 1000);

            // Theme toggling persistence in headers
            const themeSunIcon = document.getElementById('theme-sun-icon');
            const themeMoonIcon = document.getElementById('theme-moon-icon');

            if (document.documentElement.classList.contains('dark')) {
                if (themeSunIcon) themeSunIcon.classList.remove('hidden');
            } else {
                if (themeMoonIcon) themeMoonIcon.classList.remove('hidden');
            }

            const themeToggleBtn = document.getElementById('themeToggleBtn');
            if (themeToggleBtn) {
                themeToggleBtn.addEventListener('click', () => {
                    if (themeSunIcon) themeSunIcon.classList.toggle('hidden');
                    if (themeMoonIcon) themeMoonIcon.classList.toggle('hidden');

                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('theme', 'dark');
                    }
                });
            }
        });
    </script>
@endpush
