@extends('layouts.frontend')

@section('title', 'Order Details - Trendy Fashion')

@section('content')
<!-- Ambient background glows -->
<div class="absolute top-20 right-0 w-96 h-96 bg-pink-300 dark:bg-pink-500/10 rounded-full opacity-20 blur-3xl pointer-events-none"></div>
<div class="absolute bottom-20 left-0 w-80 h-80 bg-purple-300 dark:bg-purple-500/10 rounded-full opacity-20 blur-3xl pointer-events-none"></div>

<div class="max-w-7xl mx-auto px-4 py-12 relative z-10">
    <div class="max-w-4xl mx-auto mb-6">
        <a href="{{ route('checkout.orders') }}" class="text-xs font-bold text-slate-500 hover:text-pink-600 transition flex items-center gap-1">
            <i class="fas fa-arrow-left"></i> অর্ডার তালিকায় ফিরে যান
        </a>
    </div>

    <div class="max-w-4xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left details panel: col-span-8 -->
        <main class="lg:col-span-8 space-y-6">
            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-3xl p-6 sm:p-8 shadow-sm space-y-6 transition-colors">
                <div class="flex justify-between items-center border-b border-slate-100 dark:border-white/5 pb-4">
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white">অর্ডার #{{ $order->order_number }}</h2>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold tracking-wide uppercase
                        @if($order->status == 'completed') bg-emerald-100 text-emerald-800 dark:bg-emerald-500/10 dark:text-emerald-400
                        @elseif($order->status == 'processing') bg-blue-100 text-blue-800 dark:bg-blue-500/10 dark:text-blue-400
                        @elseif($order->status == 'cancelled') bg-rose-100 text-rose-800 dark:bg-rose-500/10 dark:text-rose-400
                        @else bg-amber-100 text-amber-800 dark:bg-amber-500/10 dark:text-amber-400
                        @endif">
                        {{ $order->status }}
                    </span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div>
                        <strong class="text-slate-500 dark:text-gray-400 uppercase tracking-wider block mb-1">অর্ডার তারিখ</strong>
                        <p class="text-slate-800 dark:text-white font-bold">{{ $order->created_at->format('F d, Y h:i A') }}</p>
                    </div>
                    <div>
                        <strong class="text-slate-500 dark:text-gray-400 uppercase tracking-wider block mb-1">গ্রাহকের নাম</strong>
                        <p class="text-slate-800 dark:text-white font-bold">{{ $order->customer_name }}</p>
                    </div>
                </div>

                <hr class="border-slate-100 dark:border-white/5">

                <div>
                    <h3 class="text-sm font-bold text-slate-800 dark:text-white uppercase tracking-wider mb-4">অর্ডার করা পণ্যসমূহ</h3>
                    <div class="divide-y divide-slate-100 dark:divide-white/5 border border-slate-200 dark:border-white/5 rounded-2xl overflow-hidden">
                        @foreach($order->orderItems as $item)
                            <div class="p-4 flex items-center justify-between gap-4 bg-slate-50/50 dark:bg-slate-950/20">
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900 dark:text-white">{{ $item->product->name }}</h4>
                                    <p class="text-[10px] text-gray-500 dark:text-gray-400 mt-0.5">ইউনিট মূল্য: ${{ number_format($item->price, 2) }} | পরিমাণ: {{ $item->quantity }} টি</p>
                                </div>
                                <div class="text-xs font-bold text-pink-650 dark:text-pink-400">
                                    ${{ number_format($item->quantity * $item->price, 2) }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Shipping Address -->
            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-3xl p-6 shadow-sm transition-colors">
                <h3 class="text-sm font-bold text-slate-800 dark:text-white uppercase tracking-wider border-b border-slate-100 dark:border-white/5 pb-2 mb-4">ডেলিভারি ঠিকানা</h3>
                <p class="text-xs sm:text-sm text-slate-700 dark:text-gray-300 leading-relaxed font-medium">
                    {{ $order->shipping_address }}<br>
                    @if($order->shipping_city || $order->shipping_postal_code)
                        {{ $order->shipping_city ?? '' }} {{ $order->shipping_postal_code ?? '' }}<br>
                    @endif
                    {{ $order->shipping_country }}
                </p>
            </div>
        </main>

        <!-- Right Summary panel: col-span-4 -->
        <aside class="lg:col-span-4">
            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-3xl p-6 shadow-sm space-y-6 transition-colors">
                <h4 class="text-base font-bold text-slate-850 dark:text-white border-b border-slate-100 dark:border-white/5 pb-2">অর্ডার সারাংশ</h4>
                
                <div class="space-y-3">
                    <div class="flex justify-between text-xs text-gray-500">
                        <span>উপ-মোট মূল্য:</span>
                        <span class="text-gray-800 dark:text-white font-semibold">${{ number_format($order->total_amount, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-xs text-gray-500">
                        <span>শিপিং চার্জ:</span>
                        <span class="text-emerald-500 font-bold uppercase tracking-wider text-[9px] bg-emerald-100 dark:bg-emerald-500/10 px-2 py-0.5 rounded border border-emerald-250/50">ফ্রি</span>
                    </div>
                    <hr class="border-slate-100 dark:border-white/5">
                    <div class="flex justify-between text-sm font-bold text-gray-900 dark:text-white">
                        <span>সর্বমোট মূল্য:</span>
                        <span class="text-pink-650 dark:text-pink-400 font-black">${{ number_format($order->total_amount, 2) }}</span>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection
