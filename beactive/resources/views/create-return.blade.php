<x-app-layout>
    
    <style>
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

        .return-confirmation {
            display:flex;
            text-align: center;
            justify-content:center; 
            margin-top: 20px;
        }

        .confirm-btn, .cancel-btn {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }

        .confirm-btn {
            background-color: #FF5B00;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .confirm-btn:hover {
            background-color: #cc4800;
        }

        .cancel-btn {
            background-color: #ddd;
            color: #333;
            border: 1px solid #bbb;
            margin-left: 10px;
        }

        .cancel-btn:hover {
            background-color: #bbb;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/orderview.css') }}">
    <link rel="stylesheet" href="{{ asset('css/darkmode-dashboard.css') }}">
    <div class="dashboard-page">
    <button id="dark-mode-toggle">🌙</button>
        <div id="customAlert" class="custom-alert hidden">
            <div class="custom-alert-content">
                <p id="alertMessage"></p>
            </div>
        </div>

        <div class="dashboard-box">
            <p class="dashboard-heading">{{ __("Create Return for Order #") }}{{ $order->id }}</p>
            <div class="table-container">
                <table class="table-class">
                    <thead class="table-heading">
                        <tr>
                            <th>Order ID</th>
                            <th>Status</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Total Order Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item)
                            <tr>
                                @if ($loop->first)
                                    <td rowspan="{{ count($order->orderItems) }}">{{ $order->id }}</td>
                                    <td rowspan="{{ count($order->orderItems) }}">{{ ucfirst($order->status) }}</td>
                                @endif
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                @if ($loop->first)
                                    <td rowspan="{{ count($order->orderItems) }}">${{ number_format($order->total_price, 2) }}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="return-confirmation">
                <form action="{{ route('confirm.return', $order->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="confirm-btn">Confirm Return</button>
                </form>
                <a href="{{ route('dashboard') }}" class="cancel-btn">Cancel</a>
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
