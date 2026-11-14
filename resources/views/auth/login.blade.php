<x-guest-layout>
    <x-auth-session-status
        class="mb-4"
        :status="session('status')"
    />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label
                for="email"
                value="Email Address"
            />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="email"
                placeholder="name@example.com"
            />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />
        </div>

        <div class="mt-4">
            <x-input-label
                for="password"
                value="Password"
            />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="Enter your password"
            />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />
        </div>

        <div class="block mt-4">
            <label
                for="remember_me"
                class="inline-flex items-center"
            >
                <input
                    id="remember_me"
                    name="remember"
                    type="checkbox"
                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                >

                <span class="ms-2 text-sm text-gray-600">
                    Remember me
                </span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a
                    class="text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    href="{{ route('password.request') }}"
                >
                    Forgot your password?
                </a>
            @endif

            <x-primary-button class="ms-3">
                Log In
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>