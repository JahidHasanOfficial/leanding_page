@extends('layouts.frontend')

@section('title', 'আমাদের প্রোডাক্ট কালেকশন - Trendy Fashion')

@section('content')
<!-- Ambient background glows -->
<div class="absolute top-20 right-0 w-96 h-96 bg-pink-300 dark:bg-pink-500/10 rounded-full opacity-20 blur-3xl pointer-events-none"></div>
<div class="absolute bottom-20 left-0 w-80 h-80 bg-purple-300 dark:bg-purple-500/10 rounded-full opacity-20 blur-3xl pointer-events-none"></div>

<div class="max-w-7xl mx-auto px-4 py-12 relative z-10">
    <!-- Header of the catalog -->
    <div class="text-center max-w-2xl mx-auto mb-12">
        <span class="text-pink-600 dark:text-pink-400 font-semibold text-sm uppercase tracking-wider">শপ ক্যাটালগ</span>
        <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 dark:text-white mt-2">আমাদের পণ্য কালেকশন</h1>
        <p class="text-slate-500 dark:text-gray-400 text-sm mt-3">আপনার প্রয়োজনীয় কোয়ালিটি পণ্যটি বেছে নিয়ে সরাসরি ক্যাশ অন ডেলিভারিতে অর্ডার করুন।</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        <!-- Sidebar: col-span-3 -->
        <aside class="lg:col-span-3 space-y-6">
            @include('frontend.shop.partials.sidebar')
        </aside>

        <!-- Product section: col-span-9 -->
        <main class="lg:col-span-9 space-y-6">
            @include('frontend.shop.partials.toolbar')
            
            @include('frontend.shop.partials.product-grid')
            
            @include('frontend.shop.partials.pagination')
        </main>
    </div>
</div>
@endsection
