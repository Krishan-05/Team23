<x-app-layout>
    <div class="dashboard-page">
        <div class="dashboard-box">
            <p class="dashboard-heading">
                {{ __("Stock View") }}
            </p>
        <div class="table-wrapper">
            <table class="table-class">
                <thead class="table-heading">
                    <tr class="table-row">
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price ($)</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    @foreach ($products as $product)
                    <tr class ="table-row">
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->stock }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</x-app-layout>