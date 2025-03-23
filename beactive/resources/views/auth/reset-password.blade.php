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
        <!-- Left Section: Image -->
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
        <h2>Reset Password</h2>
        <p class="text-gray-600">Enter your new password below.</p>

        <form method="POST" action="{{ url('/reset-password/' . $email) }}">
            @csrf

            <!-- New Password -->
            <div class="password-container">
                <x-input-label for="password" :value="('New Password')" class="login-password" />
                <x-text-input id="password" type="password" name="password" required class="inputbox" />
            </div>

            <!-- Confirm New Password -->
            <div class="password-container">
                <x-input-label for="password_confirmation" :value="('Confirm Password')" class="login-password" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required class="inputbox" />
            </div>

            <!-- Error Messages -->
            <div class="error-messages">
                <x-input-error :messages="$errors->get('password')" />
                <x-input-error :messages="$errors->get('password_confirmation')" />
            </div>

            <!-- Submit Button -->
            <div class="login-button-container">
                <x-primary-button class="login-button">
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
</x-guest-layout>