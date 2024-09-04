<x-guest-layout>
    <x-toast.status />
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class=" dark:bg-darkNavFooter border-zinc-300 dark:border-zinc-700 text-emerald-600 shadow-sm focus:ring-emerald-500 dark:focus:ring-emerald-600 dark:focus:ring-offset-zinc-800 cursor-pointer"
                    name="remember">
                <span class="ms-2 text-sm text-zinc-600 dark:text-zinc-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <x-text-link href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </x-text-link>
            @endif
            <x-form.sci-fi-btn submit />
        </div>
    </form>
    <div class="py-4 mt-4 text-right">
        <x-text-link href="{{ route('register') }}">
            Create an Account
        </x-text-link>
    </div>
</x-guest-layout>
