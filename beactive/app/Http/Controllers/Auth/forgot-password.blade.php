<x-guest-layout>
    <div class="container">
        <!-- Left Section: Image -->
        <div class="image-container">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/Team23 Logo No background.png') }}" 
                     alt="beActive" 
                     style="width: 300px; height: auto;" 
                     class="img">
            </a>
        </div>

        <!-- Right Section: Forgot Password Form -->
        <div class="login-container">
            <h2>Forgot Password?</h2>
            <p class="text-gray-600">No problem. Just enter your email address, and we’ll let you reset your password.</p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ url('/forgot-password') }}">
                @csrf

                <!-- Email Address -->
                <div class="email-container">
                    <x-input-label for="email" :value="('Email')" class="login-email" />
                    <x-text-input id="email" 
                                  type="email" 
                                  name="email" 
                                  :value="old('email')" 
                                  required 
                                  autofocus 
                                  class="inputbox" />
                </div>

                <!-- Error Messages -->
                <div class="error-messages">
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <!-- Submit Button -->
                <div class="login-button-container">
                    <x-primary-button class="login-button">
                        {{ __('Submit') }}
                    </x-primary-button>
                </div>

                <!-- Back to Login -->
                <p class="text-center mt-4">
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
                        Back to Login
                    </a>
                </p>

            </form>
        </div>
    </div>
</x-guest-layout>