<x-admin-layout pageTitle="{{ ucfirst($viewName) }}">
    @php
        $viewConfig = [
            'orders' => [
                'title' => 'Orders',
                'columns' => ['id' => 'Order ID', 'customer' => 'Customer', 'date' => 'Date', 'amount' => 'Amount', 'status' => 'Status'],
                'data' => [
                    ['id' => 'ORD-001', 'customer' => 'Alice Smith', 'date' => '2026-07-19', 'amount' => 120.50, 'status' => 'Completed'],
                    ['id' => 'ORD-002', 'customer' => 'Bob Johnson', 'date' => '2026-07-18', 'amount' => 450.00, 'status' => 'Processing'],
                    ['id' => 'ORD-003', 'customer' => 'Charlie Brown', 'date' => '2026-07-18', 'amount' => 85.00, 'status' => 'Completed'],
                    ['id' => 'ORD-004', 'customer' => 'Diana Prince', 'date' => '2026-07-17', 'amount' => 920.00, 'status' => 'Pending'],
                    ['id' => 'ORD-005', 'customer' => 'Evan Wright', 'date' => '2026-07-16', 'amount' => 45.99, 'status' => 'Canceled'],
                ],
            ],
            'products' => [
                'title' => 'Products',
                'columns' => ['name' => 'Product Name', 'price' => 'Price', 'category' => 'Category', 'stock' => 'Stock', 'status' => 'Status'],
                'data' => [
                    ['id' => 1, 'name' => 'Wireless Noise-Canceling Headphones', 'price' => 299.99, 'category' => 'Electronics', 'stock' => 45, 'status' => 'Active'],
                    ['id' => 2, 'name' => 'Minimalist Mechanical Keyboard', 'price' => 149.50, 'category' => 'Accessories', 'stock' => 12, 'status' => 'Active'],
                    ['id' => 3, 'name' => 'Ergonomic Office Chair', 'price' => 399.00, 'category' => 'Furniture', 'stock' => 8, 'status' => 'Active'],
                    ['id' => 4, 'name' => '4K Ultra-Wide Monitor', 'price' => 699.99, 'category' => 'Electronics', 'stock' => 0, 'status' => 'Archived'],
                ],
            ],
            'categories' => [
                'title' => 'Categories',
                'columns' => ['name' => 'Name', 'description' => 'Description', 'productCount' => 'Products'],
                'data' => [
                    ['id' => 1, 'name' => 'Electronics', 'description' => 'Gadgets and devices', 'productCount' => 124],
                    ['id' => 2, 'name' => 'Furniture', 'description' => 'Home and office furniture', 'productCount' => 56],
                    ['id' => 3, 'name' => 'Accessories', 'description' => 'Tech accessories and peripherals', 'productCount' => 89],
                ],
            ],
            'brands' => [
                'title' => 'Brands',
                'columns' => ['name' => 'Brand Name', 'website' => 'Website', 'productCount' => 'Products'],
                'data' => [
                    ['id' => 1, 'name' => 'AudioTech', 'website' => 'audiotech.example.com', 'productCount' => 15],
                    ['id' => 2, 'name' => 'KeyCraft', 'website' => 'keycraft.example.com', 'productCount' => 8],
                    ['id' => 3, 'name' => 'ErgoFit', 'website' => 'ergofit.example.com', 'productCount' => 22],
                ],
            ],
            'users' => [
                'title' => 'Users',
                'columns' => ['name' => 'Name', 'email' => 'Email', 'role' => 'Role', 'status' => 'Status'],
                'data' => [
                    ['id' => 1, 'name' => 'Alex Rivera', 'email' => 'alex@example.com', 'role' => 'Admin', 'status' => 'Active'],
                    ['id' => 2, 'name' => 'Sarah Jenkins', 'email' => 'sarah@example.com', 'role' => 'Editor', 'status' => 'Active'],
                    ['id' => 3, 'name' => 'Michael Ross', 'email' => 'michael@example.com', 'role' => 'Viewer', 'status' => 'Inactive'],
                ],
            ],
            'media' => [
                'title' => 'Media',
                'columns' => ['name' => 'File Name', 'type' => 'Type', 'size' => 'Size', 'uploadDate' => 'Upload Date'],
                'data' => [
                    ['id' => 1, 'name' => 'headphones-hero.jpg', 'type' => 'image/jpeg', 'size' => '1.2 MB', 'uploadDate' => '2026-07-19'],
                    ['id' => 2, 'name' => 'keyboard-layout.png', 'type' => 'image/png', 'size' => '2.5 MB', 'uploadDate' => '2026-07-18'],
                ],
            ],
        ];

        $config = $viewConfig[$viewName] ?? ['title' => ucfirst($viewName), 'columns' => [], 'data' => []];
    @endphp

    <div class="space-y-6" x-data="{ searchQuery: '', showModal: false, editingItem: null, formData: {} }">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight">{{ $config['title'] }}</h1>
                <p class="text-sm text-slate-500 mt-1">Manage your {{ strtolower($config['title']) }} here.</p>
            </div>
            <button @click="showModal = true; editingItem = null; formData = {}" class="flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg text-sm transition-colors shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Add {{ rtrim($config['title'], 's') }}
            </button>
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @php
                $total = count($config['data']);
                $statsCards = [
                    ['label' => 'Total ' . $config['title'], 'value' => $total, 'increase' => '+12%'],
                    ['label' => 'Last 24 Hours', 'value' => max(0, (int)($total * 0.1)), 'increase' => '+5%'],
                    ['label' => 'Last Month', 'value' => max(0, (int)($total * 0.4)), 'increase' => '+18%'],
                    ['label' => 'Last Year', 'value' => max(0, (int)($total * 0.9)), 'increase' => '+25%'],
                ];
            @endphp
            @foreach($statsCards as $stat)
                <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm flex flex-col justify-between">
                    <h3 class="text-sm font-medium text-slate-500 mb-2">{{ $stat['label'] }}</h3>
                    <div class="flex items-end justify-between">
                        <span class="text-2xl font-bold text-slate-900">{{ $stat['value'] }}</span>
                        <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-2 py-1 rounded-md">{{ $stat['increase'] }}</span>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Table --}}
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm flex flex-col">
            <div class="p-4 border-b border-slate-100 flex items-center justify-between">
                <div class="relative w-full max-w-sm">
                    <input type="text" x-model="searchQuery" placeholder="Search {{ strtolower($config['title']) }}..."
                        class="w-full pl-9 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none" />
                    <svg class="w-4 h-4 absolute left-3 top-2.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-xs text-slate-500 border-b border-slate-100 uppercase tracking-wider bg-slate-50/50">
                            @foreach($config['columns'] as $key => $label)
                                <th class="px-5 py-3 font-semibold">{{ $label }}</th>
                            @endforeach
                            <th class="px-5 py-3 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-slate-100">
                        @foreach($config['data'] as $item)
                            <tr class="hover:bg-slate-50 transition-colors group">
                                @foreach($config['columns'] as $key => $label)
                                    <td class="px-5 py-3">
                                        @if($key === 'status')
                                            @php
                                                $isActive = in_array($item[$key], ['Active', 'Completed', 'Delivered']);
                                                $badgeClass = $isActive ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-600';
                                            @endphp
                                            <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider {{ $badgeClass }}">{{ $item[$key] }}</span>
                                        @elseif($key === 'id')
                                            <span class="font-mono text-xs text-slate-500">{{ $item[$key] }}</span>
                                        @elseif($key === 'amount' || $key === 'price')
                                            <span class="font-medium">${{ number_format($item[$key], 2) }}</span>
                                        @else
                                            <span class="font-medium text-slate-700">{{ $item[$key] }}</span>
                                        @endif
                                    </td>
                                @endforeach
                                <td class="px-5 py-3 text-right">
                                    <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button @click="showModal = true; editingItem = {{ json_encode($item) }}; formData = {{ json_encode($item) }}" class="p-1.5 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-md transition-colors" title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        </button>
                                        <button class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-md transition-colors" title="Delete">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @if(empty($config['data']))
                            <tr><td colspan="{{ count($config['columns']) + 1 }}" class="px-5 py-8 text-center text-slate-500">No {{ strtolower($config['title']) }} found.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Modal --}}
        <div x-show="showModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/50 backdrop-blur-sm" style="display: none;">
            <div @click.away="showModal = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="bg-white rounded-xl shadow-xl w-full max-w-md overflow-hidden">
                <div class="flex items-center justify-between p-4 border-b border-slate-100">
                    <h2 class="text-lg font-bold text-slate-900" x-text="editingItem ? 'Edit {{ rtrim($config['title'], 's') }}' : 'Add New {{ rtrim($config['title'], 's') }}'"></h2>
                    <button @click="showModal = false" class="text-slate-400 hover:text-slate-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <div class="p-4">
                    <form class="space-y-4">
                        @foreach($config['columns'] as $key => $label)
                            @if($key !== 'id' && $key !== 'status')
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">{{ $label }}</label>
                                    <input type="text" x-model="formData.{{ $key }}" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                                </div>
                            @endif
                        @endforeach
                        <div class="pt-4 flex justify-end gap-3 border-t border-slate-100">
                            <button type="button" @click="showModal = false" class="px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 transition-colors">Cancel</button>
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition-colors shadow-sm">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
