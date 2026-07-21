<x-customer-layout pageTitle="My Orders">
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">My Orders</h1>
            <a href="{{ route('shop') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg text-sm transition-colors shadow-sm inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                Shop More
            </a>
        </div>

        {{-- Filter Tabs --}}
        <div class="flex items-center gap-2 border-b border-slate-200">
            <button class="px-4 py-2.5 text-sm font-medium border-b-2 border-indigo-600 text-indigo-600">All Orders</button>
            <button class="px-4 py-2.5 text-sm font-medium border-b-2 border-transparent text-slate-500 hover:text-slate-700">Processing</button>
            <button class="px-4 py-2.5 text-sm font-medium border-b-2 border-transparent text-slate-500 hover:text-slate-700">Shipped</button>
            <button class="px-4 py-2.5 text-sm font-medium border-b-2 border-transparent text-slate-500 hover:text-slate-700">Delivered</button>
        </div>

        {{-- Orders List --}}
        <div class="space-y-4">
            @php
                $orders = [
                    ['id' => 'ORD-1001', 'date' => '2026-07-19', 'items' => [['name' => 'Wireless Headphones', 'price' => 299.99, 'qty' => 1, 'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=100&q=80'], ['name' => 'Keyboard Cover', 'price' => 24.99, 'qty' => 2, 'image' => 'https://images.unsplash.com/photo-1595225476474-87563907a212?auto=format&fit=crop&w=100&q=80']], 'total' => 349.97, 'status' => 'Delivered'],
                    ['id' => 'ORD-1002', 'date' => '2026-07-15', 'items' => [['name' => 'Noise-Canceling Headphones', 'price' => 299.99, 'qty' => 1, 'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=100&q=80']], 'total' => 299.99, 'status' => 'Shipped'],
                    ['id' => 'ORD-1003', 'date' => '2026-07-10', 'items' => [['name' => 'Ergonomic Chair', 'price' => 399.00, 'qty' => 1, 'image' => 'https://images.unsplash.com/photo-1505843490538-5133c6c7d0e1?auto=format&fit=crop&w=100&q=80'], ['name' => 'Monitor Stand', 'price' => 149.50, 'qty' => 1, 'image' => 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?auto=format&fit=crop&w=100&q=80']], 'total' => 548.50, 'status' => 'Processing'],
                ];
            @endphp

            @foreach($orders as $order)
                @php
                    $statusClass = match($order['status']) {
                        'Delivered' => 'bg-emerald-100 text-emerald-700',
                        'Shipped' => 'bg-blue-100 text-blue-700',
                        'Processing' => 'bg-amber-100 text-amber-700',
                        default => 'bg-slate-100 text-slate-600',
                    };
                @endphp
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="p-4 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="flex items-center gap-4">
                            <div>
                                <p class="font-mono text-sm font-semibold text-slate-900">{{ $order['id'] }}</p>
                                <p class="text-xs text-slate-500">{{ $order['date'] }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase {{ $statusClass }}">{{ $order['status'] }}</span>
                            <span class="font-bold text-slate-900">${{ number_format($order['total'], 2) }}</span>
                        </div>
                    </div>
                    <div class="p-4 space-y-3">
                        @foreach($order['items'] as $item)
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-lg overflow-hidden bg-slate-100 flex-shrink-0">
                                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover" />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-slate-900 truncate">{{ $item['name'] }}</p>
                                    <p class="text-xs text-slate-500">Qty: {{ $item['qty'] }} &middot; ${{ number_format($item['price'], 2) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-customer-layout>
