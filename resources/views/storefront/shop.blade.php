<x-storefront-layout pageTitle="Shop - Nexus Retail">
    <div class="flex-1 bg-slate-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row gap-8">
                {{-- Sidebar Filters --}}
                <div class="w-full md:w-64 flex-shrink-0 space-y-8">
                    <div>
                        <h3 class="font-bold text-slate-900 mb-4">Categories</h3>
                        <ul class="space-y-3">
                            @php $categories = [['name' => 'Electronics', 'count' => 124], ['name' => 'Furniture', 'count' => 56], ['name' => 'Accessories', 'count' => 89]]; @endphp
                            @foreach($categories as $cat)
                                <li>
                                    <label class="flex items-center gap-3 cursor-pointer group">
                                        <div class="w-5 h-5 border border-slate-300 rounded flex items-center justify-center group-hover:border-indigo-500 transition-colors"></div>
                                        <span class="text-sm text-slate-600 group-hover:text-slate-900">{{ $cat['name'] }} <span class="text-slate-400">({{ $cat['count'] }})</span></span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="pt-6 border-t border-slate-200">
                        <h3 class="font-bold text-slate-900 mb-4">Brands</h3>
                        <ul class="space-y-3">
                            @php $brands = ['Apple', 'Sony', 'Logitech', 'Herman Miller', 'Keychron', 'Bose']; @endphp
                            @foreach($brands as $brand)
                                <li>
                                    <label class="flex items-center gap-3 cursor-pointer group">
                                        <div class="w-5 h-5 border border-slate-300 rounded flex items-center justify-center group-hover:border-indigo-500 transition-colors"></div>
                                        <span class="text-sm text-slate-600 group-hover:text-slate-900">{{ $brand }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="pt-6 border-t border-slate-200">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-bold text-slate-900">Price Range</h3>
                            <span class="text-xs font-medium text-indigo-600">$0 - $1000</span>
                        </div>
                        <input type="range" min="0" max="1000" value="1000" class="w-full accent-indigo-600" />
                        <div class="flex items-center gap-2 mt-4">
                            <input type="text" placeholder="Min" value="0" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white" />
                            <span class="text-slate-400">-</span>
                            <input type="text" placeholder="Max" value="1000" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-white" />
                        </div>
                    </div>
                </div>

                {{-- Product Grid --}}
                <div class="flex-1">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-6 bg-white p-4 rounded-xl border border-slate-200 shadow-sm">
                        <h1 class="text-xl font-bold text-slate-900">All Products <span class="text-slate-400 text-sm font-normal ml-2">4 results</span></h1>
                        <div class="flex items-center gap-6 text-sm text-slate-500">
                            <div class="flex items-center gap-2">
                                <span>Sort by:</span>
                                <select class="bg-transparent border-none font-medium text-slate-900 focus:ring-0 cursor-pointer p-0">
                                    <option>Featured</option>
                                    <option>Price: Low to High</option>
                                    <option>Price: High to Low</option>
                                    <option>Newest</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    @php
                        $products = [
                            ['name' => 'Wireless Noise-Canceling Headphones', 'price' => 299.99, 'brand' => 'AudioTech', 'category' => 'Electronics', 'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=400&q=80'],
                            ['name' => 'Minimalist Mechanical Keyboard', 'price' => 149.50, 'brand' => 'KeyCraft', 'category' => 'Accessories', 'image' => 'https://images.unsplash.com/photo-1595225476474-87563907a212?auto=format&fit=crop&w=400&q=80'],
                            ['name' => 'Ergonomic Office Chair', 'price' => 399.00, 'brand' => 'ErgoFit', 'category' => 'Furniture', 'image' => 'https://images.unsplash.com/photo-1505843490538-5133c6c7d0e1?auto=format&fit=crop&w=400&q=80'],
                            ['name' => '4K Ultra-Wide Monitor', 'price' => 699.99, 'brand' => 'VisionPro', 'category' => 'Electronics', 'image' => 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?auto=format&fit=crop&w=400&q=80'],
                        ];
                    @endphp

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($products as $product)
                            <div class="bg-white rounded-xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-xl hover:border-indigo-200 transition-all duration-300 cursor-pointer group flex flex-col">
                                <div class="aspect-[4/3] bg-slate-100 overflow-hidden relative flex-shrink-0">
                                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                                </div>
                                <div class="p-5 flex-1 flex flex-col">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-xs font-semibold text-indigo-600 mb-1 uppercase tracking-wider">{{ $product['brand'] }}</p>
                                            <h3 class="font-bold text-slate-900 text-base mb-2 line-clamp-1">{{ $product['name'] }}</h3>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between mt-auto pt-4">
                                        <span class="text-lg font-bold text-slate-900">${{ number_format($product['price'], 2) }}</span>
                                        <div class="flex items-center gap-1">
                                            <svg class="w-3.5 h-3.5 fill-amber-400 text-amber-400" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                            <span class="text-xs font-medium text-slate-600">4.8</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-storefront-layout>
