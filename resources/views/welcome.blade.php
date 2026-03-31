<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'OBLMS') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Instrument Sans', sans-serif; }
        .purple-gradient { background: linear-gradient(135deg, #764ba2 0%, #667eea 100%); }
    </style>
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] min-h-screen flex flex-col items-center">

    <header class="w-full lg:max-w-6xl p-6 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <div class="h-8 w-8 purple-gradient rounded-lg shadow-sm"></div>
            <span class="font-bold text-lg tracking-tight dark:text-white uppercase">OBLMS</span>
        </div>
        
        @if (Route::has('login'))
            <nav class="flex items-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-5 py-2 text-sm font-medium border border-gray-200 dark:border-[#3E3E3A] dark:text-[#EDEDEC] rounded-lg hover:bg-gray-50 transition-all">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-black dark:text-gray-400 dark:hover:text-white transition-colors">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-5 py-2 text-sm font-medium bg-black text-white dark:bg-white dark:text-black rounded-lg hover:opacity-80 transition-opacity shadow-sm">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <main class="w-full lg:max-w-6xl flex flex-col lg:flex-row items-center justify-center grow px-6 gap-12 py-10">
        
        <div class="flex-1 text-center lg:text-left">
            <h1 class="text-5xl lg:text-6xl font-black mb-6 tracking-tight dark:text-white leading-tight">
                Outcome-Based <br><span class="text-purple-600">Learning</span> System
            </h1>
            <p class="text-lg text-gray-500 dark:text-gray-400 mb-8 max-w-lg mx-auto lg:mx-0 leading-relaxed">
                A streamlined platform for tracking academic performance and managing student outcomes with real-time analytics.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                <a href="{{ route('login') }}" class="px-10 py-4 purple-gradient text-white font-bold rounded-xl shadow-xl hover:scale-105 transition-transform text-center">
                    Get Started Now
                </a>
            </div>
        </div>

        <div class="flex-1 w-full max-w-md">
            <div class="bg-white dark:bg-[#161615] border border-gray-100 dark:border-[#3E3E3A] rounded-3xl shadow-2xl overflow-hidden p-8">
                <div class="flex justify-between items-center mb-8">
                    <h3 class="font-bold text-gray-800 dark:text-white">Student Performance</h3>
                    <span class="text-[10px] bg-purple-100 text-purple-700 px-3 py-1 rounded-full font-bold uppercase tracking-wider">Preview</span>
                </div>
                
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-[#1b1b18] rounded-2xl border border-gray-50 dark:border-transparent">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 font-bold">JD</div>
                            <div>
                                <p class="text-sm font-bold dark:text-gray-200">Dela Cruz, Juan</p>
                                <p class="text-[10px] text-gray-400">BS Information Tech.</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-md font-black text-purple-600">94%</p>
                            <p class="text-[9px] font-bold text-green-500 uppercase">GOAL MET</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-[#1b1b18] rounded-2xl border border-gray-50 dark:border-transparent">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 font-bold">MR</div>
                            <div>
                                <p class="text-sm font-bold dark:text-gray-200">Reyes, Maria</p>
                                <p class="text-[10px] text-gray-400">BS Computer Science</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-md font-black text-purple-600">72%</p>
                            <p class="text-[9px] font-bold text-red-500 uppercase">AT RISK</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-50 dark:border-[#3E3E3A] text-center">
                    <p class="text-[11px] text-gray-400 font-medium italic">OBLMS Dashboard Preview • Academic Year 2025-2026</p>
                </div>
            </div>
        </div>
    </main>

    <footer class="w-full py-10 text-center text-xs text-gray-400 border-t border-gray-50 dark:border-[#161615] mt-auto">
        &copy; {{ date('Y') }} <strong>OBLMS</strong>. All rights reserved.
    </footer>
</body>
</html>