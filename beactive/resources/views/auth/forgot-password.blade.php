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
    <div class="container">
        <div class="image-container">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/Team23 Logo No background.png') }}" 
                     alt="beActive" 
                     style="width: 300px; height: auto;" 
                     class="img">
            </a>
            <button id="dark-mode-toggle">🌙</button>
        </div>

        <div class="login-container">
            <h2>Forgot Password?</h2>
            <p class="text-gray-600">Enter your email address, and we’ll let you reset your password.<br><br></p>

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
                <p class="login-button-container">
                    <a href="{{ route('login') }}" class="forgotpassword-button">
                        Back to Login
                    </a>
                </p>

            </form>
        </div>
    </div>
</x-guest-layout>
