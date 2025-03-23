
<x-app-layout>
<div id="customAlert" class="custom-alert hidden">
    <div class="custom-alert-content">
        <p id="alertMessage"></p>
    </div>
</div>

<style>
.dashboard-buttons a {
    flex: 1 1 40%; 
    max-width: 50%;
}

.profile-edit{
    height: 40%;
}

.custom-alert {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.3);
    justify-content: center; 
    align-items: center; 
    z-index: 1000; 
    display: flex; 
}

.custom-alert.hidden {
    display: none; 
}

.custom-alert-content {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    text-align: center;
    max-width: 300px;
}

.custom-alert-content p {
    margin: 0 0 20px 0;
    font-size: 16px;
    color: #333;
}

.custom-alert-content button {
    padding: 10px 20px;
    background-color: #FF5B00;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.custom-alert-content button:hover {
    background-color: #cc4800;
}

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

html[data-theme='dark'] .custom-alert-content{
            background-color: #2a2a2a;
}

html[data-theme='dark'] .custom-alert-content p, 
html[data-theme='dark'] .custom-alert-content div {
    color: white !important;
    }

</style>
    <div class="dashboard-page">
    <button id="dark-mode-toggle">🌙</button>
        <div class="dashboard-box">
            <p class="dashboard-heading">
                {{ __("User Dashboard") }} - User ID: {{ auth()->user()->id }}
            </p>

            <div class="dashboard-buttons">
                <a href="{{ route('profile.edit') }}" class="profile-edit">
                    {{ __('Edit Account Details') }}
                </a>

                
                @if(auth()->user()->newsletter === 'yes')
                    <a href="{{ route('newsletter') }}" class="profile-edit">
                        {{ __('View Newsletters') }}
                    </a>
                @endif

                <a href="{{ route('user.orders') }}"  class="profile-edit">View Orders</a>

                <a href="{{ route('request.return') }}" class="profile-edit">Request a Return</a>
                


                @if (session('success'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const customAlert = document.getElementById('customAlert');
                            const alertMessage = document.getElementById('alertMessage');

                            if (customAlert && alertMessage) {
                                alertMessage.textContent = "{{ session('success') }}\n\nYou will be redirected to the Home Page in 5 seconds.";
                                customAlert.classList.remove('hidden');
                                setTimeout(function () {
                                    window.location.href = "/";
                                }, 5000);
                            }
                        });
                    </script>   
                @endif
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
