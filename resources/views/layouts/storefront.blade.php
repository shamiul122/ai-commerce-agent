<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $pageTitle ?? 'Nexus Retail' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div x-data="{ mobileMenuOpen: false, cartOpen: false }" class="min-h-screen bg-white text-slate-900 font-sans flex flex-col">
        {{-- Top Banner --}}
        <div class="bg-slate-900 text-white text-xs font-medium py-2 text-center">
            Free shipping on all orders over $150. <a href="{{ route('shop') }}" class="underline ml-1 hover:text-indigo-300">Shop now</a>
        </div>

        {{-- Header --}}
        <header class="sticky top-0 z-40 bg-white/80 backdrop-blur-md border-b border-slate-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    {{-- Mobile menu button --}}
                    <div class="flex items-center sm:hidden">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 text-slate-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        </button>
                    </div>

                    {{-- Logo --}}
                    <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center">
                        <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center mr-2">
                            <div class="w-4 h-4 border-2 border-white rounded-sm"></div>
                        </div>
                        <span class="font-bold text-xl tracking-tight">Nexus Retail</span>
                    </a>

                    {{-- Desktop Navigation --}}
                    <nav class="hidden sm:flex space-x-6">
                        <a href="{{ route('home') }}" class="text-sm font-medium {{ request()->routeIs('home') ? 'text-indigo-600' : 'text-slate-600 hover:text-slate-900' }}">Home</a>
                        <a href="{{ route('shop') }}" class="text-sm font-medium {{ request()->routeIs('shop') ? 'text-indigo-600' : 'text-slate-600 hover:text-slate-900' }}">Shop</a>
                        <a href="{{ route('shop') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">Categories</a>
                        <a href="{{ route('shop') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">Brands</a>
                        <a href="{{ route('about') }}" class="text-sm font-medium {{ request()->routeIs('about') ? 'text-indigo-600' : 'text-slate-600 hover:text-slate-900' }}">About</a>
                    </nav>

                    {{-- Right icons --}}
                    <div class="flex items-center space-x-2 sm:space-x-4">
                        <a href="{{ route('shop') }}" class="p-2 text-slate-400 hover:text-slate-600 hidden sm:block" title="Search">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </a>
                        <a href="{{ route('wishlist') }}" class="p-2 text-slate-400 hover:text-rose-600 hidden sm:block" title="Wishlist">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </a>
                        @auth
                            <a href="{{ route('profile.edit') }}" class="p-2 text-slate-400 hover:text-indigo-600 hidden sm:block" title="My Account">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="p-2 text-slate-400 hover:text-indigo-600 hidden sm:block" title="Sign In">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </a>
                        @endauth
                        <button @click="cartOpen = true" class="p-2 text-slate-400 hover:text-slate-600 relative">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-rose-500 rounded-full"></span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Mobile Navigation Menu --}}
            <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2" class="sm:hidden absolute top-full left-0 w-full bg-white shadow-xl border-t border-slate-100 max-h-[calc(100vh-64px)] overflow-y-auto" style="display: none;">
                <div class="px-4 py-4 space-y-1">
                    <a href="{{ route('home') }}" class="block px-3 py-3 rounded-lg text-base font-medium w-full text-left {{ request()->routeIs('home') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-700 hover:bg-slate-50' }}">Home</a>
                    <a href="{{ route('shop') }}" class="block px-3 py-3 rounded-lg text-base font-medium w-full text-left {{ request()->routeIs('shop') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-700 hover:bg-slate-50' }}">Shop</a>
                    <a href="{{ route('about') }}" class="block px-3 py-3 rounded-lg text-base font-medium w-full text-left {{ request()->routeIs('about') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-700 hover:bg-slate-50' }}">About</a>
                    <a href="{{ route('contact') }}" class="block px-3 py-3 rounded-lg text-base font-medium w-full text-left {{ request()->routeIs('contact') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-700 hover:bg-slate-50' }}">Contact</a>

                    <div class="border-t border-slate-100 my-4 pt-4 space-y-1">
                        @auth
                            <a href="{{ route('profile.edit') }}" class="block px-3 py-3 rounded-lg text-base font-medium w-full text-left text-slate-700 hover:bg-slate-50 flex items-center">
                                <svg class="w-5 h-5 mr-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                Account
                            </a>
                            <a href="{{ route('wishlist') }}" class="block px-3 py-3 rounded-lg text-base font-medium w-full text-left text-slate-700 hover:bg-slate-50 flex items-center">
                                <svg class="w-5 h-5 mr-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                Wishlist
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="block px-3 py-3 rounded-lg text-base font-medium w-full text-left text-slate-700 hover:bg-slate-50 flex items-center">
                                <svg class="w-5 h-5 mr-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                                Sign In
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </header>

        {{-- Main Content --}}
        <main class="flex-1 flex flex-col">
            {{ $slot }}
        </main>

        {{-- Footer --}}
        <footer class="bg-slate-900 text-slate-300 py-12 mt-auto border-t border-slate-800 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <div>
                    <div class="flex items-center mb-4 text-white">
                        <div class="w-6 h-6 bg-indigo-600 rounded flex items-center justify-center mr-2">
                            <div class="w-3 h-3 border-2 border-white rounded-sm"></div>
                        </div>
                        <span class="font-bold text-lg tracking-tight">Nexus Retail</span>
                    </div>
                    <p class="text-sm text-slate-400">Premium tech accessories and ergonomic workspace solutions designed for modern professionals.</p>
                </div>
                <div>
                    <h3 class="font-bold mb-4 text-white">Shop</h3>
                    <ul class="space-y-2 text-sm text-slate-400">
                        <li><a href="{{ route('shop') }}" class="hover:text-indigo-400 transition-colors">All Products</a></li>
                        <li><a href="{{ route('shop') }}" class="hover:text-indigo-400 transition-colors">Categories</a></li>
                        <li><a href="{{ route('shop') }}" class="hover:text-indigo-400 transition-colors">Brands</a></li>
                        <li><a href="{{ route('shop') }}" class="hover:text-indigo-400 transition-colors">Archive</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold mb-4 text-white">Company</h3>
                    <ul class="space-y-2 text-sm text-slate-400">
                        <li><a href="{{ route('about') }}" class="hover:text-indigo-400 transition-colors">About Us</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-indigo-400 transition-colors">Contact</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-indigo-400 transition-colors">Admin Portal</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold mb-4 text-white">Subscribe</h3>
                    <p class="text-sm text-slate-400 mb-4">Get 10% off your first order and stay updated on new arrivals.</p>
                    <div class="flex">
                        <input type="email" placeholder="Your email" class="bg-slate-800 border border-slate-700 rounded-l-lg px-4 py-2 w-full text-sm focus:outline-none focus:border-indigo-500 text-white placeholder-slate-500" />
                        <button class="bg-indigo-600 text-white px-4 py-2 rounded-r-lg hover:bg-indigo-500 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border-t border-slate-800 pt-8 flex justify-center text-sm text-slate-500 font-medium">
                &copy; {{ date('Y') }} Nexus Retail. All rights reserved.
            </div>
        </footer>
    </div>
</body>
</html>
