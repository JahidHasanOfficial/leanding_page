<div id="liveOrderNotification" class="fixed bottom-6 left-6 z-40 bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/10 rounded-2xl shadow-2xl p-4 flex items-center gap-4 max-w-sm transition-all duration-500 transform translate-y-24 opacity-0">
    <div class="w-12 h-12 bg-pink-100 dark:bg-pink-500/20 rounded-full flex items-center justify-center text-xl shrink-0">
        🛍️
    </div>
    <div class="space-y-0.5">
        <p class="text-xs text-gray-500 dark:text-gray-400 font-semibold" id="notif-user">হাসান, ঢাকা থেকে</p>
        <p class="text-xs font-bold text-slate-800 dark:text-white" id="notif-product">প্রিমিয়াম সুয়েড শার্টটি অর্ডার করেছেন!</p>
        <p class="text-[9px] text-pink-600 dark:text-pink-400 font-medium" id="notif-time">১ মিনিট আগে</p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const notif = document.getElementById('liveOrderNotification');
        const notifUser = document.getElementById('notif-user');
        const notifProduct = document.getElementById('notif-product');
        const notifTime = document.getElementById('notif-time');

        const names = ['সাব্বির', 'নূরি', 'ফারহান', 'আরিফ', 'মিতু', 'ইমরান', 'রিফাত', 'সাদিয়া', 'তানভীর'];
        const locations = ['ঢাকা', 'চট্টগ্রাম', 'সিলেট', 'রাজশাহী', 'খুলনা', 'বরিশাল', 'কুমিল্লা', 'বগুড়া'];
        const products = ['প্রিমিয়াম লেদার জ্যাকেট', 'উলের ওভারকোট', 'ডেনিম জিন্স', 'সুয়েড শার্ট'];

        function showNotification() {
            if (!notif) return;
            
            const randomName = names[Math.floor(Math.random() * names.length)];
            const randomLoc = locations[Math.floor(Math.random() * locations.length)];
            const randomProd = products[Math.floor(Math.random() * products.length)];
            const mins = Math.floor(Math.random() * 5) + 1;

            notifUser.textContent = `${randomName}, ${randomLoc} থেকে`;
            notifProduct.textContent = `${randomProd}টি অর্ডার করেছেন!`;
            notifTime.textContent = `${mins} মিনিট আগে`;

            // Slide in
            notif.classList.remove('translate-y-24', 'opacity-0');
            notif.classList.add('translate-y-0', 'opacity-100');

            setTimeout(() => {
                // Slide out
                notif.classList.remove('translate-y-0', 'opacity-100');
                notif.classList.add('translate-y-24', 'opacity-0');
            }, 5000);
        }

        // Show periodically
        setTimeout(() => {
            showNotification();
            setInterval(showNotification, 20000);
        }, 12000);
    });
</script>
