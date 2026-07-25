@extends('layouts.admin')

@section('content')
<!-- পেজ হেডার -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
    <div>
        <h1 class="text-2xl md:text-3xl font-extrabold text-gray-800">ড্যাশবোর্ড</h1>
        <p class="text-gray-500 text-sm mt-1">স্বাগতম! আপনার ব্যবসার সারসংক্ষেপ</p>
    </div>
    <div class="flex gap-3">
        <a href="{{ route('home') }}" target="_blank" class="bg-white border border-gray-200 px-4 py-2 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 transition shadow-sm flex items-center">
            <i class="fas fa-eye mr-2"></i> লাইভ সাইট দেখুন
        </a>
    </div>
</div>

<!-- স্ট্যাটিস্টিক্স কার্ড -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
    <!-- কার্ড ১: মোট অর্ডার -->
    <div class="stat-card bg-white rounded-2xl p-6 shadow-sm animate-fadeInUp animate-delay-1">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-semibold">মোট অর্ডার</p>
                <p class="text-3xl font-extrabold text-gray-800 mt-1">{{ $stats['total_orders'] }}</p>
                <p class="text-xs text-amber-600 mt-2 font-medium">
                    পেন্ডিং অর্ডার: {{ $stats['pending_orders'] }} টি
                </p>
            </div>
            <div class="stat-icon bg-gradient-to-br from-blue-100 to-blue-200">
                <i class="fas fa-shopping-bag text-blue-600 text-xl"></i>
            </div>
        </div>
    </div>
    
    <!-- কার্ড ২: রেভিনিউ -->
    <div class="stat-card bg-white rounded-2xl p-6 shadow-sm animate-fadeInUp animate-delay-2">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-semibold">মোট রেভিনিউ</p>
                <p class="text-3xl font-extrabold text-gray-800 mt-1">${{ number_format($stats['total_revenue'], 2) }}</p>
                <p class="text-xs text-green-600 mt-2 font-medium">
                    <i class="fas fa-check-circle mr-1"></i> পেমেন্ট সফল
                </p>
            </div>
            <div class="stat-icon bg-gradient-to-br from-green-100 to-green-200">
                <i class="fas fa-money-bill-wave text-green-600 text-xl"></i>
            </div>
        </div>
    </div>
    
    <!-- কার্ড ৩: প্রোডাক্ট -->
    <div class="stat-card bg-white rounded-2xl p-6 shadow-sm animate-fadeInUp animate-delay-3">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-semibold">মোট প্রোডাক্ট</p>
                <p class="text-3xl font-extrabold text-gray-800 mt-1">{{ $stats['total_products'] }}</p>
                <p class="text-xs text-blue-600 mt-2 font-medium">
                    সক্রিয় প্রোডাক্ট: {{ $stats['active_products'] }} টি
                </p>
            </div>
            <div class="stat-icon bg-gradient-to-br from-purple-100 to-purple-200">
                <i class="fas fa-box text-purple-600 text-xl"></i>
            </div>
        </div>
    </div>
    
    <!-- কার্ড ৪: ইউজার -->
    <div class="stat-card bg-white rounded-2xl p-6 shadow-sm animate-fadeInUp animate-delay-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-semibold">মোট ইউজার</p>
                <p class="text-3xl font-extrabold text-gray-800 mt-1">{{ $stats['total_users'] }}</p>
                <p class="text-xs text-pink-600 mt-2 font-medium">
                    রেজিস্ট্রেশন সম্পূর্ণ
                </p>
            </div>
            <div class="stat-icon bg-gradient-to-br from-pink-100 to-pink-200">
                <i class="fas fa-users text-pink-600 text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- চার্ট + টপ প্রোডাক্ট (২ কলাম) -->
