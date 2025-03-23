
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
    <title>Checkout Page</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/CheckoutPage.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <div id="customAlert" class="custom-alert hidden">
        <div class="custom-alert-content">
            <p id="alertMessage"></p>
        </div>
    </div>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const customAlert = document.getElementById('customAlert');
                const alertMessage = document.getElementById('alertMessage');

                if (customAlert && alertMessage) {
                    alertMessage.textContent = "{{ session('success') }}\n\nYou will be redirected to the home screen in 5 seconds.";
                    customAlert.classList.remove('hidden');
                    setTimeout(function () {
                        window.location.href = '/';
                    }, 5000); 
                }
            });
        </script>
    @endif
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const customAlert = document.getElementById('customAlert');
                const alertMessage = document.getElementById('alertMessage');

                if (customAlert && alertMessage) {
                    const errors = {!! json_encode($errors->all()) !!};
                    alertMessage.textContent = errors.join('\n');
                    customAlert.classList.remove('hidden');
                    setTimeout(function () {
                        customAlert.classList.add('hidden');
                    }, 6000);
                }
            });
        </script>
    @endif


    <div class="container">
        <header id="main-header">
            <h1>
                <img src="images/Team23 Logo No background.png" alt="Brand logo" width="80" height="80">
            </h1>
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
    </div>

    <main class="main">
        <section class="payment-info">
            <h2>Payment Information</h2>
            <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form">
                @csrf  
                <input type="hidden" id="basket-data" name="basket">
                <input type="hidden" id="shipping-fee" name="shipping_fee" value="0">
                <input type="hidden" id="discounted-total-price" name="discounted_total_price">
                <label for="user-id">User ID</label>
                <input type="text" id="userid" name="user_id" value="{{ auth()->id() }}" readonly>

                @error('user_id')
                    <div class="error-message" style="color: red;">{{ $message }}</div>
                @enderror

                <label for="card-type">Card Type</label>
                <select id="card-type" name="card_type" required>
                    <option value="" disabled selected>Select Card Type</option>
                    <option value="Visa">Visa</option>
                    <option value="MasterCard">MasterCard</option>
                    <option value="PayPal">American Express</option>
                </select>

                <label for="card-number">Card Number</label>
                <input type="text" id="card-number" name="card_number" placeholder="Enter Card Number" required maxlength="16" pattern="\d{16}" title="Card number must be exactly 16 digits">

                <label for="cvv">Card Security Number (CVV)</label>
                <input type="text" id="cvv" name="cvv" placeholder="Enter CVV" required maxlength="3" pattern="\d{3}" title="CVV must be exactly 3 digits">

                <label for="expiry-date">Expiry Date</label>
                <input type="text" id="expiry-date" name="expiry_date" placeholder="MM/YY" required pattern="(0[1-9]|1[0-2])\/\d{2}" title="Enter a valid expiry date in MM/YY format">

                <!-- Shipping Address Section -->
                <h2>Shipping Address</h2>
                <label for="shipping-address-line-1">Address Line 1</label>
                <input type="text" id="shipping-address-line-1" name="shipping_address_line_1" placeholder="Enter Shipping Address Line 1" required>

                <label for="shipping-address-line-2">Address Line 2</label>
                <input type="text" id="shipping-address-line-2" name="shipping_address_line_2" placeholder="Enter Shipping Address Line 2">

                <label for="shipping-county">County</label>
                <input type="text" id="shipping-county" name="shipping_county" placeholder="Enter Shipping County" required>

                <label for="shipping-town-city">Town/City</label>
                <input type="text" id="shipping-town-city" name="shipping_town_city" placeholder="Enter Shipping Town/City" required>

                <label for="shipping-postcode">Post/Zipcode</label>
                <input type="text" id="shipping-postcode" name="shipping_postcode" placeholder="Enter Shipping Post/Zipcode" required>

                <!-- Checkbox for "Same as Shipping Address" -->
                <label>
                    Billing address is the same as shipping address <input type="checkbox" id="same-as-shipping" class="delivery-button" onchange="toggleBillingAddress()"> 
                </label>

                <!-- Billing Address Section -->
                <h2>Billing Address</h2>
                <div id="billing-address-section">
                    <label for="billing-address-line-1">Address Line 1</label>
                    <input type="text" id="billing-address-line-1" name="billing_address_line_1" placeholder="Enter Billing Address Line 1">

                    <label for="billing-address-line-2">Address Line 2</label>
                    <input type="text" id="billing-address-line-2" name="billing_address_line_2" placeholder="Enter Billing Address Line 2">

                    <label for="billing-county">County</label>
                    <input type="text" id="billing-county" name="billing_county" placeholder="Enter Billing County">

                    <label for="billing-town-city">Town/City</label>
                    <input type="text" id="billing-town-city" name="billing_town_city" placeholder="Enter Billing Town/City">

                    <label for="billing-postcode">Post/Zipcode</label>
                    <input type="text" id="billing-postcode" name="billing_postcode" placeholder="Enter Billing Post/Zipcode">
                </div>

                <!-- Delivery Options -->
                <h3>Delivery Options</h3>
                <label class="delivery-button">
                    Standard Delivery (£3)
                    <input type="radio" id="standard-shipping" name="shipping_option" value="standard" class="delivery-button" onchange="updateShippingFee(3)" required> 
                </label>
                <label class="delivery-button">
                    Express Delivery (£8)
                    <input type="radio" id="express-shipping" name="shipping_option" value="express" class="delivery-button" onchange="updateShippingFee(8)" required> 
                </label>
                <h3>Discount</h3>
                <input type="text" id="discount-code" placeholder="Enter Discount Code" />
                <button id="apply-discount">Apply Discount</button>

                <button type="submit" class="pay-now">PAY NOW</button>
            </form>
        </section>

        <section class="cart-info">
            <h2>Your cart</h2>
            <div id="basket-items"></div>
            <div id="shipping-fee-display">Shipping Fee: £0</div>
            <div id="total-price"></div>
        </section>
    </main>

    <footer id="footer">
        <div class="footer-container">
            <div class="footertext">
                <p>Our Social Networks</p>
            </div> 
            <div class="socialimages">
                <a href="https://www.facebook.com/" target="_blank"><img src="{{ asset('images/facebook logo small.png') }}" alt="Facebook logo"></a>
                <a href="https://www.instagram.com/" target="_blank"><img src="{{ asset('images/instagram logo small.png') }}" alt="Instagram logo"></a>
                <a href="https://uk.pinterest.com/" target="_blank"><img src="{{ asset('images/pintrest logo small.png') }}" alt="Pinterest logo"></a>
                <a href="https://x.com/home" target="_blank"><img src="{{ asset('images/x logo small.png') }}" alt="X logo"></a>
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
                                <button type="submit" style="border: none; background: none; color: inherit; font: inherit; cursor: pointer;">
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
    <script>
    document.addEventListener("DOMContentLoaded", function () {
    const discountCodes = {
        "STRONGSTART25": 0.25,
        "MOVEFORWARD20": 0.20,
        "SPRINGFIT15": 0.15,
        "STRONGERTOGETHER": 0.35,
        "FUELUP20": 0.20,
        "SUMMERREADY25": 0.25
    };

    function displayBasket() {
        const basketItems = JSON.parse(localStorage.getItem('basket')) || [];
        const basketContainer = document.getElementById('basket-items');
        const totalPriceContainer = document.getElementById('total-price');
        const shippingFeeInput = document.getElementById('shipping-fee');
        const payNowButton = document.querySelector('.pay-now');
        const discountCodeInput = document.getElementById('discount-code');
        const discountedTotalPriceInput = document.getElementById('discounted-total-price');
        const basketDataInput = document.getElementById('basket-data'); 
        const discountCode = discountCodeInput.value.trim().toUpperCase();
        let totalPrice = 0;

        basketContainer.innerHTML = '';

        if (basketItems.length === 0) {
            basketContainer.innerHTML = `<p>Your basket is empty. Please add items to proceed.</p>`;
            payNowButton.disabled = true;
        } else {
            payNowButton.disabled = false;

            basketItems.forEach(item => {
                const itemPrice = parseFloat(item.price);
                const itemSubtotal = itemPrice * item.quantity;
                totalPrice += itemSubtotal;

                const itemDiv = document.createElement('div');
                itemDiv.innerHTML = `<p>${item.quantity} x ${item.name} - £${itemPrice.toFixed(2)} each (Subtotal: £${itemSubtotal.toFixed(2)})</p>`;
                basketContainer.appendChild(itemDiv);
            });

            let shippingFee = 0;
            if (shippingFeeInput) {
                shippingFee = parseFloat(shippingFeeInput.value) || 0;
            }

            totalPrice += shippingFee;

            let discountMessage = '';
            if (discountCode && discountCodes[discountCode]) {
                const discountRate = discountCodes[discountCode];
                const discountAmount = totalPrice * discountRate;
                totalPrice -= discountAmount;
                discountMessage = `Discount Applied (${discountCode}): -£${discountAmount.toFixed(2)}`;
            } else if (discountCode) {
                discountMessage = 'Invalid discount code';
            }

            document.getElementById('shipping-fee-display').innerHTML = `Shipping Fee: £${shippingFee.toFixed(2)}`;
            if (discountMessage) {
                basketContainer.innerHTML += `<p>${discountMessage}</p>`;
            }
            totalPriceContainer.innerHTML = `<h3>Total: £${totalPrice.toFixed(2)}</h3>`;
            basketDataInput.value = JSON.stringify(basketItems); 
            discountedTotalPriceInput.value = totalPrice.toFixed(2); 
        }
    }

    displayBasket();

    document.getElementById('apply-discount').addEventListener('click', function(event) {
        event.preventDefault(); 
        displayBasket(); 
    });


    function updateShippingFee(fee) {
        document.getElementById('shipping-fee').value = fee;
        document.getElementById('shipping-fee-display').innerText = `Shipping Fee: £${fee}`;
        displayBasket(); 
    }

    document.getElementById('standard-shipping').addEventListener('change', function() {
        updateShippingFee(3);
    });

    document.getElementById('express-shipping').addEventListener('change', function() {
        updateShippingFee(8);
    });

    function toggleBillingAddress() {
        const sameAsShipping = document.getElementById('same-as-shipping').checked;
        const billingSection = document.getElementById('billing-address-section');
        const billingInputs = billingSection.querySelectorAll('input');

        if (sameAsShipping) {
            billingSection.style.display = 'none';
            billingInputs.forEach(input => input.removeAttribute('required'));
        } else {
            billingSection.style.display = 'block';
            billingInputs.forEach(input => input.setAttribute('required', 'required'));
        }
    }

    document.getElementById('same-as-shipping').addEventListener('change', toggleBillingAddress);

    document.getElementById('checkout-form').addEventListener('submit', function(event) {
        displayBasket();
        console.log("Basket Data Before Submission:", document.getElementById('basket-data').value);

        if (!JSON.parse(localStorage.getItem('basket'))?.length) {
            alert("Your basket is empty! Add items before checking out.");
            event.preventDefault();
            return;
        }

        localStorage.removeItem('basket');

        console.log("Form Data:", {
            basket: document.getElementById('basket-data').value,
            shippingFee: document.getElementById('shipping-fee').value,
            discountedTotalPrice: document.getElementById('discounted-total-price').value,
        });
    });

    document.getElementById('card-number').addEventListener('input', function (e) {
        this.value = this.value.replace(/\D/g, '').slice(0, 16);
    });

    document.getElementById('cvv').addEventListener('input', function (e) {
        this.value = this.value.replace(/\D/g, '').slice(0, 3);
    });

    document.getElementById('expiry-date').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^0-9/]/g, '').slice(0, 5);
        if (this.value.length === 2 && !this.value.includes('/')) {
            this.value += '/';
        }
    });

    @if (session('clearBasket'))
        localStorage.removeItem('basket');
    @endif 
});
</script>

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

            document.addEventListener("DOMContentLoaded", function () {
            if (document.documentElement.getAttribute("data-theme") === "dark") {
                document.querySelector("#card-type").style.backgroundColor = "#252525";
                document.querySelector("#card-type").style.color = "#fff";
                document.querySelector("#card-type").style.border = "1px solid #444";
            }
            });
        });
        });
</script>

</html>