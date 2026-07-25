@if($relatedProducts->count() > 0)
<div class="mt-16">
    <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">সম্পর্কিত পণ্যসমূহ (Related Products)</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($relatedProducts as $related)
            @include('frontend.shop.partials.product-card', ['product' => $related])
        @endforeach
    </div>
</div>
@endif
