<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/user-permissions.css') }}">
    <link rel="stylesheet" href="{{ asset('css/darkmode-dashboard.css') }}">
    @if(session('success'))
    <div id="customAlert" class="custom-alert">
        <div class="custom-alert-content">
            <p id="alertMessage">{{ session('success') }}</p>
            <button id="alertOkButton">OK</button>
        </div>
    </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            {{ implode('', $errors->all(':message')) }}
        </div>
    @endif

    <div class="dashboard-page">
    <button id="dark-mode-toggle">🌙</button>
        <div class="dashboard-box">
            <p class="dashboard-heading">
                {{ __("Stock Management For Product: " . $product->name) }}
            </p>
            <div class="request-stock-form">
                <p>Would you like to request stock from the supplier for <strong>{{ $product->name }}</strong>?</p>
                <form action="{{ route('admin.handleStockRequest', $product->id) }}" method="POST">
                    @csrf
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" required min="1">
                    <button type="submit" class="request-btn">Request Stock</button>
                </form>
            </div>
            <div class="request-stock-form">
                    <p>Do you have damaged stock for <strong>{{ $product->name }}</strong> that needs to be reversed?</p>
                    <form action="{{ route('admin.handleReverseStockRequest', $product->id) }}" method="POST">
                        @csrf
                        <label for="reverse_quantity">Quantity:</label>
                        <input type="number" name="reverse_quantity" id="reverse_quantity" required min="1">
                        <button type="submit" class="reverse-btn">Reverse Stock</button>
                    </form>
                </div>
             </div>
        </div>
    </div>


    </div>


    <style>
        .request-stock-form {
            display:flex;   
            justify-content:center;
            flex-direction:column;
            align-self:center;  
            align-items:center;
            border: 2px solid black; 
            background-color: lightgrey;
            padding: 20px;
            border-radius: 10px; 
            box-shadow: 0 2px 3px lightgrey; 
            text-align: center;
            margin-bottom:40px;
        }

        .request-btn {
            background-color: #4CAF50 !important;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 6px;
        }

        .reverse-btn {
            background-color: red!important;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 6px;
        }

        .request-btn:hover {
            background-color: #45a049;
        }

        input[type="number"] {
            width: 100px;
            padding: 5px;
            border: 2px solid #ccc;
            border-radius: 6px;
            margin-right: 10px;
        }

        .custom-alert {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); 
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

        html[data-theme='dark'] .request-stock-form{
            background-color: #444;
         }

         html[data-theme='dark'] .form-container label{
            color: white;
         }
    </style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const customAlert = document.getElementById('customAlert');
        const alertOkButton = document.getElementById('alertOkButton');

        if (customAlert && alertOkButton) {
            alertOkButton.addEventListener('click', function () {
                customAlert.classList.add('hidden'); 
            });
        }
    });
    
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