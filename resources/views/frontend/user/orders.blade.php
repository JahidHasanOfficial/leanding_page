@extends('layouts.frontend')

@section('title', 'My Orders - Trendy Fashion')

@section('content')
<!-- Ambient background glows -->
<div class="absolute top-20 right-0 w-96 h-96 bg-pink-300 dark:bg-pink-500/10 rounded-full opacity-20 blur-3xl pointer-events-none"></div>
<div class="absolute bottom-20 left-0 w-80 h-80 bg-purple-300 dark:bg-purple-500/10 rounded-full opacity-20 blur-3xl pointer-events-none"></div>

<div class="max-w-7xl mx-auto px-4 py-12 relative z-10">
    <div class="text-center max-w-2xl mx-auto mb-12">
        <span class="text-pink-600 dark:text-pink-400 font-semibold text-sm uppercase tracking-wider">ড্যাশবোর্ড</span>
        <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 dark:text-white mt-2">আপনার অর্ডার সমূহ</h1>
    </div>

    <div class="max-w-4xl mx-auto">
        @if($orders->count() > 0)
            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-3xl overflow-hidden shadow-sm transition-colors">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 dark:bg-slate-950 text-slate-500 dark:text-gray-400 text-xs font-bold uppercase tracking-wider border-b border-slate-100 dark:border-white/5">
                                <th class="p-6">অর্ডার নম্বর</th>
                                <th class="p-6">তারিখ</th>
                                <th class="p-6">সর্বমোট</th>
                                <th class="p-6">স্ট্যাটাস</th>
                                <th class="p-6 text-right">অ্যাকশন</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-white/5 text-sm text-slate-700 dark:text-gray-300">
                            @foreach($orders as $order)
                                <tr>
                                    <td class="p-6 font-bold text-slate-900 dark:text-white">
                                        #{{ $order->order_number }}
                                    </td>
                                    <td class="p-6">
                                        {{ $order->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="p-6 font-semibold">
                                        ${{ number_format($order->total_amount, 2) }}
                                    </td>
                                    <td class="p-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold tracking-wide uppercase
                                            @if($order->status == 'completed') bg-emerald-100 text-emerald-800 dark:bg-emerald-500/10 dark:text-emerald-400
                                            @elseif($order->status == 'processing') bg-blue-100 text-blue-800 dark:bg-blue-500/10 dark:text-blue-400
                                            @elseif($order->status == 'cancelled') bg-rose-100 text-rose-800 dark:bg-rose-500/10 dark:text-rose-400
                                            @else bg-amber-100 text-amber-800 dark:bg-amber-500/10 dark:text-amber-400
                                            @endif">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td class="p-6 text-right">
                                        <a href="{{ route('checkout.orders.show', $order) }}" 
                                           class="inline-block bg-pink-50 hover:bg-pink-100 dark:bg-pink-500/10 dark:hover:bg-pink-500/20 text-pink-600 dark:text-pink-400 px-4 py-2 rounded-xl text-xs font-bold transition">
                                            বিস্তারিত দেখুন
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-8 flex justify-center">
                {{ $orders->links() }}
            </div>
        @else
            <div class="text-center py-16 bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-3xl shadow-sm">
                <span class="text-6xl">📦</span>
                <h3 class="text-xl font-bold text-slate-800 dark:text-white mt-4">কোন অর্ডার পাওয়া যায়নি!</h3>
                <p class="text-slate-500 dark:text-gray-400 text-sm mt-2">আপনি এখনো কোনো অর্ডার করেননি। আমাদের কালেকশন ঘুরে দেখুন।</p>
                <a href="{{ route('products.index') }}" class="inline-block btn-primary text-white font-bold text-sm px-6 py-3 rounded-full mt-6 shadow-lg">
                    পণ্য ব্রাউজ করুন
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
