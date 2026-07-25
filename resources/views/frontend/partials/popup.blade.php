<div id="newsletterPopup" class="fixed inset-0 z-50 flex items-center justify-center popup-overlay hidden">
    <div class="bg-white dark:bg-slate-900 rounded-3xl p-8 max-w-md w-full mx-4 shadow-2xl relative border border-slate-100 dark:border-white/5 transition-all duration-300 transform scale-95 opacity-0" id="newsletterPopupContent">
        <button id="closePopupBtn" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 dark:hover:text-white font-bold text-lg cursor-pointer">✕</button>
        <div class="text-center space-y-4">
            <div class="bg-pink-100 dark:bg-pink-500/20 w-16 h-16 rounded-full flex items-center justify-center mx-auto text-2xl">
                🎁
            </div>
            <h3 class="text-2xl font-black text-slate-900 dark:text-white">১০% ডিসকাউন্ট কুপন!</h3>
            <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">আমাদের নিউজলেটারে সাবস্ক্রাইব করুন এবং আপনার প্রথম অর্ডারে অতিরিক্ত ১০% ডিসকাউন্ট উপভোগ করুন।</p>
            <form id="popupSubscribeForm" class="space-y-3 pt-2">
                <input type="email" placeholder="আপনার ইমেইল লিখুন" required class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-white/10 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-pink-500 dark:text-white">
                <button type="submit" class="w-full btn-primary text-white py-3 rounded-xl font-bold text-sm cursor-pointer">কুপন কোড সংগ্রহ করুন</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const popup = document.getElementById('newsletterPopup');
        const content = document.getElementById('newsletterPopupContent');
        const closeBtn = document.getElementById('closePopupBtn');
        const form = document.getElementById('popupSubscribeForm');

        if (popup && !localStorage.getItem('newsletter_subscribed')) {
            setTimeout(() => {
                popup.classList.remove('hidden');
                setTimeout(() => {
                    content.classList.remove('scale-95', 'opacity-0');
                    content.classList.add('scale-100', 'opacity-100');
                }, 50);
            }, 5000);

            const closePopup = () => {
                content.classList.remove('scale-100', 'opacity-100');
                content.classList.add('scale-95', 'opacity-0');
                setTimeout(() => {
                    popup.classList.add('hidden');
                }, 300);
            };

            closeBtn?.addEventListener('click', closePopup);
            popup.addEventListener('click', (e) => {
                if (e.target === popup) closePopup();
            });

            form?.addEventListener('submit', (e) => {
                e.preventDefault();
                localStorage.setItem('newsletter_subscribed', 'true');
                alert('ধন্যবাদ! আপনার কুপন কোড: TRENDY10');
                closePopup();
            });
        }
    });
</script>
