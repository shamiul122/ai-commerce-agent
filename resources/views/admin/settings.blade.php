<x-admin-layout pageTitle="Settings">
    <div class="max-w-4xl space-y-6">
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-6 border-b border-slate-200">
                <h2 class="text-xl font-bold text-slate-900">Storefront Appearance</h2>
                <p class="text-sm text-slate-500 mt-1">Manage which sections are visible on the home page.</p>
            </div>
            <div class="p-6 space-y-6" x-data="{
                showHero: true,
                showCategories: true,
                showFeatured: true,
                showBrands: true,
                showWarehouses: true
            }">
                @php
                    $sections = [
                        ['key' => 'showHero', 'name' => 'Hero Section', 'desc' => 'The main banner at the top of the home page.'],
                        ['key' => 'showCategories', 'name' => 'Categories Grid', 'desc' => 'Display product categories on the home page.'],
                        ['key' => 'showFeatured', 'name' => 'Featured Products', 'desc' => 'Showcase featured products section.'],
                        ['key' => 'showBrands', 'name' => 'Brands Grid', 'desc' => 'Display brand logos grid on the home page.'],
                        ['key' => 'showWarehouses', 'name' => 'Warehouses Section', 'desc' => 'Show warehouse locations on the home page.'],
                    ];
                @endphp

                @foreach($sections as $section)
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-medium text-slate-900">{{ $section['name'] }}</h3>
                            <p class="text-sm text-slate-500">{{ $section['desc'] }}</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" x-model="{{ $section['key'] }}">
                            <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Profile Section --}}
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-6 border-b border-slate-200">
                <h2 class="text-xl font-bold text-slate-900">Profile Settings</h2>
                <p class="text-sm text-slate-500 mt-1">Update your personal information.</p>
            </div>
            <div class="p-6">
                <form class="space-y-4 max-w-md">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Name</label>
                        <input type="text" value="{{ Auth::user()->name }}" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                        <input type="email" value="{{ Auth::user()->email }}" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Role</label>
                        <input type="text" value="{{ Auth::user()->getRoleNames()->first() ?? 'N/A' }}" disabled class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm bg-slate-50 text-slate-500" />
                    </div>
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg text-sm transition-colors shadow-sm">
                        Save Changes
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