<div class="grid lg:grid-cols-3 gap-6">
    <!-- চার্ট সেকশন -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
        <div class="flex justify-between items-center mb-6">
            <h3 class="font-bold text-gray-800">
                <i class="fas fa-chart-line text-pink-600 mr-2"></i> সেলস ওভারভিউ
            </h3>
            <select class="border border-gray-200 rounded-lg px-3 py-1 text-sm outline-none focus:border-pink-500">
                <option>এই সপ্তাহ</option>
                <option>এই মাস</option>
                <option>এই বছর</option>
            </select>
        </div>
        
        <!-- ডামি চার্ট (বার গ্রাফ) -->
        <div class="h-64 flex items-end justify-between gap-2 pt-4">
            <div class="flex-1 flex flex-col items-center">
                <div class="chart-bar w-full bg-gradient-to-t from-pink-400 to-pink-600 h-16" style="height: 65%;"></div>
                <span class="text-xs text-gray-500 mt-2">সোম</span>
            </div>
            <div class="flex-1 flex flex-col items-center">
                <div class="chart-bar w-full bg-gradient-to-t from-pink-400 to-pink-600 h-20" style="height: 80%;"></div>
                <span class="text-xs text-gray-500 mt-2">মঙ্গল</span>
            </div>
            <div class="flex-1 flex flex-col items-center">
                <div class="chart-bar w-full bg-gradient-to-t from-pink-400 to-pink-600 h-14" style="height: 55%;"></div>
                <span class="text-xs text-gray-500 mt-2">বুধ</span>
            </div>
            <div class="flex-1 flex flex-col items-center">
                <div class="chart-bar w-full bg-gradient-to-t from-pink-400 to-pink-600 h-24" style="height: 90%;"></div>
                <span class="text-xs text-gray-500 mt-2">বৃহস্পতি</span>
            </div>
            <div class="flex-1 flex flex-col items-center">
                <div class="chart-bar w-full bg-gradient-to-t from-pink-400 to-pink-600 h-18" style="height: 70%;"></div>
                <span class="text-xs text-gray-500 mt-2">শুক্র</span>
            </div>
            <div class="flex-1 flex flex-col items-center">
                <div class="chart-bar w-full bg-gradient-to-t from-pink-400 to-pink-600 h-28" style="height: 100%;"></div>
                <span class="text-xs text-gray-500 mt-2">শনি</span>
            </div>
            <div class="flex-1 flex flex-col items-center">
                <div class="chart-bar w-full bg-gradient-to-t from-pink-400 to-pink-600 h-12" style="height: 45%;"></div>
                <span class="text-xs text-gray-500 mt-2">রবি</span>
            </div>
        </div>
        
        <div class="flex justify-center gap-6 mt-4 text-xs text-gray-500">
            <span><span class="inline-block w-3 h-3 bg-pink-500 rounded-full mr-1"></span> বিক্রি</span>
            <span><span class="inline-block w-3 h-3 bg-purple-500 rounded-full mr-1"></span> লাভ</span>
        </div>
    </div>
    
    <!-- লো স্টক প্রোডাক্ট -->
    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
        <h3 class="font-bold text-gray-800 mb-4">
            <i class="fas fa-exclamation-triangle text-amber-500 mr-2"></i> লো স্টক প্রোডাক্ট
        </h3>
        
        <div class="space-y-4">
            @forelse($low_stock_products as $product)
                <div class="flex items-center gap-3">
                    @if($product->image)
                        <img src="{{ \Illuminate\Support\Str::startsWith($product->image, ['http://', 'https://']) ? $product->image : asset('storage/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="w-12 h-12 rounded-xl object-cover" />
                    @else
                        <div class="w-12 h-12 bg-slate-100 rounded-xl flex items-center justify-center text-lg text-gray-400">📦</div>
                    @endif
                    <div class="flex-1">
                        <p class="font-semibold text-sm text-gray-800 line-clamp-1">{{ $product->name }}</p>
                        <p class="text-xs text-gray-500">${{ number_format($product->price, 2) }}</p>
                    </div>
                    <span class="bg-rose-100 text-rose-600 text-xs font-bold px-3 py-1 rounded-full">স্টক: {{ $product->stock }}</span>
                </div>
            @empty
                <p class="text-xs text-gray-500 py-6 text-center">লো স্টক কোনো প্রোডাক্ট পাওয়া যায়নি।</p>
            @endforelse
        </div>
        
        <a href="{{ route('admin.products.index') }}" class="block text-center text-sm text-pink-650 font-semibold mt-4 hover:underline">
            সব প্রোডাক্ট দেখুন →
        </a>
    </div>
