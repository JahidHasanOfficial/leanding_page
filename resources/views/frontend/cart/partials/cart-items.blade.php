@if($cartItems->count() > 0)
    <div class="space-y-4">
        @foreach($cartItems as $item)
            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-3xl p-6 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-6 transition-colors">
                <div class="flex items-center gap-4 w-full sm:w-auto">
                    @if($item->product->image)
                        <img src="{{ \Illuminate\Support\Str::startsWith($item->product->image, ['http://', 'https://']) ? $item->product->image : asset('storage/' . $item->product->image) }}" 
                             alt="{{ $item->product->name }}" 
                             class="w-20 h-20 rounded-2xl object-cover border border-slate-200 dark:border-white/5 shadow-sm">
                    @endif
                    <div>
                        <h4 class="font-bold text-slate-900 dark:text-white hover:text-pink-600 transition">
                            <a href="{{ route('products.show', $item->product) }}">{{ $item->product->name }}</a>
                        </h4>
                        @if($item->product->category)
                            <p class="text-[10px] text-pink-600 font-bold uppercase tracking-wider mt-1">{{ $item->product->category->name }}</p>
                        @endif
                    </div>
                </div>

                <div class="flex items-center justify-between sm:justify-end gap-8 w-full sm:w-auto">
                    <!-- Price -->
                    <div class="text-sm font-bold text-slate-800 dark:text-white">
                        ${{ number_format($item->product->price, 2) }}
                    </div>

                    <!-- Quantity Form -->
                    <div class="flex items-center bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-white/10 rounded-xl overflow-hidden max-w-[120px]">
                        <form action="{{ route('cart.update', $item) }}" method="POST" class="flex w-full items-center">
                            @csrf
                            @method('PUT')
                            <button type="button" onclick="decreaseQty({{ $item->id }})" class="px-3 py-1.5 text-gray-500 font-bold hover:bg-slate-100 dark:hover:bg-white/5 cursor-pointer">-</button>
                            <input type="number" id="qty-input-{{ $item->id }}" name="quantity" value="{{ $item->quantity }}" min="1" max="{{ $item->product->stock }}" onchange="this.form.submit()"
                                   class="w-full bg-transparent text-center text-xs font-bold text-gray-800 dark:text-white focus:outline-none border-none [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                            <button type="button" onclick="increaseQty({{ $item->id }}, {{ $item->product->stock }})" class="px-3 py-1.5 text-gray-500 font-bold hover:bg-slate-100 dark:hover:bg-white/5 cursor-pointer">+</button>
                        </form>
                    </div>

                    <!-- Total -->
                    <div class="text-sm font-black text-pink-600 dark:text-pink-400">
                        ${{ number_format($item->quantity * $item->product->price, 2) }}
                    </div>

                    <!-- Action -->
                    <form action="{{ route('cart.destroy', $item) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('পণ্যটি কার্ট থেকে সরাতে চান?')" 
                                class="text-rose-600 hover:text-rose-500 text-sm font-bold p-1 cursor-pointer hover:scale-105 transition">
                            <i class="far fa-trash-can text-lg"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function decreaseQty(id) {
            const input = document.getElementById('qty-input-' + id);
            let val = parseInt(input.value) || 1;
            if (val > 1) {
                input.value = val - 1;
                input.dispatchEvent(new Event('change'));
            }
        }
        function increaseQty(id, max) {
            const input = document.getElementById('qty-input-' + id);
            let val = parseInt(input.value) || 1;
            if (val < max) {
                input.value = val + 1;
                input.dispatchEvent(new Event('change'));
            }
        }
    </script>
@else
    <div class="text-center py-16 bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-3xl shadow-sm">
        <span class="text-6xl">🛒</span>
        <h3 class="text-xl font-bold text-slate-800 dark:text-white mt-4">আপনার কার্ট খালি!</h3>
        <p class="text-slate-500 dark:text-gray-400 text-sm mt-2">আমাদের কালেকশন থেকে পণ্য পছন্দ করে কার্টে যোগ করুন।</p>
        <a href="{{ route('products.index') }}" class="inline-block btn-primary text-white font-bold text-sm px-6 py-3 rounded-full mt-6 shadow-lg">
            পণ্য ব্রাউজ করুন
        </a>
    </div>
@endif
