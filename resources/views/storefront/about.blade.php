<x-storefront-layout pageTitle="About Us - Nexus Retail">
    <div class="flex-1 bg-white">
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto text-center mb-16">
                    <h1 class="text-4xl font-bold text-slate-900 tracking-tight mb-4">About Nexus Retail</h1>
                    <p class="text-lg text-slate-500 leading-relaxed">
                        We're on a mission to transform the modern workspace with premium technology and ergonomic solutions.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-20">
                    <div>
                        <h2 class="text-3xl font-bold text-slate-900 mb-4">Our Story</h2>
                        <p class="text-slate-600 leading-relaxed mb-4">
                            Founded in 2024, Nexus Retail started with a simple idea: everyone deserves a workspace that inspires productivity and creativity. We curate the finest tech accessories and ergonomic furniture from leading brands around the world.
                        </p>
                        <p class="text-slate-600 leading-relaxed">
                            From noise-canceling headphones that help you focus, to ergonomic chairs that keep you comfortable through long work sessions, every product in our collection is chosen with care.
                        </p>
                    </div>
                    <div class="rounded-2xl overflow-hidden aspect-[4/3] bg-slate-100">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80" alt="Team" class="w-full h-full object-cover" />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @php
                        $values = [
                            ['title' => 'Quality First', 'desc' => 'Every product is vetted for quality, durability, and design excellence.', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>'],
                            ['title' => 'Customer Focused', 'desc' => 'Your satisfaction drives every decision we make.', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>'],
                            ['title' => 'Global Reach', 'desc' => 'Shipping to over 50 countries with local warehouses worldwide.', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>'],
                        ];
                    @endphp
                    @foreach($values as $value)
                        <div class="text-center p-8 rounded-2xl bg-slate-50 border border-slate-100">
                            <div class="w-14 h-14 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-600 mx-auto mb-4">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $value['icon'] !!}</svg>
                            </div>
                            <h3 class="font-bold text-slate-900 mb-2">{{ $value['title'] }}</h3>
                            <p class="text-sm text-slate-500">{{ $value['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</x-storefront-layout>
