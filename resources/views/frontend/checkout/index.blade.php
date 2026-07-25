@extends('layouts.frontend')

@section('title', 'Checkout - Trendy Fashion')

@section('content')
<!-- Ambient background glows -->
<div class="absolute top-20 right-0 w-96 h-96 bg-pink-300 dark:bg-pink-500/10 rounded-full opacity-20 blur-3xl pointer-events-none"></div>
<div class="absolute bottom-20 left-0 w-80 h-80 bg-purple-300 dark:bg-purple-500/10 rounded-full opacity-20 blur-3xl pointer-events-none"></div>

<div class="max-w-7xl mx-auto px-4 py-12 relative z-10">
    @include('frontend.checkout.partials.header')

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        <!-- Checkout Shipping Form: col-span-8 -->
        <main class="lg:col-span-8">
            @include('frontend.checkout.partials.form')
        </main>

        <!-- Order Items Review Card: col-span-4 -->
        <aside class="lg:col-span-4">
            @include('frontend.checkout.partials.summary')
        </aside>
    </div>
</div>
@endsection
