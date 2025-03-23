<x-app-layout>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/darkmode-dashboard.css') }}">
    <style>
        .section-title {
            text-align: center;
            font-size: 2.5rem;
            color: #100E39;
            margin-bottom: 40px;
            animation: fadeIn 1.5s ease-in-out;
        }

        .newsletter-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            animation: fadeInUp 1.5s ease-in-out;
        }

        .card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 20px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            font-size: 1.5rem;
            color: #100E39;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .card a {
            display: inline-block;
            padding: 12px 20px;
            color: #ffffff;
            background-color: #FF5B00;
            border-radius: 25px;
            text-decoration: none;
            font-size: 1rem;
            transition: all 0.3s ease-in-out;
        }

        .card a:hover {
            background-color: #cc4800;
            transform: translateY(-5px);
        }

        @media (max-width: 768px) {
            .newsletter-grid {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>

    <div class="dashboard-page">
    <button id="dark-mode-toggle">🌙</button>
        <div class="dashboard-box">
            <p class="dashboard-heading">
                {{ __("Newsletters") }}
            </p>

            <div class="container-newsletter">

                <div class="newsletter-grid">
                    @if($newsletters->count() > 0)
                        @foreach($newsletters as $newsletter)
                            <div class="card">
                                <div class="card-title">{{ $newsletter->title }}</div>
                                <a href="{{ asset('newsletters/' . $newsletter->filename) }}" target="_blank">View Newsletter</a>
                            </div>
                        @endforeach
                    @else
                        <p style="text-align: center;">No newsletters found.</p>
                    @endif
                </div>
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