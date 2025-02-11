<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket</title>
    <link rel="stylesheet" href="{{ asset('basketstyle.css') }}">
</head>
<body>
    <nav>
        <ul class="navbar">
            <li><a href="/">Home</a></li>
            <li><a href="/products">Products</a></li>
            <li><a href="/contact">Contact Us</a></li>
            <li class="dropdown">
                <button class="dropbtn">Basket</button>
                <div class="dropdown-content">
                    <a href="/history">History</a>
                </div>
            </li>
        </ul>
    </nav>

    <main>
        <h1>Your Basket</h1>
        <div id="basket-items">
            
        </div>
        <div id="total-price">
           
        </div>

        <!-- Clear Basket and Checkout Buttons -->
        <div class="basket-actions">
            <button id="clear-basket" class="action-btn">Clear Basket</button>
            <a href="/checkout" id="checkout" class="action-btn">Secure Checkout</a>
        </div>
    </main>



    <script>
        // Function to display basket items
        function displayBasket() {
            const basketItems = JSON.parse(localStorage.getItem('basket')) || [];
            const basketContainer = document.getElementById('basket-items');
            const totalPriceContainer = document.getElementById('total-price');
            let totalPrice = 0;

            // Clear any previous content
            basketContainer.innerHTML = '';

            
            basketItems.forEach(item => {
                const itemDiv = document.createElement('div');
                itemDiv.classList.add('basket-item');
                itemDiv.innerHTML = `
                    <p>${item.quantity} x ${item.name} - £${item.price}</p>
                    <p>Subtotal: £${item.price * item.quantity}</p>
                `;
                basketContainer.appendChild(itemDiv);

                // Calculate total price
                totalPrice += item.price * item.quantity;
            });

            // Display total price
            totalPriceContainer.innerHTML = `<h3>Total: £${totalPrice}</h3>`;
        }

        // Function to clear the basket
        function clearBasket() {
            localStorage.removeItem('basket'); // Remove all basket items from Storage
            displayBasket(); 
        }

        // Call displayBasket function when the page loads
        document.addEventListener('DOMContentLoaded', displayBasket);

        // Clear Basket Button
        document.getElementById('clear-basket').addEventListener('click', clearBasket);
    </script>
</body>
</html>
