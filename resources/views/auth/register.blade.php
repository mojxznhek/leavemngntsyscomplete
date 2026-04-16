<x-layout-component>
    <div class="w-full flex items-center justify-center p-8">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <!-- Form Container -->
                <!-- Logo -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-red-100 rounded-full mb-4">
                        <i x-show="isLogin" class="fas fa-sign-in-alt text-red-600 fa-lg"></i>
                        <i x-show="!isLogin" class="fas fa-user-plus text-red-600 fa-lg"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">
                        <span x-text="isLogin ? 'Welcome Back!' : 'Create Account'"></span>
                    </h2>
                    <p class="text-gray-600 mt-2">
                        <span x-text="isLogin ? 'Please sign in to continue' : 'Get started with your account'"></span>
                    </p>
                </div>
                <!-- Form -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autocomplete="username" />
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

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-primary-button class="ms-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-component>
