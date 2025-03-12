<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ $product->name }}</title>
</head>

<body>
    <main>
        <h1>{{ $product->name }}</h1>
        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" width="200">
        <p>Price: £{{ $product->price }}</p>
        <p>{{ $product->description }}</p>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" max="100" value="1">
        <button>Add to Basket</button>
    </main>
</body>

</html>