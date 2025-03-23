    <!DOCTYPE html>
    <style>
    #dark-mode-toggle {
        top: 10px;
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
    }
</style>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Basket</title>
        <link rel="stylesheet" href="{{ asset('css/basketstyle.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    </head>
    <body>
            <header id="main-header">
                <h1> <img src="images/Team23 Logo No background.png" alt="Brand logo" width="80" height="80"> <br> </h1>
                <nav class="navbar"> 
                    <ul>
                        <button id="dark-mode-toggle">🌙</button>
                        <li><a id="home" href="{{ url('/') }}">Home</a></li>
                        <li><a id="basket" href="{{ route('basket') }}">Basket</a></li>
                        <li><a id="products" href="{{ route('categories') }}">Products</a>
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
                <h4>Your Basket</h4>
                <div id="basket-items">
                </div>
                <div id="total-price">
                </div>
                <div class="basket-actions">
                    <button id="clear-basket" class="clear-btn">Clear Basket</button>
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
                itemDiv.innerHTML = `
                    <div class="item-details">
                        <div class="item-info">
                            <p>${item.quantity} x ${item.name} - £${item.price}</p>
                            <p>Subtotal: £${item.price * item.quantity}</p>
                        </div>
                    </div>
                    <div class="item-actions">
                        <button class="btn-adjust-quantity" onclick="adjustQuantity('${item.id}', -1)">-</button>
                        <button class="btn-adjust-quantity" onclick="adjustQuantity('${item.id}', 1)">+</button>
                    </div>
                `;
                basketContainer.appendChild(itemDiv);

                totalPrice += item.price * item.quantity;
            });

            totalPriceContainer.innerHTML = `<h3>Total: £${totalPrice}</h3>`;
        }

        function adjustQuantity(itemId, change) {
            const basketItems = JSON.parse(localStorage.getItem('basket')) || [];
            const itemIndex = basketItems.findIndex(item => item.id === itemId);
            
            if (itemIndex !== -1) {
                const item = basketItems[itemIndex];
                item.quantity = Number(item.quantity) + change; 
                if (item.quantity <= 0) {
                    basketItems.splice(itemIndex, 1); 
                }

                localStorage.setItem('basket', JSON.stringify(basketItems));
                displayBasket();
            }
        }

            document.addEventListener('DOMContentLoaded', displayBasket);

            document.addEventListener('DOMContentLoaded', () => {
                const clearBasketButton = document.getElementById('clear-basket');
                clearBasketButton.addEventListener('click', () => {
                    localStorage.removeItem('basket');
                    displayBasket();
                });
            });

            document.addEventListener('DOMContentLoaded', function () {
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
                        <p><a href="{{ url('faq') }}">FAQ</a></p>
                    </div>
                </div>
                <div class="beactivefooter">
                    <p>beActive - 2025</p>
                </div>
            </div>
        </footer>

    </body>
    </html>
