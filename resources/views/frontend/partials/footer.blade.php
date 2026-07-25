<footer class="bg-gray-900 text-white py-12 transition-colors">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
            <h3 class="text-xl font-bold mb-4"><span class="gradient-text">Trendy</span> Fashion</h3>
            <p class="text-gray-400 text-sm leading-relaxed">ট্রেন্ডি ফ্যাশন—আপনার প্রতিদিনের ফ্যাশন পার্টনার। প্রিমিয়াম কোয়ালিটি ও ইউনিক ডিজাইন গ্যারান্টি।</p>
        </div>
        <div>
            <h4 class="font-bold text-lg mb-4">কুইক লিঙ্ক</h4>
            <ul class="space-y-2 text-sm text-gray-400">
                <li><a href="{{ route('home') }}" class="hover:text-pink-500 transition">হোম</a></li>
                <li><a href="{{ route('products.index') }}" class="hover:text-pink-500 transition">কালেকশন</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-pink-500 transition">আমাদের সম্পর্কে</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-pink-500 transition">যোগাযোগ</a></li>
            </ul>
        </div>
        <div>
            <h4 class="font-bold text-lg mb-4">সহায়তা</h4>
            <ul class="space-y-2 text-sm text-gray-400">
                <li><a href="{{ route('faq') }}" class="hover:text-pink-500 transition">সচরাচর জিজ্ঞাসা (FAQ)</a></li>
                <li><a href="{{ route('terms') }}" class="hover:text-pink-500 transition">শর্তাবলী ও নীতিমালা</a></li>
            </ul>
        </div>
        <div>
            <h4 class="font-bold text-lg mb-4">যোগাযোগ</h4>
            <ul class="space-y-2 text-sm text-gray-400">
                <li><i class="fas fa-phone mr-2"></i> +৮৮০ ১৭১২৩৪৫৬৭৮</li>
                <li><i class="fas fa-envelope mr-2"></i> support@trendyfashion.com</li>
                <li><i class="fas fa-map-marker-alt mr-2"></i> ঢাকা, বাংলাদেশ</li>
            </ul>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 border-t border-gray-800 mt-8 pt-8 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} Trendy Fashion. All rights reserved.
    </div>
</footer>
