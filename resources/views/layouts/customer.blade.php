<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $pageTitle ?? 'My Account' }} - Nexus Retail</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div x-data="{ sidebarOpen: false }" class="min-h-screen bg-slate-50 flex font-sans overflow-hidden">
        {{-- Mobile sidebar backdrop --}}
        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-40 bg-slate-900/80 lg:hidden" style="display: none;"></div>

        {{-- Sidebar --}}
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-50 w-64 bg-white text-slate-700 flex flex-col border-r border-slate-200 transform transition-transform duration-200 ease-in-out lg:translate-x-0 lg:static lg:flex">
            <div class="p-6 flex items-center gap-3 shrink-0">
                <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                    <div class="w-4 h-4 border-2 border-white rounded-sm"></div>
                </div>
                <span class="font-bold text-xl tracking-tight text-slate-900">Nexus Retail</span>
                <button @click="sidebarOpen = false" class="lg:hidden ml-auto text-slate-400 hover:text-slate-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <nav class="flex-1 px-4 space-y-1 overflow-y-auto pb-4 custom-scrollbar">
                @php
                    $navItems = [
                        ['route' => 'customer.dashboard', 'name' => 'Dashboard', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>'],
                        ['route' => 'customer.orders', 'name' => 'My Orders', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>'],
                        ['route' => 'customer.wishlist', 'name' => 'Wishlist', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>'],
                        ['route' => 'customer.profile', 'name' => 'Profile', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>'],
                    ];
                @endphp

                @foreach($navItems as $item)
                    <a href="{{ route($item['route']) }}" class="flex items-center px-3 py-2 rounded-md transition-colors gap-3 {{ request()->routeIs($item['route']) ? 'bg-indigo-50 text-indigo-700' : 'hover:bg-slate-50 text-slate-600 hover:text-slate-900' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $item['icon'] !!}</svg>
                        <span class="text-sm font-medium">{{ $item['name'] }}</span>
                    </a>
                @endforeach
            </nav>

            <div class="p-4 mt-auto border-t border-slate-200 shrink-0">
                <a href="{{ route('home') }}" class="w-full py-2 px-3 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-sm font-medium transition-colors flex items-center justify-center gap-2 shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                    Back to Store
                </a>
            </div>
        </aside>

        {{-- Main content --}}
        <main class="flex-1 flex flex-col min-w-0 h-screen">
            {{-- Header --}}
            <header class="h-14 shrink-0 bg-white border-b border-slate-200 flex items-center justify-between px-4 relative z-10">
                <div class="flex items-center gap-3">
                    <button @click="sidebarOpen = true" class="lg:hidden text-slate-500 hover:text-slate-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                    <div class="hidden sm:flex items-center gap-2">
                        <span class="font-semibold text-slate-800 text-sm tracking-tight">My Account</span>
                        <span class="text-slate-300 mx-1">/</span>
                        <span class="text-sm text-slate-600">{{ $pageTitle ?? 'Dashboard' }}</span>
                    </div>
                </div>

                <div class="flex items-center gap-2 sm:gap-3">
                    <div class="w-px h-6 bg-slate-200 mx-1 hidden sm:block"></div>

                    <button class="relative p-1.5 text-slate-500 hover:text-slate-900 hover:bg-slate-100 rounded-md transition-colors focus:outline-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        <span class="absolute top-1.5 right-1.5 w-1.5 h-1.5 bg-rose-500 rounded-full"></span>
                    </button>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="w-7 h-7 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-500 flex items-center justify-center text-white text-xs font-bold shadow-sm cursor-pointer border border-white/20 ml-1 hover:opacity-90 transition-opacity">
                            {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
                        </button>
                    </form>
                </div>
            </header>

            {{-- Main scrollable area --}}
            <div class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>
