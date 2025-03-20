<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Checkout Page</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/CheckoutPage.css') }}">
</head>
<body>
  <div class="container">
    <header id="main-header">
      <h1>
        <img src="images/Team23 Logo No background.png" alt="Brand logo" width="80" height="80">
        <br>
      </h1>
      <button id="dark-mode-toggle">🌙</button>
      <nav class="navbar">
        <ul>
          <li><a id="home" href="{{ url('/') }}">Home</a></li>
          <li><a id="basket" href="{{ route('basket') }}">Basket</a></li>
          <li>
            <a id="products">Products</a>
            <ul class="dropdown">
              <li><a href="{{ route('supplements') }}">Supplements</a></li>
              <li><a href="{{ route('gym') }}">Gym Equipment</a></li>
              <li><a href="{{ route('clothing') }}">Clothing</a></li>
              <li><a href="{{ route('sports') }}">Sports Equipment</a></li>
              <li><a href="{{ route('accessories') }}">Accessories</a></li>
            </ul>
          </li>
          <li><a id="contact" href="{{ route('contact') }}">Contact Us</a></li>
        </ul>
      </nav>
    </header>
  </div>

  <main class="main">
    <section class="payment-info">
      <h2>Payment Information</h2>
      <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <label for="user-id">User ID</label>
        <input type="text" id="userid" name="user_id" placeholder="Enter User ID" required>
        @error('user_id')
          <div class="error-message" style="color: red;">{{ $message }}</div>
        @enderror

        <label>Select Payment Method:</label>
        <select id="payment_method_select" name="payment_method">
          <option value="card" selected>Credit/Debit Card</option>
          <option value="paypal">PayPal</option>
        </select>

        <div id="credit-card-form">
          <label for="card-type">Card Type</label>
          <input type="text" id="card-type" name="card_type" placeholder="Enter Card Type" required>
          <label for="card-number">Card Number</label>
          <input type="text" id="card-number" name="card_number" placeholder="Enter Card Number" required>
          <label for="cvv">Card Security Number (CVV)</label>
          <input type="text" id="cvv" name="cvv" placeholder="Enter CVV" required>
          <label for="expiry-date">Expiry Date</label>
          <input type="text" id="expiry-date" name="expiry_date" placeholder="MM/YY" required>
          <label for="postcode">Postcode</label>
          <input type="text" id="postcode" name="postcode" placeholder="Enter Postcode" required>
          <label for="billing-address">Billing Address</label>
          <input type="text" id="billing-address" name="billing_address" placeholder="Enter Billing Address" required>
        </div>

        <div id="paypal-button-container" style="display: none;">
          <button type="button" onclick="window.location.href='https://www.paypal.com';" style="background-color: #0070ba; color: white; border: none; padding: 10px 20px; font-size: 16px; cursor: pointer;">
            PayPal
          </button>
        </div>

        <button type="submit" class="pay-now">PAY NOW</button>
      </form>
    </section>

    <script>
      const paymentMethodSelect = document.getElementById('payment_method_select');
      const creditCardForm = document.getElementById('credit-card-form');
      const paypalContainer = document.getElementById('paypal-button-container');
      const payNowButton = document.querySelector('.pay-now');

      function togglePaymentMethod() {
        const method = paymentMethodSelect.value;
        if (method === 'paypal') {
          creditCardForm.style.display = 'none';
          paypalContainer.style.display = 'block';
          payNowButton.style.display = 'none';
        } else {
          creditCardForm.style.display = 'block';
          paypalContainer.style.display = 'none';
          payNowButton.style.display = 'block';
        }
      }

      document.addEventListener('DOMContentLoaded', togglePaymentMethod);
      paymentMethodSelect.addEventListener('change', togglePaymentMethod);
    </script>

    <section class="cart-info">
      <h2>Your cart</h2>
      <div class="cart-item"></div>
      <div class="cart-item"></div>

      <div class="summary">
        <script>
          function displayBasket() {
            const basketItems = JSON.parse(localStorage.getItem('basket')) || [];
            const basketContainer = document.getElementById('basket-items');
            const totalPriceContainer = document.getElementById('total-price');
            const payNowButton = document.querySelector('.pay-now');
            let totalPrice = 0;
            basketContainer.innerHTML = '';
            if (basketItems.length === 0) {
              basketContainer.innerHTML = "<p>Your basket is empty. Please add items to your basket in order to proceed.</p>";
              payNowButton.disabled = true;
            } else {
              payNowButton.disabled = false;
              basketItems.forEach(item => {
                const itemDiv = document.createElement('div');
                itemDiv.classList.add('basket-item');
                itemDiv.innerHTML = `
                  <p>${item.quantity} x ${item.name} - £${item.price}</p>
                  <p>Subtotal: £${item.price * item.quantity}</p>
                `;
                basketContainer.appendChild(itemDiv);
                totalPrice += item.price * item.quantity;
              });
              totalPriceContainer.innerHTML = "<h3>Total: £" + totalPrice + "</h3>";
            }
          }
          document.addEventListener('DOMContentLoaded', displayBasket);
          @if (session('clearBasket'))
            localStorage.removeItem('basket');
          @endif
        </script>
        <div id="basket-items"></div>
        <br><br>
        <div id="total-price"></div>
      </div>
    </section>
  </main>

  <footer class="footer">
    <div class="footer-container">
      <div class="footertext">
        <p>Our Social Networks</p>
      </div>
      <div class="socialimages">
        <a href="https://www.facebook.com/" target="_blank">
          <img src="{{ asset('images/facebook logo small.png') }}" alt="Facebook logo">
        </a>
        <a href="https://www.instagram.com/" target="_blank">
          <img src="{{ asset('images/instagram logo small.png') }}" alt="Instagram logo">
        </a>
        <a href="https://uk.pinterest.com/" target="_blank">
          <img src="{{ asset('images/pintrest logo small.png') }}" alt="Pinterest logo">
        </a>
        <a href="https://x.com/home" target="_blank">
          <img src="{{ asset('images/x logo small.png') }}" alt="X logo">
        </a>
      </div>
      <div class="footerlinks">
        <div class="footerlinkhelp">
          <h5>Help</h5>
          <p><a href="{{ url('contact') }}">Contact us</a></p>
        </div>
        <div class="footerlinkaccount">
          <h5>Account Management</h5>
          <p>
            @auth
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="border: none; background: none; color: inherit; font: inherit; cursor: pointer; margin-left: 50px; text-align: center;">
                  Logout
                </button>
              </form>
            @else
              <a href="{{ route('login') }}">Login</a>
            @endauth
          </p>
        </div>
        <div class="footerlinkaboutus">
          <h5>About us</h5>
          <p><a href="{{ url('/') }}">Our Ethos</a></p>
        </div>
      </div>
      <div class="beactivefooter">
        <p>beActive - 2024</p>
      </div>
    </div>
  </footer>

  @if (session('success'))
    <script>
      alert("{{ session('success') }}");
    </script>
  @endif

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
</body>
</html>
