<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/user-permissions.css') }}">
    <link rel="stylesheet" href="{{ asset('css/orderview.css') }}">
    <link rel="stylesheet" href="{{ asset('css/darkmode-dashboard.css') }}">

    <div class="dashboard-page">
    <button id="dark-mode-toggle">🌙</button>
        <div class="dashboard-box">
            <p class="dashboard-heading">{{ __("Your Orders") }}</p>
            <div class="table-wrapper">
                <div class="table-container">
                    <table class="table-class order-table">
                        <thead class="table-heading">
                            <tr>
                                <th>Order ID</th>
                                <th>Items Purchased</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">
                            @foreach($orders as $order)
                                <tr class="category-row">
                                    <td>{{ $order->id }}</td>
                                    <td>
                                        @foreach($order->orderItems as $item)
                                            {{ $item->product->name }} (x{{ $item->quantity }})<br>
                                        @endforeach
                                    </td>
                                    <td>${{ number_format($order->total_price, 2) }}</td>
                                    <td>{{ ucfirst($order->status) }}</td>
                                    <td>
                                        @if(!$order->hasReturn())
                                            <a href="{{ route('create.return', ['orderId' => $order->id]) }}" class="button">
                                                Create Return
                                            </a>
                                        @else
                                            <span class="btn disabled">Return Requested</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
