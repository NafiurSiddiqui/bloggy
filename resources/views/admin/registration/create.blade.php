<section>
    <x-guest-layout>
        <form method="POST" action="{{ route('admin.register.store') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            {{-- Role applying for. Add more as needed --}}
            <x-form.field>
                <x-input-label for="role" :value="__('Role')" class="mb-2" />

                {{-- <x-form.radio id="editor" input-name="editor" label="editor" /> --}}
                <x-form.radio id="author" input-name="author" label="author" />
            </x-form.field>

            <div class="flex items-center justify-between mt-8">
                <x-text-link href="{{ route('login') }}">
                    Sign In
                </x-text-link>
                <x-form.sci-fi-btn submit label="Register" />
            </div>
        </form>
    </x-guest-layout>

</section>
