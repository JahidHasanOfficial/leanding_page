@extends('layouts.frontend')

@section('title', 'যোগাযোগ - Trendy Fashion')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-12 relative z-10">
    <div class="text-center mb-12">
        <span class="text-pink-600 dark:text-pink-400 font-semibold text-sm uppercase tracking-wider">যোগাযোগ</span>
        <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 dark:text-white mt-2">আমাদের সাথে যোগাযোগ করুন</h1>
    </div>

    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-3xl p-8 shadow-sm">
        <form action="#" method="POST" class="space-y-6" onsubmit="event.preventDefault(); alert('ধন্যবাদ! আপনার বার্তা সফলভাবে পাঠানো হয়েছে।'); this.reset();">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="space-y-1">
                    <label for="name" class="block text-xs font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wide">আপনার নাম</label>
                    <input type="text" id="name" name="name" required placeholder="যেমন: আবির হোসেন"
                           class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-2.5 text-gray-800 dark:text-white focus:outline-none focus:border-pink-500 transition text-sm">
                </div>
                <div class="space-y-1">
                    <label for="email" class="block text-xs font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wide">ইমেইল এড্রেস</label>
                    <input type="email" id="email" name="email" required placeholder="যেমন: abir@example.com"
                           class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-2.5 text-gray-800 dark:text-white focus:outline-none focus:border-pink-500 transition text-sm">
                </div>
            </div>
            <div class="space-y-1">
                <label for="message" class="block text-xs font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wide">বার্তা (Message)</label>
                <textarea id="message" name="message" rows="4" required placeholder="এখানে আপনার বার্তাটি লিখুন..."
                          class="w-full bg-gray-50 dark:bg-slate-950 border border-gray-200 dark:border-white/10 rounded-xl px-4 py-2.5 text-gray-800 dark:text-white focus:outline-none focus:border-pink-500 transition text-sm"></textarea>
            </div>
            <button type="submit" class="w-full btn-primary text-white font-extrabold text-sm py-3.5 rounded-xl shadow-lg cursor-pointer">
                বার্তা পাঠান
            </button>
        </form>
    </div>
</div>
@endsection
