<x-app-layout>
<link rel="stylesheet" href="{{ asset('css/user-permissions.css') }}">
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
                {{ __("Stock View") }}
            </p>
            <div class="table-wrapper">
                <table class="table-class">
                    <thead class="table-heading">
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price ($)</th>
                            <th>Stock</th>
                            <th>Original Stock</th>
                            <th>Rating</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody class="table-body">
                    @foreach ($products->skip(5) as $product)
                        <tr style="background-color: {{ $product->stock <= ($product->original_stock * 0.25) ? 'red' : 'white' }};">
                            <td><a href="{{ route('admin.requestStock', $product->id) }}">{{ $product->id }}</a></td>
                            <td>{{ $product->name ?? 'Unnamed Product' }}</td>
                            <td>
                                <form action="{{ route('admin.updatePrice', $product->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="price" value="{{ $product->price }}" step="0.01" required>
                            </td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->original_stock ?? 'N/A' }}</td> 
                            <td>{{ $product->rating ?? 'N/A' }}</td> 
                            <td>
                                <button type="submit" class="update-btn">Update</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .update-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
        }
        
        .update-btn:hover {
            background-color: #45a049;
        }

        input[name="price"] {
            width: 80px;
            text-align: center;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }


        .product-id-link {
            color: #007BFF;
            text-decoration: none;
            cursor: pointer;
        }

        .product-id-link:hover {
            text-decoration: underline;
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

        html[data-theme='dark'] .custom-alert-content{
            background-color: #2a2a2a;
        }

        html[data-theme='dark'] .custom-alert-content p, 
        html[data-theme='dark'] .custom-alert-content div {
            color: white !important;
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