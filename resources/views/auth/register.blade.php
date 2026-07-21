<x-guest-layout>
    <div x-data="{ currentView: 'signup' }" class="min-h-screen w-full relative flex flex-col items-center justify-center overflow-hidden transition-colors duration-300">
        {{-- Background glow effects --}}
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-indigo-500/20 blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] rounded-full bg-purple-500/20 blur-[120px] pointer-events-none"></div>

        {{-- Main Card --}}
        <div class="w-full max-w-md p-8 sm:p-10 bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/20 dark:border-slate-800/50 z-10 mx-4">
            {{-- Logo --}}
            <div class="flex items-center justify-center mb-8">
                <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center mr-3">
                    <div class="w-5 h-5 border-2 border-white rounded-sm"></div>
                </div>
                <span class="font-bold text-2xl tracking-tight text-slate-900 dark:text-white">Nexus Retail</span>
            </div>

            <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">Create an account</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mb-8">Enter your details to get started.</p>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                        class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all text-slate-900 dark:text-white placeholder-slate-400" placeholder="John Doe" />
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                        class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all text-slate-900 dark:text-white placeholder-slate-400" placeholder="name@example.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all text-slate-900 dark:text-white placeholder-slate-400" placeholder="Create a password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                        class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all text-slate-900 dark:text-white placeholder-slate-400" placeholder="Confirm your password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                </div>

                <button type="submit" class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl transition-all shadow-md hover:shadow-lg focus:ring-4 focus:ring-indigo-100">
                    Create Account
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-slate-500 dark:text-slate-400">
                Already have an account?
                <a href="{{ route('login') }}" class="font-semibold text-indigo-600 hover:text-indigo-500 transition-colors">Sign in</a>
            </p>
        </div>

        <div class="absolute bottom-6 text-sm text-slate-500 dark:text-slate-400 z-10">
            &copy; {{ date('Y') }} Nexus Retail. All rights reserved.
        </div>
    </div>
</x-guest-layout>
