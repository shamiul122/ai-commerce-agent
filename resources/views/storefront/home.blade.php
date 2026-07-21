<x-storefront-layout pageTitle="Nexus Retail - Premium Tech & Workspace">
    {{-- Hero Section --}}
    <section class="relative bg-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900 to-indigo-900/80 z-10"></div>
        <img src="https://images.unsplash.com/photo-1550009158-9ebf69173e03?auto=format&fit=crop&w=1920&q=80" alt="Hero" class="absolute inset-0 w-full h-full object-cover opacity-50 mix-blend-overlay" />
        <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32 flex flex-col items-start">
            <span class="px-3 py-1 bg-indigo-500/20 border border-indigo-400/30 text-indigo-300 rounded-full text-xs font-bold uppercase tracking-wider mb-6 backdrop-blur-md">
                New Collection 2026
            </span>
            <h1 class="text-4xl md:text-6xl font-bold tracking-tight mb-6 max-w-2xl leading-tight">
                Elevate Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-cyan-400">Workspace</span> Experience
            </h1>
            <p class="text-lg text-slate-300 mb-8 max-w-xl leading-relaxed">
                Discover premium tech accessories and ergonomic furniture designed to boost productivity and bring aesthetic harmony to your daily workflow.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('shop') }}" class="px-8 py-4 bg-white text-slate-900 rounded-xl font-bold flex items-center justify-center gap-2 hover:bg-slate-50 transition-colors shadow-lg">
                    Shop Collection
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
                <a href="{{ route('shop') }}" class="px-8 py-4 bg-slate-800 border border-slate-700 text-white rounded-xl font-bold flex items-center justify-center hover:bg-slate-700 transition-colors shadow-lg">
                    View Lookbook
                </a>
            </div>
        </div>
    </section>

    {{-- Features --}}
    <section class="py-12 border-b border-slate-100 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-600 flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900">Free Global Delivery</h3>
                        <p class="text-sm text-slate-500">On all orders over $150</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-600 flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900">2-Year Warranty</h3>
                        <p class="text-sm text-slate-500">Guaranteed quality</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-600 flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900">24/7 Support</h3>
                        <p class="text-sm text-slate-500">Dedicated assistance</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Featured Products --}}
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-end justify-between mb-10">
                <div>
                    <h2 class="text-3xl font-bold text-slate-900 tracking-tight mb-2">Trending Now</h2>
                    <p class="text-slate-500">Our most popular products this week.</p>
                </div>
                <a href="{{ route('shop') }}" class="hidden sm:flex items-center gap-2 text-indigo-600 font-semibold hover:text-indigo-700 transition-colors">
                    View All Products
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            @php
                $featuredProducts = [
                    ['name' => 'Wireless Noise-Canceling Headphones', 'price' => 299.99, 'category' => 'Electronics', 'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=400&q=80'],
                    ['name' => 'Minimalist Mechanical Keyboard', 'price' => 149.50, 'category' => 'Accessories', 'image' => 'https://images.unsplash.com/photo-1595225476474-87563907a212?auto=format&fit=crop&w=400&q=80'],
                    ['name' => 'Ergonomic Office Chair', 'price' => 399.00, 'category' => 'Furniture', 'image' => 'https://images.unsplash.com/photo-1505843490538-5133c6c7d0e1?auto=format&fit=crop&w=400&q=80'],
                    ['name' => '4K Ultra-Wide Monitor', 'price' => 699.99, 'category' => 'Electronics', 'image' => 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?auto=format&fit=crop&w=400&q=80'],
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($featuredProducts as $product)
                    <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 group cursor-pointer">
                        <div class="relative aspect-[4/3] bg-slate-100 overflow-hidden">
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                            <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm px-2.5 py-1 rounded text-[10px] font-bold tracking-wider uppercase text-slate-900 shadow-sm">
                                {{ $product['category'] }}
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="flex items-center gap-1 mb-2">
                                @for($i = 0; $i < 5; $i++)
                                    <svg class="w-3.5 h-3.5 fill-amber-400 text-amber-400" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endfor
                                <span class="text-xs text-slate-400 ml-1">(124)</span>
                            </div>
                            <h3 class="font-bold text-slate-900 mb-1 truncate">{{ $product['name'] }}</h3>
                            <div class="flex items-center justify-between mt-4">
                                <span class="text-lg font-bold text-slate-900">${{ number_format($product['price'], 2) }}</span>
                                <a href="{{ route('cart') }}" class="w-8 h-8 rounded-full bg-slate-100 text-slate-900 flex items-center justify-center hover:bg-indigo-600 hover:text-white transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Categories Grid --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-slate-900 tracking-tight mb-10 text-center">Shop by Category</h2>
            @php
                $categories = [
                    ['name' => 'Premium Audio', 'desc' => 'Headphones & Speakers', 'image' => 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?auto=format&fit=crop&w=800&q=80'],
                    ['name' => 'Workspace', 'desc' => 'Keyboards & Mice', 'image' => 'https://images.unsplash.com/photo-1593640408182-31c70c8268f5?auto=format&fit=crop&w=800&q=80'],
                    ['name' => 'Ergonomics', 'desc' => 'Chairs & Desks', 'image' => 'https://images.unsplash.com/photo-1505843490538-5133c6c7d0e1?auto=format&fit=crop&w=800&q=80'],
                ];
            @endphp
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($categories as $cat)
                    <a href="{{ route('shop') }}" class="relative rounded-2xl overflow-hidden aspect-[4/5] group cursor-pointer block">
                        <img src="{{ $cat['image'] }}" alt="{{ $cat['name'] }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-8">
                            <h3 class="text-2xl font-bold text-white mb-2">{{ $cat['name'] }}</h3>
                            <p class="text-slate-300 mb-4 text-sm">{{ $cat['desc'] }}</p>
                            <span class="inline-flex items-center gap-2 text-white font-medium bg-white/20 backdrop-blur-md px-4 py-2 rounded-lg hover:bg-white/30 transition-colors">
                                Explore
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Brands Grid --}}
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-slate-900 tracking-tight mb-10 text-center">Shop by Brand</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @php $brands = ['Apple', 'Sony', 'Logitech', 'Herman Miller', 'Keychron', 'Bose', 'Dell', 'Samsung']; @endphp
                @foreach($brands as $brand)
                    <a href="{{ route('shop') }}" class="bg-white border border-slate-200 rounded-2xl p-8 flex items-center justify-center cursor-pointer hover:border-indigo-600 hover:shadow-md transition-all group">
                        <span class="text-xl font-bold text-slate-400 group-hover:text-indigo-600 transition-colors">{{ $brand }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</x-storefront-layout>
