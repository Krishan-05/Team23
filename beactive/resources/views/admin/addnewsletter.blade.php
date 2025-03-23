<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/user-permissions.css') }}">
    <div class="dashboard-page">
    <button id="dark-mode-toggle">🌙</button>
        <div class="dashboard-box">
            <p class="dashboard-heading">
                {{ __("Add Newsletter") }}
            </p>
            <div class="form-container">
                @if(session('status'))
                    <div class="message">
                        <p style="color:green;">{{ session('status') }}</p>
                    </div>
                @endif

                @if($errors->any())
                    <div class="message">
                        @foreach($errors->all() as $error)
                            <p style="color:red;">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('newsletter.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="title">Newsletter Title</label>
                    <input type="text" id="title" name="title" required>

                    <label for="file">Upload PDF</label>
                    <input type="file" id="file" name="file" accept="application/pdf" required>

                    <button type="submit" class="orange-button">Add Newsletter</button>
                </form>
            </div>
        </div>
    </div>
    <style>

        .form-container {
            align-self:center;
            align-content:center;
            justify-content:center;
            align-items:center;
            background: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            color: #100E39;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        button {
            padding: 12px;
            background-color: #FF5B00;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #cc4800;
        }

        .message {
            text-align: center;
            margin-bottom: 15px;
        }

        .orange-button{
            background-color: #cc4800 !important;
        }

        html[data-theme='dark'] .form-container{
            background-color: #444;
         }

         html[data-theme='dark'] .form-container label{
            color: white;
         }
    </style>

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