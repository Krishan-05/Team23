<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/analytics.css') }}">
    <link rel="stylesheet" href="{{ asset('css/darkmode-dashboard.css') }}">
    
    <div class="dashboard-page">
        <button id="dark-mode-toggle">🌙</button>
        <div class="dashboard-box">
            <p class="dashboard-heading">{{ __("Business Analytics") }}</p>
            
            <div class="main-container">
                <div class="top-container">
                    <div class="order-sales">
                        <div class="filter-buttons">
                            <button onclick="fetchData('day', this)">Day</button>
                            <button onclick="fetchData('week', this)">Week</button>
                            <button onclick="fetchData('month', this)">Month</button>
                        </div>
                        <div id="analytics-data">
                            <h3 id="time-period">Select a time period</h3>
                            <p>Total Orders: <span id="total-orders">0</span></p>
                            <p>Total Sales: £<span id="total-sales">0.00</span></p>
                        </div>
                    </div>

                    <div class="recent-orders">
                        <h3>Latest Orders</h3>
                        <table class="recent-orders-table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Email</th>
                                    <th>Products Ordered</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Shipping Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentOrders as $order)
                                    @foreach($order->orderItems as $item)
                                        <tr>
                                            @if($loop->first)
                                                <td rowspan="{{ count($order->orderItems) }}">{{ $order->id }}</td>
                                                <td rowspan="{{ count($order->orderItems) }}">{{ $order->user->email }}</td>
                                                <td rowspan="{{ count($order->orderItems) }}">
                                                    @foreach($order->orderItems as $orderItem)
                                                        {{ $orderItem->product->name }}<br>
                                                    @endforeach
                                                </td>
                                                <td rowspan="{{ count($order->orderItems) }}">
                                                    @foreach($order->orderItems as $orderItem)
                                                        {{ $orderItem->quantity }}<br>
                                                    @endforeach
                                                </td>
                                                <td rowspan="{{ count($order->orderItems) }}">£{{ number_format($order->total_price, 2) }}</td>
                                                <td rowspan="{{ count($order->orderItems) }}">{{ $order->shipping->shipping_option ?? 'N/A' }}</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="return-requests">
                    <h3>Return Requests</h3>
                    <table class="return-requests-table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>User ID</th>
                                <th>Requested At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($returnRequests as $return)
                                <tr>
                                    <td>{{ $return->order_id }}</td>
                                    <td>{{ $return->order->user_id }}</td>
                                    <td>{{ $return->created_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function fetchData(period, clickedButton) {
            fetch("{{ route('admin.analytics-data') }}?period=" + period)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('time-period').innerText = data.label;
                    document.getElementById('total-orders').innerText = data.total_orders;
                    document.getElementById('total-sales').innerText = parseFloat(data.total_sales).toFixed(2);
                    
                    document.querySelectorAll('.filter-buttons button').forEach(button => {
                        button.classList.remove('active');
                    });
                    clickedButton.classList.add('active');
                })
                .catch(error => console.error('Error:', error));
        }


        document.getElementById('dark-mode-toggle').addEventListener('click', function() {
            const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
            document.documentElement.setAttribute('data-theme', isDark ? 'light' : 'dark');
            localStorage.setItem('theme', isDark ? 'light' : 'dark');
            this.textContent = isDark ? '🌙' : '☀️';
        });
    </script>
</x-app-layout>