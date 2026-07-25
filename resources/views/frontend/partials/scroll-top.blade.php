<button id="scrollTopBtn" class="fixed bottom-6 right-6 z-40 bg-pink-600 hover:bg-pink-700 text-white w-12 h-12 rounded-full shadow-lg flex items-center justify-center translate-y-20 opacity-0 transition-all duration-300 hover:scale-105 active:scale-95 cursor-pointer">
    <i class="fas fa-chevron-up text-lg"></i>
</button>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const scrollTopBtn = document.getElementById('scrollTopBtn');
        if (scrollTopBtn) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 400) {
                    scrollTopBtn.classList.remove('opacity-0', 'translate-y-20');
                    scrollTopBtn.classList.add('opacity-100', 'translate-y-0');
                } else {
                    scrollTopBtn.classList.add('opacity-0', 'translate-y-20');
                    scrollTopBtn.classList.remove('opacity-100', 'translate-y-0');
                }
            });

            scrollTopBtn.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }
    });
</script>
