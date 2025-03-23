<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/orderview.css') }}">
    <link rel="stylesheet" href="{{ asset('css/darkmode-dashboard.css') }}">
    <div class="dashboard-page">
    <button id="dark-mode-toggle">🌙</button>
        <div class="dashboard-box">
            <p class="dashboard-heading">
                {{ __("Your Orders") }}
            </p>
            <div class="table-container">
                @if ($orders->isEmpty())
                    <p>You have no orders.</p>
                @else
                    @foreach ($orders as $order)
                        <table class="table-class order-table">
                            <thead class="table-heading">
                                <tr class="table-row">
                                    <th>Order ID</th>
                                    <th>Status</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Total Order Price</th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                @foreach ($order->orderItems as $item)
                                    <tr class="table-row">
                                        @if ($loop->first)
                                            <td rowspan="{{ count($order->orderItems) }}">{{ $order->id }}</td>
                                            <td rowspan="{{ count($order->orderItems) }}">
                                                {{ ucfirst($order->status) }}
                                            </td>
                                        @endif
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        @if ($loop->first)
                                            <td rowspan="{{ count($order->orderItems) }}">{{ $order->total_price }}</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if ($order->shipping)
                            <table class="table-class shipping-table">
                                <thead class="table-heading">
                                    <tr class="table-row">
                                        <th colspan="4">Shipping Information</th>
                                    </tr>
                                    <tr class="table-row">
                                        <th colspan="2">Address</th>
                                        <th colspan="2">Postcode</th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr class="table-row">
                                        <td colspan="2">{{ $order->shipping->shipping_address_line_1 }}</td>
                                        <td colspan="2">{{ $order->shipping->shipping_postcode }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <p>No shipping information available for this order.</p>
                        @endif

                        <div class="order-gap"></div>
                    @endforeach
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
