<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NotifyMe Components</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body>
    <!-- Navbar Component -->
    <nav class="bg-white shadow-sm" x-data="{ mobileMenu: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <div class="bg-[#2D6F8E] rounded-xl p-2 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>
                    <span class="text-[#2D6F8E] font-bold text-xl">NotifyMe</span>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center gap-6">
                    <div class="flex items-center gap-4">
                        <a href="#" class="text-[#2D6F8E] font-medium hover:text-[#235D77] transition-colors">Dashboard</a>
                        <a href="#" class="text-gray-600 font-medium hover:text-[#2D6F8E] transition-colors">Schedule</a>
                        <a href="#" class="text-gray-600 font-medium hover:text-[#2D6F8E] transition-colors">Tasks</a>
                        <a href="#" class="text-gray-600 font-medium hover:text-[#2D6F8E] transition-colors">Settings</a>
                    </div>

                    <div class="flex items-center gap-4 ml-4">
                        <!-- Notification Button -->
                        <button class="relative p-2 text-gray-600 hover:text-[#2D6F8E] transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full">2</span>
                        </button>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <button 
                    @click="mobileMenu = !mobileMenu" 
                    class="md:hidden p-2 rounded-lg text-gray-600 hover:text-[#2D6F8E] transition-colors"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" x-show="!mobileMenu" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" x-show="mobileMenu" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="md:hidden" x-show="mobileMenu" x-transition>
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="#" class="block px-3 py-2 rounded-lg text-[#2D6F8E] font-medium">Dashboard</a>
                <a href="#" class="block px-3 py-2 rounded-lg text-gray-600 font-medium hover:text-[#2D6F8E] hover:bg-gray-50">Schedule</a>
                <a href="#" class="block px-3 py-2 rounded-lg text-gray-600 font-medium hover:text-[#2D6F8E] hover:bg-gray-50">Tasks</a>
                <a href="#" class="block px-3 py-2 rounded-lg text-gray-600 font-medium hover:text-[#2D6F8E] hover:bg-gray-50">Settings</a>
            </div>
        </div>
    </nav>

    <!-- Content Placeholder -->
    <div class="min-h-screen">
        @yield('content')
    </div>

    <!-- Footer Component -->
    <footer class="bg-white border-t">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-2">
                    <div class="bg-[#2D6F8E] rounded-lg p-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>
                    <span class="text-gray-500 text-sm">© 2025 NotifyMe. All rights reserved.</span>
                </div>
                <div class="flex items-center gap-6">
                    <a href="#" class="text-gray-500 hover:text-[#2D6F8E] text-sm transition-colors">Privacy Policy</a>
                    <a href="#" class="text-gray-500 hover:text-[#2D6F8E] text-sm transition-colors">Terms of Service</a>
                    <a href="#" class="text-gray-500 hover:text-[#2D6F8E] text-sm transition-colors">Support</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>