<x-customer-layout pageTitle="Dashboard">
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Welcome back, {{ Auth::user()->name }}</h1>
                <p class="text-sm text-slate-500 mt-1">Here's what's happening with your account.</p>
            </div>
            <a href="{{ route('shop') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 px-4 rounded-lg text-sm transition-colors shadow-sm inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                Continue Shopping
            </a>
        </div>

        {{-- Stats Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            @php
                $stats = [
                    ['name' => 'Total Orders', 'value' => '12', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>', 'color' => 'indigo'],
                    ['name' => 'Pending Orders', 'value' => '2', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>', 'color' => 'amber'],
                    ['name' => 'Wishlist Items', 'value' => '5', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>', 'color' => 'rose'],
                    ['name' => 'Total Spent', 'value' => '$2,450', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>', 'color' => 'emerald'],
                ];
            @endphp
            @foreach($stats as $stat)
                <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm flex flex-col">
                    <div class="flex justify-between items-start mb-4">
                        <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">{{ $stat['name'] }}</span>
                        <div class="w-8 h-8 rounded-lg bg-{{ $stat['color'] }}-50 flex items-center justify-center text-{{ $stat['color'] }}-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $stat['icon'] !!}</svg>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-slate-900">{{ $stat['value'] }}</p>
                </div>
            @endforeach
        </div>

        {{-- Recent Orders --}}
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm flex flex-col overflow-hidden">
            <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                <h2 class="font-bold text-slate-900">Recent Orders</h2>
                <a href="{{ route('customer.orders') }}" class="text-xs font-semibold text-indigo-600 hover:text-indigo-800">View All</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-xs text-slate-500 border-b border-slate-50 uppercase tracking-wider">
                            <th class="px-5 py-3 font-semibold">Order ID</th>
                            <th class="px-5 py-3 font-semibold">Date</th>
                            <th class="px-5 py-3 font-semibold">Items</th>
                            <th class="px-5 py-3 font-semibold">Total</th>
                            <th class="px-5 py-3 font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @php
                            $orders = [
                                ['id' => 'ORD-1001', 'date' => '2026-07-19', 'items' => 3, 'total' => 449.97, 'status' => 'Delivered'],
                                ['id' => 'ORD-1002', 'date' => '2026-07-15', 'items' => 1, 'total' => 299.99, 'status' => 'Shipped'],
                                ['id' => 'ORD-1003', 'date' => '2026-07-10', 'items' => 2, 'total' => 548.50, 'status' => 'Processing'],
                            ];
                        @endphp
                        @foreach($orders as $order)
                            <tr class="border-b border-slate-50 hover:bg-slate-50 transition-colors">
                                <td class="px-5 py-3 font-mono text-xs text-slate-600">{{ $order['id'] }}</td>
                                <td class="px-5 py-3 text-slate-500">{{ $order['date'] }}</td>
                                <td class="px-5 py-3 text-slate-600">{{ $order['items'] }} items</td>
                                <td class="px-5 py-3 font-medium text-slate-900">${{ number_format($order['total'], 2) }}</td>
                                <td class="px-5 py-3">
                                    @php
                                        $statusClass = match($order['status']) {
                                            'Delivered' => 'bg-emerald-100 text-emerald-700',
                                            'Shipped' => 'bg-blue-100 text-blue-700',
                                            'Processing' => 'bg-amber-100 text-amber-700',
                                            default => 'bg-slate-100 text-slate-600',
                                        };
                                    @endphp
                                    <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase {{ $statusClass }}">
                                        {{ $order['status'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-customer-layout>
