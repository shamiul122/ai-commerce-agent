<x-storefront-layout pageTitle="Shopping Cart - Nexus Retail">
    <div class="flex-1 bg-slate-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight mb-8">Shopping Cart</h1>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Cart Items --}}
                <div class="lg:col-span-2 space-y-4">
                    @php
                        $cartItems = [
                            ['name' => 'Wireless Noise-Canceling Headphones', 'price' => 299.99, 'qty' => 1, 'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=100&q=80'],
                            ['name' => 'Minimalist Mechanical Keyboard', 'price' => 149.50, 'qty' => 2, 'image' => 'https://images.unsplash.com/photo-1595225476474-87563907a212?auto=format&fit=crop&w=100&q=80'],
                        ];
                    @endphp

                    @foreach($cartItems as $item)
                        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 flex items-center gap-4">
                            <div class="w-20 h-20 rounded-lg overflow-hidden bg-slate-100 flex-shrink-0">
                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover" />
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="font-bold text-slate-900 truncate">{{ $item['name'] }}</h3>
                                <p class="text-sm text-slate-500 mt-1">${{ number_format($item['price'], 2) }}</p>
                            </div>
                            <div class="flex items-center border border-slate-300 rounded-lg h-10 bg-white flex-shrink-0">
                                <button class="px-3 text-slate-500 hover:text-slate-900 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                                </button>
                                <span class="font-semibold text-slate-900 w-8 text-center">{{ $item['qty'] }}</span>
                                <button class="px-3 text-slate-500 hover:text-slate-900 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                </button>
                            </div>
                            <div class="text-right flex-shrink-0">
                                <p class="font-bold text-slate-900">${{ number_format($item['price'] * $item['qty'], 2) }}</p>
                                <button class="text-xs text-rose-500 hover:text-rose-700 mt-1">Remove</button>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Order Summary --}}
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 sticky top-24">
                        <h2 class="font-bold text-slate-900 text-lg mb-6">Order Summary</h2>
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between">
                                <span class="text-slate-500">Subtotal (3 items)</span>
                                <span class="font-medium text-slate-900">$598.99</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-500">Shipping</span>
                                <span class="font-medium text-emerald-600">Free</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-500">Tax</span>
                                <span class="font-medium text-slate-900">$47.92</span>
                            </div>
                            <div class="border-t border-slate-200 pt-3 mt-3">
                                <div class="flex justify-between">
                                    <span class="font-bold text-slate-900">Total</span>
                                    <span class="font-bold text-slate-900 text-lg">$646.91</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 space-y-3">
                            <div class="flex items-center gap-2">
                                <input type="text" placeholder="Coupon code" class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                                <button class="px-4 py-2 bg-slate-900 text-white text-sm font-medium rounded-lg hover:bg-slate-800 transition-colors">Apply</button>
                            </div>
                            <a href="{{ route('checkout') }}" class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl flex items-center justify-center gap-2 transition-all shadow-md hover:shadow-lg">
                                Proceed to Checkout
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                            <a href="{{ route('shop') }}" class="w-full py-3 border border-slate-200 text-slate-700 font-medium rounded-xl flex items-center justify-center gap-2 hover:bg-slate-50 transition-colors">
                                Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-storefront-layout>
