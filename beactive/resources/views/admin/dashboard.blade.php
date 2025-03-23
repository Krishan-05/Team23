        
<x-app-layout>
<style>
html[data-theme='dark'] .navbar {
        background-color: #000 !important;
        color: #fff !important;
}
html[data-theme='dark'] .navbar a {
        color: #fff !important;
}
html[data-theme='dark'] body {
        background-color: #181818;
        color: #ffffff;
}
html[data-theme='dark'] .dashboard-page {
        background-color: #181818;
}
html[data-theme='dark'] .dashboard-box {
        background-color: #222;
        color: #fff;
        border-color: #333;
}
html[data-theme='dark'] .dashboard-heading {
        color: #fff;
}
html[data-theme='dark'] .profile-edit {
        background-color: #333;
        color: #fff;
}
#dark-mode-toggle {
        position: absolute;
        top: 50px;
        left: 50%;
        transform: translateX(-50%);
        background: none;
        border: none;
        font-size: 24px;
        cursor: pointer;
        z-index: 1000;
}
html[data-theme='dark'] .user-dropdown,
html[data-theme='dark'] .dropdown-menu {
        background-color: #222 !important;
        color: #fff !important;
        border: 1px solid #333 !important;
}
html[data-theme='dark'] .user-dropdown a,
html[data-theme='dark'] .dropdown-menu a {
        color: #fff !important;
}
html[data-theme='dark'] .user-dropdown a:hover,
html[data-theme='dark'] .dropdown-menu a:hover {
        background-color: #333 !important;
        color: #fff !important;
}
html[data-theme='dark'] .user-dropdown button,
html[data-theme='dark'] .dropdown-menu button {
        color: #fff !important;
        background-color: transparent !important;
        border: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
}
html[data-theme='dark'] .user-dropdown button:hover,
html[data-theme='dark'] .dropdown-menu button:hover {
        background-color: #333 !important;
        color: #fff !important;
}
</style>

    <div class="dashboard-page">
    <button id="dark-mode-toggle">🌙</button>
        <div class="dashboard-box">
                <p class="dashboard-heading">
                {{ __("Admin View") }} - User ID: {{ auth()->user()->id }}
                </p>
                
                <div class="dashboard-buttons">
                <a href="{{ route('profile.edit') }}" class="profile-edit">
                        {{ __('Edit Account Details') }}
                </a>
                <a href="{{ route('admin.user-permissions') }}" class="profile-edit">
                        {{ __('User Permissions') }}
                </a>

                <a href="{{ route('admin.stockview') }}" 
                        class="profile-edit" 
                        style="background-color: {{ $lowStockCount > 0 ? 'red' : 'green' }};">
                        Stock View      
                </a>

                <a href="{{ route('admin.orderview') }}" class="profile-edit">
                        {{ __('View All orders') }}
                </a>
                <a href="{{ route('admin.analytics') }}" class="profile-edit">
                        {{ __('View Business Analytics') }}
                </a>
                <a href="{{ route('newsletter') }}" class="profile-edit">
                        {{ __('View Newsletters') }}
                </a>
                <a href="{{ route('admin.add-newsletter') }}" class="profile-edit">
                        {{ __('Add Newsletters') }}
                </a>



                
                </div>
            </div>
    </div>
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
</x-app-layout>