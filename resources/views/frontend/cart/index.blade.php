@extends('layouts.frontend')

@section('title', 'Shopping Cart - Trendy Fashion')

@section('content')
<!-- Ambient background glows -->
<div class="absolute top-20 right-0 w-96 h-96 bg-pink-300 dark:bg-pink-500/10 rounded-full opacity-20 blur-3xl pointer-events-none"></div>
<div class="absolute bottom-20 left-0 w-80 h-80 bg-purple-300 dark:bg-purple-500/10 rounded-full opacity-20 blur-3xl pointer-events-none"></div>

<div class="max-w-7xl mx-auto px-4 py-12 relative z-10">
    <div class="text-center max-w-2xl mx-auto mb-12">
        <span class="text-pink-600 dark:text-pink-400 font-semibold text-sm uppercase tracking-wider">শপিং কার্ট</span>
        <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 dark:text-white mt-2">আপনার নির্বাচন করা পণ্যসমূহ</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        <!-- Cart Items List: col-span-8 -->
        <main class="lg:col-span-8">
            @include('frontend.cart.partials.cart-items')
        </main>

        <!-- Order Summary Card: col-span-4 -->
        <aside class="lg:col-span-4">
            @include('frontend.cart.partials.cart-summary')
        </aside>
    </div>
</div>
@endsection