</div>

<!-- রিসেন্ট অর্ডার + কুইক অ্যাকশন -->
<div class="grid lg:grid-cols-3 gap-6">
    <!-- রিসেন্ট অর্ডার টেবিল -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-bold text-gray-800">
                <i class="fas fa-clock text-pink-600 mr-2"></i> রিসেন্ট অর্ডার
            </h3>
            <a href="{{ route('admin.orders.index') }}" class="text-sm text-pink-600 font-semibold hover:underline">সব দেখুন →</a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-xs text-gray-500 uppercase tracking-wider border-b border-gray-100">
                        <th class="pb-3 font-semibold">অর্ডার আইডি</th>
                        <th class="pb-3 font-semibold">ক্রেতা</th>
                        <th class="pb-3 font-semibold">মোট</th>
                        <th class="pb-3 font-semibold">স্ট্যাটাস</th>
                        <th class="pb-3 font-semibold text-right">অ্যাকশন</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($recent_orders as $order)
                        <tr class="table-row">
                            <td class="py-3 text-sm font-semibold text-gray-800">#{{ $order->order_number }}</td>
                            <td class="py-3 text-sm text-gray-650">{{ $order->customer_name }}</td>
                            <td class="py-3 text-sm font-semibold text-gray-800">${{ number_format($order->total_amount, 2) }}</td>
                            <td class="py-3">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold tracking-wide uppercase
                                    @if($order->status == 'completed') bg-emerald-100 text-emerald-800
                                    @elseif($order->status == 'processing') bg-blue-100 text-blue-800
                                    @elseif($order->status == 'cancelled') bg-rose-100 text-rose-800
                                    @else bg-amber-100 text-amber-800
                                    @endif">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td class="py-3 text-right">
                                <a href="{{ route('admin.orders.show', $order) }}" class="inline-block bg-pink-50 hover:bg-pink-100 text-pink-600 px-3 py-1 rounded-lg text-xs font-semibold transition">
                                    দেখুন
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-6 text-center text-sm text-gray-500">কোনো অর্ডার পাওয়া যায়নি।</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- কুইক অ্যাকশন -->
    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100 flex flex-col justify-between">
        <div>
            <h3 class="font-bold text-gray-800 mb-4">
                <i class="fas fa-bolt text-yellow-500 mr-2"></i> কুইক লিংকস
            </h3>
            <p class="text-xs text-gray-500 mb-6">অ্যাডমিন প্যানেল থেকে দ্রুত নেভিগেট করুন এবং প্রোডাক্ট ও ক্যাটাগরি ম্যানেজ করুন।</p>
            
            <div class="space-y-3">
                <a href="{{ route('admin.products.create') }}" class="flex items-center justify-between p-3.5 rounded-xl border border-gray-100 hover:border-pink-500/35 hover:bg-pink-50/10 transition group">
                    <span class="text-xs font-bold text-gray-700 group-hover:text-pink-600"><i class="fas fa-plus-circle mr-2 text-pink-600"></i> নতুন প্রোডাক্ট যোগ করুন</span>
                    <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                </a>
                <a href="{{ route('admin.categories.create') }}" class="flex items-center justify-between p-3.5 rounded-xl border border-gray-100 hover:border-pink-500/35 hover:bg-pink-50/10 transition group">
                    <span class="text-xs font-bold text-gray-700 group-hover:text-pink-600"><i class="fas fa-tags mr-2 text-pink-600"></i> নতুন ক্যাটাগরি যোগ করুন</span>
                    <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
