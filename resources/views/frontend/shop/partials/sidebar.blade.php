<div class="space-y-6 bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-3xl p-6 shadow-sm">
    <div>
        <h4 class="text-sm font-bold text-gray-800 dark:text-white uppercase tracking-wider mb-4 flex items-center gap-2">
            <i class="fas fa-th-large text-pink-600"></i> ক্যাটাগরি সমূহ
        </h4>
        <div class="flex flex-col gap-2">
            <a href="{{ route('products.index') }}" 
               class="px-4 py-2.5 rounded-xl text-xs font-bold transition-all {{ !$selectedCategory ? 'bg-gradient-to-r from-pink-500 to-purple-600 text-white shadow-md' : 'bg-slate-50 dark:bg-slate-800/50 text-slate-650 dark:text-gray-300 hover:bg-pink-50 dark:hover:bg-pink-500/10' }}">
                সব কালেকশন
            </a>
            @foreach($categories as $category)
                <a href="{{ route('products.index', ['category' => $category->id]) }}" 
                   class="px-4 py-2.5 rounded-xl text-xs font-bold transition-all {{ $selectedCategory == $category->id ? 'bg-gradient-to-r from-pink-500 to-purple-600 text-white shadow-md' : 'bg-slate-50 dark:bg-slate-800/50 text-slate-650 dark:text-gray-300 hover:bg-pink-50 dark:hover:bg-pink-500/10' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>
</div>
