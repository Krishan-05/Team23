<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/user-permissions.css') }}">
    <div class="dashboard-page">
    <button id="dark-mode-toggle">🌙</button>
        <div class="dashboard-box">
            <p class="dashboard-heading">
                {{ __("User Permissions Management") }}
            </p>
            <div class="table-container">
                <table class="table-class">
                    <thead class="table-heading">
                        <tr class="table-row">
                            <th class="email-column">Email (ALL USERS)</th>
                            <th>User Access</th>
                        </tr>
                    </thead>
                    <tbody class="table-body">
                        @foreach ($users as $user)
                        <tr class="category-row">
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ route('update-user-access', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="useraccess">
                                        <option value="admin" {{ $user->useraccess === 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="user" {{ $user->useraccess === 'user' ? 'selected' : '' }}>User</option>
                                    </select>
                                    <button type="submit" class="update">Update</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
</script>s
</x-app-layout>