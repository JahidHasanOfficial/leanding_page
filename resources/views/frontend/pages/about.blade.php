@extends('layouts.frontend')

@section('title', 'আমাদের সম্পর্কে - Trendy Fashion')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-12 relative z-10">
    <div class="text-center mb-12">
        <span class="text-pink-600 dark:text-pink-400 font-semibold text-sm uppercase tracking-wider">আমাদের গল্প</span>
        <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 dark:text-white mt-2">Trendy Fashion সম্পর্কে জানুন</h1>
    </div>

    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-3xl p-8 sm:p-12 shadow-sm text-sm sm:text-base text-slate-650 dark:text-gray-300 space-y-6 leading-relaxed">
        <p>
            Trendy Fashion হলো একটি প্রিমিয়াম ফ্যাশন ব্র্যান্ড, যা আপনার রুচিশীল ব্যক্তিত্বকে ফুটিয়ে তুলতে কাজ করে। আমরা বিশ্বাস করি ফ্যাশন শুধু পোশাক পরিধান নয়, বরং নিজের আত্মপ্রকাশের একটি অন্যতম মাধ্যম।
        </p>
        <p>
            ২০২৬ সাল থেকে আমাদের যাত্রা শুরু। আমরা আধুনিক ও আরামদায়ক ফেব্রিকের সমন্বয়ে কাস্টম ডিজাইন পোশাক উৎপাদন এবং সরবরাহ করে আসছি। সারা বাংলাদেশে ক্যাশ অন ডেলিভারি (COD) এবং ফ্রি শিপিংয়ের মাধ্যমে আমাদের কাস্টমারদের সর্বোচ্চ সন্তুষ্টি ও ঝুঁকিমুক্ত কেনাকাটার গ্যারান্টি দিয়ে আসছি।
        </p>
        <div class="border-t border-slate-100 dark:border-white/5 pt-6 grid grid-cols-3 gap-4 text-center">
            <div>
                <span class="block text-2xl font-black text-pink-600">৫০K+</span>
                <span class="text-xs text-gray-400">সন্তুষ্ট গ্রাহক</span>
            </div>
            <div>
                <span class="block text-2xl font-black text-pink-600">১০০%</span>
                <span class="text-xs text-gray-400">অরিজিনাল কোয়ালিটি</span>
            </div>
            <div>
                <span class="block text-2xl font-black text-pink-600">২৪/৭</span>
                <span class="text-xs text-gray-400">গ্রাহক সেবা</span>
            </div>
        </div>
    </div>
</div>
@endsection
