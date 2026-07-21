<x-admin-layout pageTitle="Dashboard">
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Dashboard Overview</h1>
            <div class="flex items-center gap-3">
                <select class="bg-white border border-slate-300 text-slate-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block p-2.5 outline-none shadow-sm">
                    <option>Last 7 days</option>
                    <option>Last 30 days</option>
                    <option>This Year</option>
                </select>
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 px-4 rounded-lg text-sm transition-colors shadow-sm">
                    Download Report
                </button>
            </div>
        </div>

        {{-- Stats Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            @php
                $stats = [
                    ['name' => 'Total Revenue', 'value' => '$124,592.00', 'change' => '+14.2%', 'isIncrease' => true, 'subtext' => 'vs. $109,102 last month'],
                    ['name' => 'Total Orders', 'value' => '3,842', 'change' => '+5.1%', 'isIncrease' => true, 'subtext' => 'Avg. $32.42 per order'],
                    ['name' => 'New Customers', 'value' => '1,105', 'change' => '-2.4%', 'isIncrease' => false, 'subtext' => 'LTV: $482.00'],
                    ['name' => 'Conversion Rate', 'value' => '4.12%', 'change' => '+0.8%', 'isIncrease' => true, 'subtext' => 'Sessions: 93,204'],
                ];
            @endphp
            @foreach($stats as $stat)
                <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm flex flex-col">
                    <div class="flex justify-between items-start mb-4">
                        <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">{{ $stat['name'] }}</span>
                        <span class="px-2 py-0.5 rounded text-xs font-bold font-mono {{ $stat['isIncrease'] ? 'text-emerald-600 bg-emerald-50' : 'text-rose-600 bg-rose-50' }}">
                            {{ $stat['change'] }}
                        </span>
                    </div>
                    <p class="text-2xl font-bold text-slate-900">{{ $stat['value'] }}</p>
                    <p class="text-xs text-slate-400 mt-1">{{ $stat['subtext'] }}</p>
                </div>
            @endforeach
        </div>

        {{-- Charts & Products --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Main Chart Placeholder --}}
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 lg:col-span-2">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-slate-900">Revenue Overview</h2>
                    <button class="text-slate-400 hover:text-slate-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/></svg>
                    </button>
                </div>
                <div class="h-[300px] w-full bg-slate-50 rounded-xl flex items-center justify-center border border-dashed border-slate-200">
                    <div class="text-center">
                        <svg class="w-12 h-12 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        <p class="text-sm text-slate-400">Chart integration pending</p>
                    </div>
                </div>
            </div>

            {{-- Low Stock & Marketing --}}
            <div class="space-y-6">
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                    <h3 class="font-bold text-slate-900 mb-4">Low Stock Alerts</h3>
                    <div class="space-y-4">
                        @php
                            $lowStock = [
                                ['name' => 'Wireless Noise-Canceling Headphones', 'inventory' => 45, 'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=100&q=80'],
                                ['name' => 'Minimalist Mechanical Keyboard', 'inventory' => 12, 'image' => 'https://images.unsplash.com/photo-1595225476474-87563907a212?auto=format&fit=crop&w=100&q=80'],
                                ['name' => 'Ergonomic Office Chair', 'inventory' => 0, 'image' => 'https://images.unsplash.com/photo-1505843490538-5133c6c7d0e1?auto=format&fit=crop&w=100&q=80'],
                            ];
                        @endphp
                        @foreach($lowStock as $product)
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg flex-shrink-0 overflow-hidden bg-slate-100">
                                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-full object-cover" />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold text-slate-900 truncate">{{ $product['name'] }}</p>
                                    <p class="text-xs font-medium {{ $product['inventory'] === 0 ? 'text-rose-500' : 'text-amber-500' }}">
                                        {{ $product['inventory'] === 0 ? 'Out of stock' : $product['inventory'] . ' units left' }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="w-full mt-5 py-2 border border-slate-200 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors text-slate-700">
                        Manage Inventory
                    </button>
                </div>

                <div class="bg-slate-900 rounded-xl p-5 text-white overflow-hidden relative shadow-sm">
                    <div class="relative z-10">
                        <h4 class="text-lg font-bold mb-1">Marketing Insight</h4>
                        <p class="text-xs text-slate-400 mb-4">Your Instagram campaign is performing 22% better than average.</p>
                        <button class="text-xs font-bold text-indigo-400 hover:text-indigo-300">Run Optimization &rarr;</button>
                    </div>
                    <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-indigo-500/20 rounded-full blur-2xl"></div>
                </div>
            </div>
        </div>

        {{-- Recent Orders --}}
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm flex flex-col overflow-hidden">
            <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                <h2 class="font-bold text-slate-900">Recent Orders</h2>
                <a href="{{ route('admin.orders') }}" class="text-xs font-semibold text-indigo-600 hover:text-indigo-800">View All Orders</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-xs text-slate-500 border-b border-slate-50 uppercase tracking-wider">
                            <th class="px-5 py-3 font-semibold">Order ID</th>
                            <th class="px-5 py-3 font-semibold">Customer</th>
                            <th class="px-5 py-3 font-semibold">Date</th>
                            <th class="px-5 py-3 font-semibold">Amount</th>
                            <th class="px-5 py-3 font-semibold">Status</th>
                            <th class="px-5 py-3 font-semibold text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @php
                            $recentOrders = [
                                ['id' => 'ORD-001', 'customer' => 'Alice Smith', 'email' => 'alice@example.com', 'date' => '2026-07-19', 'amount' => 120.50, 'status' => 'Completed'],
                                ['id' => 'ORD-002', 'customer' => 'Bob Johnson', 'email' => 'bob@example.com', 'date' => '2026-07-18', 'amount' => 450.00, 'status' => 'Processing'],
                                ['id' => 'ORD-003', 'customer' => 'Charlie Brown', 'email' => 'charlie@example.com', 'date' => '2026-07-18', 'amount' => 85.00, 'status' => 'Completed'],
                                ['id' => 'ORD-004', 'customer' => 'Diana Prince', 'email' => 'diana@example.com', 'date' => '2026-07-17', 'amount' => 920.00, 'status' => 'Pending'],
                                ['id' => 'ORD-005', 'customer' => 'Evan Wright', 'email' => 'evan@example.com', 'date' => '2026-07-16', 'amount' => 45.99, 'status' => 'Canceled'],
                            ];
                        @endphp
                        @foreach($recentOrders as $order)
                            <tr class="border-b border-slate-50 hover:bg-slate-50 transition-colors">
                                <td class="px-5 py-3 font-mono text-xs text-slate-600">{{ $order['id'] }}</td>
                                <td class="px-5 py-3">
                                    <div class="flex flex-col">
                                        <span class="font-medium text-slate-900">{{ $order['customer'] }}</span>
                                        <span class="text-slate-500 text-xs">{{ $order['email'] }}</span>
                                    </div>
                                </td>
                                <td class="px-5 py-3 text-slate-500">{{ $order['date'] }}</td>
                                <td class="px-5 py-3 font-medium text-slate-900">${{ number_format($order['amount'], 2) }}</td>
                                <td class="px-5 py-3">
                                    @php
                                        $statusClass = match($order['status']) {
                                            'Completed' => 'bg-emerald-100 text-emerald-700',
                                            'Processing' => 'bg-blue-100 text-blue-700',
                                            'Pending' => 'bg-amber-100 text-amber-700',
                                            'Canceled' => 'bg-slate-100 text-slate-600',
                                            default => 'bg-slate-100 text-slate-600',
                                        };
                                    @endphp
                                    <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase {{ $statusClass }}">
                                        {{ $order['status'] }}
                                    </span>
                                </td>
                                <td class="px-5 py-3 text-right text-indigo-600 font-medium cursor-pointer hover:text-indigo-800">
                                    Details
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
