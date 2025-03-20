<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
<x-guest-layout>
    <button id="dark-mode-toggle">🌙</button>
    <div class="container">
        <div class="image-container">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/Team23 Logo No background.png') }}" alt="beActive" style="width: 300px; height: auto;" class="img">
            </a>
        </div>
        <div class="login-container">
            <h2>Welcome</h2>
            <x-auth-session-status :status="session('status')" />
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="email-container">
                    <x-input-label for="email" :value="__('Email')" class="login-email" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="inputbox" />
                </div>
                <div class="password-container">
                    <x-input-label for="password" :value="__('Password')" class="login-password" />
                    <x-text-input id="password" type="password" name="password" required autocomplete="current-password" class="inputbox" />
                </div>
                <div class="error-messages">
                    <div class="error-message">
                        <x-input-error :messages="$errors->get('email')" />
                    </div>
                    <div class="error-message">
                        <x-input-error :messages="$errors->get('password')" />
                    </div>
                </div>
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
