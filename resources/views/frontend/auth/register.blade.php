@extends('layouts.frontend')

@section('title', 'Register - Trendy Fashion')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Glowing background elements -->
    <div class="absolute top-1/4 left-1/4 w-72 h-72 bg-pink-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-1/4 w-72 h-72 bg-purple-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-md w-full relative z-10 bg-white/70 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200 dark:border-white/5 rounded-3xl p-8 sm:p-10 shadow-2xl transition-all duration-300">
        
        <div class="text-center mb-8">
            <span class="text-3xl font-extrabold tracking-tight gradient-text">Trendy Fashion</span>
            <h2 class="text-xl font-bold text-slate-800 dark:text-white mt-2">নতুন অ্যাকাউন্ট তৈরি করুন</h2>
            <p class="text-xs text-slate-500 dark:text-gray-400 mt-1">আমাদের প্রিমিয়াম কালেকশনে যোগ দিন</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 p-4 rounded-2xl border border-rose-500/20 bg-rose-50 dark:bg-rose-500/10 text-rose-700 dark:text-rose-400 text-xs">
                <ul class="list-disc pl-4 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <div class="space-y-1.5">
                <label for="name" class="block text-xs font-bold text-slate-600 dark:text-gray-400 uppercase tracking-wider">পূর্ণ নাম</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                        <i class="far fa-user"></i>
                    </span>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus placeholder="যেমন: আবির হোসেন"
                           class="w-full bg-slate-50 dark:bg-slate-950/45 border border-slate-250 dark:border-white/10 rounded-2xl pl-11 pr-4 py-3.5 text-sm text-slate-800 dark:text-white focus:outline-none focus:border-pink-500 transition duration-250">
                </div>
            </div>

            <div class="space-y-1.5">
                <label for="email" class="block text-xs font-bold text-slate-600 dark:text-gray-400 uppercase tracking-wider">ইমেইল এড্রেস</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                        <i class="far fa-envelope"></i>
                    </span>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="example@mail.com"
                           class="w-full bg-slate-50 dark:bg-slate-950/45 border border-slate-250 dark:border-white/10 rounded-2xl pl-11 pr-4 py-3.5 text-sm text-slate-800 dark:text-white focus:outline-none focus:border-pink-500 transition duration-250">
                </div>
            </div>

            <div class="space-y-1.5">
                <label for="password" class="block text-xs font-bold text-slate-600 dark:text-gray-400 uppercase tracking-wider">পাসওয়ার্ড</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" id="password" name="password" required placeholder="কমপক্ষে ৮ অক্ষরের পাসওয়ার্ড"
                           class="w-full bg-slate-50 dark:bg-slate-950/45 border border-slate-250 dark:border-white/10 rounded-2xl pl-11 pr-4 py-3.5 text-sm text-slate-800 dark:text-white focus:outline-none focus:border-pink-500 transition duration-250">
                </div>
            </div>

            <div class="space-y-1.5">
                <label for="password_confirmation" class="block text-xs font-bold text-slate-600 dark:text-gray-400 uppercase tracking-wider">পাসওয়ার্ড নিশ্চিত করুন</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                        <i class="fas fa-shield-alt"></i>
                    </span>
                    <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="পাসওয়ার্ডটি পুনরায় লিখুন"
                       class="w-full bg-slate-50 dark:bg-slate-950/45 border border-slate-250 dark:border-white/10 rounded-2xl pl-11 pr-4 py-3.5 text-sm text-slate-800 dark:text-white focus:outline-none focus:border-pink-500 transition duration-250">
                </div>
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 text-white font-black py-3.5 rounded-2xl shadow-lg transition duration-300 hover:scale-[1.01] cursor-pointer mt-4 text-sm">
                নিবন্ধন করুন
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-slate-100 dark:border-white/5 text-center text-xs text-slate-500 dark:text-gray-400">
            ইতিমধ্যে অ্যাকাউন্ট আছে? 
            <a href="{{ route('login') }}" class="text-pink-600 dark:text-pink-400 font-extrabold hover:underline">লগইন করুন</a>
        </div>
    </div>
</div>
@endsection
