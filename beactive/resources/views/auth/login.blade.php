<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
<x-guest-layout>
    <div class="container">
        <!-- Left Section: Image -->
        <div class="image-container">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/Team23 Logo No background.png') }}" alt="beActive" style="width: 300px; height: auto;" class="img">
            </a>

        </div>

        <!-- Right Section: Login Form -->
        <div class="login-container">
            <h2> Welcome </h2>
            <!-- Session Status -->
            <x-auth-session-status :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div  class = "email-container">
                    <x-input-label for="email" :value="__('Email')" class="login-email" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="inputbox" />
                </div>

                <!-- Password -->
                <div class = "password-container">
                    <x-input-label for="password" :value="__('Password')" class="login-password" />
                    <x-text-input id="password" type="password" name="password" required autocomplete="current-password" class="inputbox" />
                </div>

                <!-- Error Messages -->
                <div class="error-messages">
                    <!-- Email Error Message -->
                    <div class="error-message">
                        <x-input-error :messages="$errors->get('email')" />
                    </div>

                    <!-- Password Error Message -->
                    <div class="error-message">
                        <x-input-error :messages="$errors->get('password')" />
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="login-button-container">
                    <x-primary-button class="login-button">
                        {{ __('Log in') }}
                    </x-primary-button>
                    <a href="{{ route('register') }}" class="register-button">
                        {{ __('Register') }}
                    </a>
                </div>

            </form>
        </div>
    </div>
</x-guest-layout>
