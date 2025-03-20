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
    html[data-theme='dark'] .editpage-container {
      background-color: #181818;
      padding: 20px;
    }
    html[data-theme='dark'] .profile-update,
    html[data-theme='dark'] .profile-password {
      background-color: #222;
      color: #fff;
      border: 1px solid #333;
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 5px;
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
    html[data-theme='dark'] input,
    html[data-theme='dark'] textarea,
    html[data-theme='dark'] select {
      background-color: #333;
      color: #fff;
      border: 1px solid #444;
      padding: 8px;
      border-radius: 4px;
      box-shadow: inset 1px 1px 3px rgba(0, 0, 0, 0.5);
    }
    html[data-theme='dark'] input::placeholder,
    html[data-theme='dark'] textarea::placeholder {
      color: #aaa;
    }
    html[data-theme='dark'] button[type="submit"],
    html[data-theme='dark'] input[type="submit"] {
      background-color: #000;
      color: #fff;
      border: 1px solid #444;
      padding: 8px 15px;
      border-radius: 4px;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    html[data-theme='dark'] button[type="submit"]:hover,
    html[data-theme='dark'] input[type="submit"]:hover {
      background-color: #333;
    }
  </style>

  <button id="dark-mode-toggle">🌙</button>

  <div class="editpage-container">
    <div class="profile-update">
      @include('profile.partials.update-profile-information-form')
    </div>
    <div class="profile-password">
      @include('profile.partials.update-password-form')
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
