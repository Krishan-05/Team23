<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Basket</title>
  <link rel="stylesheet" href="{{ asset('css/basketstyle.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <header id="main-header" style="position: relative;">
    <h1>
      <img src="images/Team23 Logo No background.png" alt="Brand logo" width="80" height="80">
      <br>
    </h1>
    <button id="dark-mode-toggle" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: none; border: none; font-size: 24px; cursor: pointer;">🌙</button>
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
  <main>
    <div class="basket-container">
      <h1>Your Basket</h1>
      <div id="basket-items"></div>
      <div id="total-price"></div>
      <div class="basket-actions">
        <button id="clear-basket" class="action-btn">Clear Basket</button>
        <a href="{{ route('checkout') }}" id="checkout" class="action-btn">Secure Checkout</a>
      </div>
    </div>
  </main>
  <script>
    function displayBasket() {
      const basketItems = JSON.parse(localStorage.getItem('basket')) || [];
      const basketContainer = document.getElementById('basket-items');
      const totalPriceContainer = document.getElementById('total-price');
      let totalPrice = 0;
      basketContainer.innerHTML = '';
      basketItems.forEach(item => {
        const itemDiv = document.createElement('div');
        itemDiv.classList.add('basket-item');
        itemDiv.innerHTML = `<p>${item.quantity} x ${item.name} - £${item.price}</p>
          <p>Subtotal: £${item.price * item.quantity}</p>`;
        basketContainer.appendChild(itemDiv);
        totalPrice += item.price * item.quantity;
      });
      totalPriceContainer.innerHTML = `<h3>Total: £${totalPrice}</h3>`;
    }
    function clearBasket() {
      localStorage.removeItem('basket');
      displayBasket();
    }
    document.addEventListener('DOMContentLoaded', displayBasket);
    document.getElementById('clear-basket').addEventListener('click', clearBasket);
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
  <footer id="footer">
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
                <button type="submit" style="border: none; background: none; color: inherit; font: inherit; cursor: pointer; margin-left: 50px; text-align: center;">Logout</button>
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
</body>
</html>
