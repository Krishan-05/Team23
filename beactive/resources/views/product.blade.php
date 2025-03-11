@extends('layouts.app')  <!-- Extend your main layout (if you have one) -->

@section('content')
    <div class="product-details">
        <!-- Product Image -->
        <img src="{{ asset('images/sports equipment/' . strtolower(str_replace(' ', '-', $product->name)) . '.jpeg') }}"
            alt="{{ $product->name }}" width="300">

        <!-- Product Name -->
        <h2>{{ $product->name }}</h2>

        <!-- Product Price -->
        <p class="product-price">£{{ $product->price }}</p>

        <!-- Product Description -->
        <p class="product-description">{{ $product->description }}</p>

        <!-- Product Size (if applicable) -->
        @if ($product->size)
            <p><strong>Size:</strong> {{ $product->size }}</p>
        @endif

        <!-- Product Colour (if applicable) -->
        @if ($product->colour)
            <p><strong>Colour:</strong> {{ $product->colour }}</p>
        @endif

        <!-- Quantity Selection -->
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" max="100" value="1">

        <!-- Add to Basket Button -->
        <button class="add-to-basket" data-id="{{ $product->id }}">Add to Basket</button>
    </div>
@endsection