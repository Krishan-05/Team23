<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">

<x-guest-layout>
    <!-- Dark Mode Toggle Button -->
    <button id="dark-mode-toggle">🌙</button>

    <div class="container">
        <!-- Left Section: Image -->
        <div class="image-container">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/Team23 Logo No background.png') }}" alt="beActive" style="width: 300px; height: auto;" class="img">
            </a>
        </div>

        <!-- Right Section: Register Form -->
        <div class="login-container">
            <h2> Sign Up </h2>

            <!-- Registration Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="register-name">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="inputbox" />
                </div>

                <!-- Email Address -->
                <div class="register-email">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" class="inputbox" />
                </div>

                <!-- Password -->
                <div class="register-password">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" type="password" name="password" required autocomplete="new-password" class="inputbox" />
                </div>

                <!-- Confirm Password -->
                <div class="register-password-confirm">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="inputbox" />
                </div>

                <!-- Error Messages -->
                <div class="error-messages">
                    <!-- Name Error -->
                    <div class="error-message">
                        <x-input-error :messages="$errors->get('name')" />
                    </div>
                    <!-- Email Error -->
                    <div class="error-message">
                        <x-input-error :messages="$errors->get('email')" />
                    </div>
                    <!-- Password Error -->
                    <div class="error-message">
                        <x-input-error :messages="$errors->get('password')" />
                    </div>
                    <!-- Password Confirmation Error -->
                    <div class="error-message">
                        <x-input-error :messages="$errors->get('password_confirmation')" />
                    </div>
                </div>

                <!-- Submit Button & Already Registered Link -->
                <div class="login-button-container">
                    <x-primary-button class="login-button">
                        {{ __('Register') }}
                    </x-primary-button>
                    <a href="{{ route('login') }}" class="register-button">
                        {{ __('Already registered?') }}
                    </a>
                </div>

            </form>
        </div>
    </div>
</x-guest-layout>

<!-- Dark Mode Toggle Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const darkModeToggle = document.getElementById('dark-mode-toggle');

        
        const storedTheme = localStorage.getItem('theme');

        if (storedTheme === 'dark') {
            
            document.documentElement.setAttribute('data-theme', 'dark');
            darkModeToggle.textContent = '☀️'; // Updates toggle icon
        } else {
           
            document.documentElement.removeAttribute('data-theme');
            darkModeToggle.textContent = '🌙'; // Updates toggle icon
        }

        
        darkModeToggle.addEventListener('click', () => {
            const isDark = document.documentElement.getAttribute('data-theme') === 'dark';

            if (isDark) {
                // Switch to light mode
                document.documentElement.removeAttribute('data-theme');
                darkModeToggle.textContent = '🌙';
                localStorage.setItem('theme', 'light');
            } else {
                // Switch to dark mode
                document.documentElement.setAttribute('data-theme', 'dark');
                darkModeToggle.textContent = '☀️';
                localStorage.setItem('theme', 'dark'); 
            }
        });
    });
</script>