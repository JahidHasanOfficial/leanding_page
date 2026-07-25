<div class="fixed bottom-6 right-24 z-40">
    <!-- Chat Icon -->
    <button id="chatWidgetBtn" class="bg-pink-600 hover:bg-pink-700 text-white w-12 h-12 rounded-full shadow-lg flex items-center justify-center hover:scale-105 active:scale-95 transition-all cursor-pointer">
        <i class="fas fa-comment-dots text-lg"></i>
    </button>
    
    <!-- Chat Widget Box -->
    <div id="chatWidgetBox" class="hidden absolute bottom-16 right-0 w-80 bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/10 rounded-2xl shadow-2xl overflow-hidden flex flex-col transition-all duration-300">
        <div class="bg-gradient-to-r from-pink-500 to-purple-600 p-4 text-white flex justify-between items-center">
            <div class="flex items-center gap-2">
                <div class="w-2.5 h-2.5 bg-emerald-500 rounded-full animate-pulse"></div>
                <span class="font-bold text-sm">লাইভ চ্যাট সাপোর্ট</span>
            </div>
            <button id="closeChatBtn" class="text-white hover:scale-110 font-bold cursor-pointer">✕</button>
        </div>
        <div class="h-64 p-4 overflow-y-auto space-y-3 bg-slate-50 dark:bg-slate-950 text-xs">
            <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-white/5 p-3 rounded-xl max-w-[85%] text-slate-700 dark:text-gray-300 shadow-sm">
                আসসালামু আলাইকুম! Trendy Fashion এ আপনাকে স্বাগতম। আমরা কীভাবে আপনাকে সাহায্য করতে পারি?
            </div>
        </div>
        <div class="p-3 border-t border-slate-100 dark:border-white/5 flex gap-2">
            <input type="text" placeholder="আপনার বার্তা লিখুন..." class="flex-1 bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-white/10 rounded-xl px-3 py-2 text-xs focus:outline-none focus:border-pink-500 dark:text-white">
            <button class="bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-xl text-xs font-bold cursor-pointer"><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const chatWidgetBtn = document.getElementById('chatWidgetBtn');
        const chatWidgetBox = document.getElementById('chatWidgetBox');
        const closeChatBtn = document.getElementById('closeChatBtn');

        if (chatWidgetBtn && chatWidgetBox) {
            chatWidgetBtn.addEventListener('click', () => {
                chatWidgetBox.classList.toggle('hidden');
            });
            if (closeChatBtn) {
                closeChatBtn.addEventListener('click', () => {
                    chatWidgetBox.classList.add('hidden');
                });
            }
        }
    });
</script>
