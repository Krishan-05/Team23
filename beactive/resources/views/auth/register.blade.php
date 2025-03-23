<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
<script>
document.addEventListener('DOMContentLoaded', function() {
        const darkModeToggle = document.getElementById('dark-mode-toggle');
        const storedTheme = localStorage.getItem('theme');
        if (storedTheme === 'dark') {
            document.documentElement.setAttribute('data-theme', 'dark');
            darkModeToggle.textContent = '☀️';
        } else {
            document.documentElement.removeAttribute('data-theme');
            darkModeToggle.textContent = '🌙';
        }
        darkModeToggle.addEventListener('click', () => {
            const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
            if (isDark) {
            document.documentElement.removeAttribute('data-theme');
            darkModeToggle.textContent = '🌙';
            localStorage.setItem('theme', 'light');
            } else {
            document.documentElement.setAttribute('data-theme', 'dark');
            darkModeToggle.textContent = '☀️';
            localStorage.setItem('theme', 'dark');
            }
        });
        });
</script>
<x-guest-layout>
    <div class="register-container">
        <form method="POST" action="{{ route('register') }}" class="centreform">
            @csrf
            <h1 class = signup-header> Signup 
            <button id="dark-mode-toggle">🌙</button>
            </h1>

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
