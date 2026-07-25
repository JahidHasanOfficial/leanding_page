<!DOCTYPE html>
<html lang="bn" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Trendy Fashion – প্রিমিয়াম ফ্যাশন ব্র্যান্ড')</title>
    
    <!-- Tailwind Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800;900&display=swap" rel="stylesheet" />
    
    <style>
        * { font-family: 'Inter', sans-serif; }
        
        /* হিরো ব্যাকগ্রাউন্ড */
        .hero-bg {
            background: linear-gradient(135deg, #fdf2f8 0%, #fce7f3 30%, #ede9fe 70%, #fbcfe8 100%);
        }
        .dark .hero-bg {
            background: linear-gradient(135deg, #0f0516 0%, #160a22 45%, #0b0213 100%);
        }
        
        /* প্রাইমারি বাটন */
        .btn-primary {
            background: linear-gradient(135deg, #ec4899, #8b5cf6);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(236, 72, 153, 0.35);
        }
        .btn-primary::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            transform: rotate(45deg) translateX(-100%);
            transition: 0.6s;
        }
        .btn-primary:hover::after {
            transform: rotate(45deg) translateX(100%);
        }
        
        /* কার্ড হোভার */
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-12px);
            box-shadow: 0 30px 60px rgba(0,0,0,0.12);
        }
        
        /* ফ্লোটিং অ্যানিমেশন */
        .floating-badge {
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-12px); }
        }
        
        /* টেক্সট গ্রেডিয়েন্ট */
        .gradient-text {
            background: linear-gradient(135deg, #ec4899, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* টাইপিং কার্সর */
        .typing-cursor {
            display: inline-block;
            width: 3px;
            height: 1.2em;
            background: #ec4899;
            margin-left: 4px;
            animation: blink 0.8s step-end infinite;
        }
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }
        
        /* কাউন্টডাউন */
        .countdown-box {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
        }
        
        /* লাইভ নোটিফিকেশন */
        .live-notification {
            animation: slideIn 0.5s ease-out;
        }
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        /* স্ক্রল টু টপ */
        .scroll-top {
            transition: all 0.3s ease;
        }
        .scroll-top:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(236, 72, 153, 0.4);
        }
        
        /* মোবাইল মেনু */
        .mobile-menu {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* সেকশন প্যাডিং */
        .section-padding { padding: 80px 0; }
        @media (max-width: 768px) { .section-padding { padding: 50px 0; } }
        
        /* ক্যাটাগরি কার্ড */
        .category-card {
            transition: all 0.5s ease;
            overflow: hidden;
        }
        .category-card img {
            transition: all 0.6s ease;
        }
        .category-card:hover img {
            transform: scale(1.15);
        }
        .category-card .overlay {
            background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
            transition: all 0.3s ease;
        }
        .category-card:hover .overlay {
            background: linear-gradient(to top, rgba(236, 72, 153, 0.8), transparent);
        }
        
        /* প্রোডাক্ট রেটিং */
        .star-rating { color: #fbbf24; }
        
        /* ব্র্যান্ড স্ক্রল */
        .brand-scroll {
            animation: scrollBrands 20s linear infinite;
        }
        @keyframes scrollBrands {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        
        /* নিউজলেটার পপআপ */
        .popup-overlay {
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(4px);
        }
    </style>
</head>
<body class="bg-white dark:bg-slate-900 text-gray-800 dark:text-gray-200 antialiased transition-colors duration-300">
    @yield('content')
</body>
</html>
