<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Page</title>
  <link rel="stylesheet" href="{{ asset('productstyle.css') }}">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  @vite('resources/css/productstyle.css')
</head>
<body>
  <header>
    <nav>
      <ul class="navbar">
        <li><a href="/">Home</a></li>
        <a href="{{ route('products') }}">Products</a>
        <a href="{{ route('basket') }}">Basket</a>
      </ul>
    </nav>
    <button id="dark-mode-toggle" style="position: absolute; top: 10px; right: 10px; background: none; border: none; font-size: 24px; cursor: pointer;">🌙</button>
  </header>

  <main>
    <h1>Select Your Products</h1>
    <div class="main-products">
      @foreach($mainProducts as $mainProduct)
      <div class="product">
        <h2>{{ $mainProduct->name }}</h2>
        <p>{{ $mainProduct->description }}</p>
        <button class="show-sub-products" data-id="{{ $mainProduct->id }}">View Sub-Products</button>
        <div class="sub-products" id="sub-products-{{ $mainProduct->id }}" style="display: none;">
          @foreach($mainProduct->subProducts as $subProduct)
          <div class="sub-product">
            <p>{{ $subProduct->name }} - ${{ $subProduct->price }}</p>
            <label for="quantity-{{ $subProduct->id }}">Quantity:</label>
            <input type="number" id="quantity-{{ $subProduct->id }}" data-id="{{ $subProduct->id }}" data-name="{{ $subProduct->name }}" data-price="{{ $subProduct->price }}" class="quantity-input" min="1" max="100" value="1">
            <button class="add-to-basket" data-id="{{ $subProduct->id }}">Add to Basket</button>
          </div>
          @endforeach
        </div>
      </div>
      @endforeach
    </div>
  </main>

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

  <script>
    $(document).ready(function () {
      $('.show-sub-products').click(function () {
        const productId = $(this).data('id');
        $(`#sub-products-${productId}`).toggle();
      });
      $('.add-to-basket').click(function () {
        const subProductId = $(this).data('id');
        const quantity = $(`#quantity-${subProductId}`).val();
        const name = $(`#quantity-${subProductId}`).data('name');
        const price = $(`#quantity-${subProductId}`).data('price');
        const basketItems = JSON.parse(localStorage.getItem('basket')) || [];
        basketItems.push({ id: subProductId, name, price, quantity });
        localStorage.setItem('basket', JSON.stringify(basketItems));
        alert(`${quantity} x ${name} added to the basket!`);
      });
    });
  </script>
</body>
</html>
