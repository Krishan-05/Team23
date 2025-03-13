<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
<x-guest-layout>
    <div class="register-container">
        <form method="POST" action="{{ route('register') }}" class="centreform">
            @csrf
            <h1> Signup </h1>

            <!-- Name -->
            <div class="register-name">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <!-- Email Address -->
            <div class="register-email">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <!-- Password -->
            <div class="register-password">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="register-password-confirm">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <!-- Error Messages -->
            <div class="error-messages">
            <x-input-error :messages="$errors->get('name')" />
            <br>
            <x-input-error :messages="$errors->get('email')" />
            <x-input-error :messages="$errors->get('password')" />
            <br>
            <x-input-error :messages="$errors->get('password_confirmation')" />
            </div>

            <div class="register-button-container">
                <a class="alreadyregistered-button" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="register-button">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
