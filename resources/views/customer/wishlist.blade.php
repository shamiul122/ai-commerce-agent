<x-customer-layout pageTitle="Wishlist">
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">My Wishlist</h1>
            <span class="text-sm text-slate-500">5 items</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @php
                $wishlistItems = [
                    ['name' => 'Wireless Noise-Canceling Headphones', 'price' => 299.99, 'category' => 'Electronics', 'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=400&q=80'],
                    ['name' => 'Minimalist Mechanical Keyboard', 'price' => 149.50, 'category' => 'Accessories', 'image' => 'https://images.unsplash.com/photo-1595225476474-87563907a212?auto=format&fit=crop&w=400&q=80'],
                    ['name' => 'Ergonomic Office Chair', 'price' => 399.00, 'category' => 'Furniture', 'image' => 'https://images.unsplash.com/photo-1505843490538-5133c6c7d0e1?auto=format&fit=crop&w=400&q=80'],
                    ['name' => '4K Ultra-Wide Monitor', 'price' => 699.99, 'category' => 'Electronics', 'image' => 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?auto=format&fit=crop&w=400&q=80'],
                    ['name' => 'Premium Desk Lamp', 'price' => 79.99, 'category' => 'Furniture', 'image' => 'https://images.unsplash.com/photo-1507473885765-e6ed057ab6fe?auto=format&fit=crop&w=400&q=80'],
                ];
            @endphp

            @foreach($wishlistItems as $item)
                <div class="bg-white rounded-xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-lg transition-all duration-300 group">
                    <div class="relative aspect-[4/3] bg-slate-100 overflow-hidden">
                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                        <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm px-2.5 py-1 rounded text-[10px] font-bold tracking-wider uppercase text-slate-900 shadow-sm">
                            {{ $item['category'] }}
                        </div>
                        <button class="absolute top-3 right-3 p-2 bg-white/80 backdrop-blur-sm hover:bg-white text-rose-500 rounded-full transition-colors shadow-sm">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-slate-900 mb-1 truncate">{{ $item['name'] }}</h3>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-lg font-bold text-slate-900">${{ number_format($item['price'], 2) }}</span>
                            <a href="{{ route('cart') }}" class="w-8 h-8 rounded-full bg-slate-100 text-slate-900 flex items-center justify-center hover:bg-indigo-600 hover:text-white transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-customer-layout>
