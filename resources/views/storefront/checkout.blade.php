<x-storefront-layout pageTitle="Checkout - Nexus Retail">
    <div class="flex-1 bg-slate-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight mb-8">Checkout</h1>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Checkout Form --}}
                <div class="lg:col-span-2 space-y-6">
                    {{-- Shipping Info --}}
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                        <h2 class="font-bold text-slate-900 text-lg mb-6">Shipping Information</h2>
                        <form class="space-y-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">First Name</label>
                                    <input type="text" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">Last Name</label>
                                    <input type="text" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                                <input type="email" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Address</label>
                                <input type="text" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">City</label>
                                    <input type="text" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">State</label>
                                    <input type="text" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">ZIP Code</label>
                                    <input type="text" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- Payment Info --}}
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                        <h2 class="font-bold text-slate-900 text-lg mb-6">Payment Method</h2>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Card Number</label>
                                <input type="text" placeholder="1234 5678 9012 3456" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">Expiry</label>
                                    <input type="text" placeholder="MM/YY" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">CVC</label>
                                    <input type="text" placeholder="123" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Order Summary --}}
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 sticky top-24">
                        <h2 class="font-bold text-slate-900 text-lg mb-6">Order Summary</h2>
                        <div class="space-y-4 mb-6">
                            @php
                                $items = [
                                    ['name' => 'Wireless Headphones', 'price' => 299.99, 'qty' => 1, 'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=60&q=80'],
                                    ['name' => 'Mechanical Keyboard', 'price' => 149.50, 'qty' => 2, 'image' => 'https://images.unsplash.com/photo-1595225476474-87563907a212?auto=format&fit=crop&w=60&q=80'],
                                ];
                            @endphp
                            @foreach($items as $item)
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-lg overflow-hidden bg-slate-100 flex-shrink-0">
                                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover" />
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-slate-900 truncate">{{ $item['name'] }} x{{ $item['qty'] }}</p>
                                    </div>
                                    <span class="text-sm font-medium text-slate-900">${{ number_format($item['price'] * $item['qty'], 2) }}</span>
                                </div>
                            @endforeach
                        </div>
                        <div class="border-t border-slate-200 pt-4 space-y-3 text-sm">
                            <div class="flex justify-between">
                                <span class="text-slate-500">Subtotal</span>
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
                            <div class="border-t border-slate-200 pt-3">
                                <div class="flex justify-between">
                                    <span class="font-bold text-slate-900">Total</span>
                                    <span class="font-bold text-slate-900 text-lg">$646.91</span>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('checkout.success') }}" class="w-full mt-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl flex items-center justify-center gap-2 transition-all shadow-md hover:shadow-lg">
                            Place Order
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-storefront-layout>
