<x-storefront-layout pageTitle="Order Success - Nexus Retail">
    <div class="flex-1 bg-white flex items-center justify-center py-20">
        <div class="max-w-md mx-auto text-center px-4">
            <div class="w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            </div>
            <h1 class="text-3xl font-bold text-slate-900 mb-4">Order Confirmed!</h1>
            <p class="text-slate-500 mb-2">Thank you for your purchase. Your order has been placed successfully.</p>
            <p class="text-sm text-slate-400 mb-8">Order #ORD-{{ rand(1000, 9999) }} &middot; Confirmation email sent to your inbox.</p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="{{ route('customer.orders') }}" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl transition-colors shadow-sm">
                    View My Orders
                </a>
                <a href="{{ route('shop') }}" class="px-6 py-3 border border-slate-200 text-slate-700 font-semibold rounded-xl hover:bg-slate-50 transition-colors">
                    Continue Shopping
                </a>
            </div>
        </div>
    </div>
</x-storefront-layout>
