<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title', 'Auth')</title>

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
        
        /* Hero background matching frontend theme */
        .hero-bg {
            background: linear-gradient(135deg, #fdf2f8 0%, #fce7f3 30%, #ede9fe 70%, #fbcfe8 100%);
            background-attachment: fixed;
        }
        .dark .hero-bg {
            background: linear-gradient(135deg, #0f0516 0%, #160a22 45%, #0b0213 100%);
            background-attachment: fixed;
        }

        /* Text gradient helper */
        .gradient-text {
            background: linear-gradient(135deg, #ec4899, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="hero-bg min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 text-gray-800 dark:text-gray-200 transition-colors duration-300 overflow-x-hidden relative">
    <div class="max-w-md w-full relative z-10">
        @yield('content')
    </div>
    
    <!-- Dark Mode Theme Javascript Sync -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        });
    </script>
</body>
</html>
