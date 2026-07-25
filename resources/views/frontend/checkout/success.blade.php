@extends('layouts.frontend')

@section('title', 'অর্ডার সফল হয়েছে - Trendy Fashion')

@section('content')
<!-- Ambient background glows -->
<div class="absolute top-20 right-0 w-96 h-96 bg-pink-300 dark:bg-pink-500/10 rounded-full opacity-20 blur-3xl pointer-events-none"></div>
<div class="absolute bottom-20 left-0 w-80 h-80 bg-purple-300 dark:bg-purple-500/10 rounded-full opacity-20 blur-3xl pointer-events-none"></div>

<div class="max-w-2xl mx-auto my-12 bg-white dark:bg-slate-900/40 border border-slate-200 dark:border-white/10 rounded-3xl p-8 sm:p-12 shadow-xl dark:shadow-2xl text-center relative z-10 transition-all duration-300">
    
    <!-- Success Badge -->
    <div class="w-20 h-20 bg-gradient-to-r from-pink-500 to-purple-600 text-white rounded-full flex items-center justify-center text-4xl mx-auto mb-6 shadow-lg shadow-pink-500/20 floating-badge">
        ✓
    </div>

    <!-- Order Number -->
    <span class="inline-flex bg-pink-50 dark:bg-pink-500/10 border border-pink-100 dark:border-pink-500/20 text-pink-600 dark:text-pink-400 text-sm font-semibold rounded-full px-5 py-2 mb-6">
        অর্ডার নম্বর: {{ $order->order_number }}
    </span>

    <h2 class="text-3xl font-extrabold text-gray-800 dark:text-white mb-3">আপনার অর্ডারটি সফল হয়েছে!</h2>
    <p class="text-slate-500 dark:text-gray-400 text-sm px-4 leading-relaxed">
        ধন্যবাদ <strong class="text-slate-900 dark:text-white font-bold">{{ $order->customer_name }}</strong>, আমাদের সাথে শপিং করার জন্য। আপনার ক্যাশ অন ডেলিভারি (COD) অর্ডারটি সফলভাবে গ্রহণ করা হয়েছে।
    </p>

    <!-- Invoice Details Card -->
    <div class="bg-slate-50 dark:bg-black/30 border border-slate-200/60 dark:border-white/5 rounded-2xl p-6 text-left space-y-4 my-8 transition-colors">
        <h5 class="text-slate-900 dark:text-white font-bold border-b border-slate-200 dark:border-white/5 pb-2 text-base flex items-center gap-2">
            <i class="fas fa-file-invoice text-pink-600 dark:text-pink-400"></i> ইনভয়েস সামারি
        </h5>
        
        <div class="flex justify-between items-start text-sm text-slate-600 dark:text-gray-400 gap-6">
            <span>পণ্য:</span>
            <span class="text-slate-800 dark:text-white text-right font-semibold">
                @foreach($order->orderItems as $item)
                    {{ $item->product->name }} (x{{ $item->quantity }})<br>
                @endforeach
            </span>
        </div>

        <div class="flex justify-between text-sm text-slate-600 dark:text-gray-400">
            <span>মোবাইল নম্বর:</span>
            <span class="text-slate-800 dark:text-white font-semibold">{{ $order->customer_phone }}</span>
        </div>

        <div class="flex justify-between items-start text-sm text-slate-600 dark:text-gray-400 gap-6">
            <span>ডেলিভারি ঠিকানা:</span>
            <span class="text-slate-800 dark:text-white text-right font-semibold max-w-[280px]">{{ $order->shipping_address }}</span>
        </div>

        <div class="flex justify-between text-sm text-slate-600 dark:text-gray-400">
            <span>পেমেন্ট মেথড:</span>
            <span class="text-emerald-600 dark:text-emerald-400 font-extrabold bg-emerald-100 dark:bg-emerald-500/10 border border-emerald-200 dark:border-emerald-500/20 px-2 py-0.5 rounded text-xs">ক্যাশ অন ডেলিভারি</span>
        </div>

        <hr class="border-slate-200 dark:border-white/5">

        <div class="flex justify-between text-base font-black text-slate-900 dark:text-white pt-1">
            <span>সর্বমোট মূল্য:</span>
            <span class="text-pink-600 dark:text-pink-400 text-lg font-black">${{ number_format($order->total_amount, 2) }}</span>
        </div>
    </div>

    <!-- Info Warning Box -->
    <div class="bg-gradient-to-r from-pink-50 to-purple-50 dark:from-slate-900/50 dark:to-slate-900/50 border border-pink-100 dark:border-white/5 text-left p-5 rounded-2xl mb-8 space-y-2 transition-colors">
        <strong class="text-pink-600 dark:text-pink-400 block font-bold text-sm">
            <i class="fas fa-phone-volume mr-1"></i> ভেরিফিকেশন কল সম্পর্কিত তথ্য
        </strong>
        <p class="text-xs sm:text-sm leading-relaxed text-slate-600 dark:text-gray-400">
            আমাদের কাস্টমার কেয়ার প্রতিনিধি পরবর্তী ২৪ ঘণ্টার মধ্যে আপনার মোবাইল নম্বর <strong class="text-slate-800 dark:text-white font-bold">{{ $order->customer_phone }}</strong>-এ কল দিয়ে অর্ডারটি কনফার্ম করবেন। অনুগ্রহ করে ফোনটি সচল রাখুন।
        </p>
    </div>

    <a href="{{ route('home') }}" class="btn-primary inline-block w-full sm:w-auto text-white font-extrabold px-8 py-3.5 rounded-full shadow-lg">
        কালেকশনে ফিরে যান
    </a>
</div>
@endsection
