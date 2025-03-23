<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>FAQs</title> 
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FAQsStyle.css') }}">
</head>

<body>
<main class=main>
    <header id="main-header">
            <h3> <img src="images/Team23 Logo No background.png" alt="Brand logo" width="80" height="80"> <br> </h3>
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
                    <li><a id="contact" a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </nav>
    </header>

<div class = "faq-container">
    <div class = "faq-content">
        <h1> Frequently Asked Questions (FAQs) </h1>
        <br>
        <h2> Orders and Deliveries</h2>
        <details>
            <summary>How long will my order take to arrive?</summary>
            <p>This depends on which shipping method you chose. Please see the below:</p>
            <p>Standard Shipping: 5-8 working days after being dispatched </p>
            <p>Express Shipping: 4-6 working days</p>
            <p>Click and Collect: 5-8 working days </p>
        </details>
        <details>
            <summary>What happens if my product gets damaged during shipping?</summary>
            <p>Please keep the product as it is, and contact us as soon as possible.</p>
        </details>
        <details>
            <summary>What should I do if my order has not arrived within the expected timeframe?</summary>
            <p>We advise that you track your order and wait 2 more working days. If your
                order still has not arrived, please contact us using our 'Contact Us' page.</p>
        </details>
        <details>
            <summary>I have recieved the wrong item</summary>
            <p>If you have received the wrong item, then please contact us using our 'Contact Us' page
                and we will get this issue resolved.</p>
        </details>
        <details>
            <summary>Do you provide free shipping on orders over a certain amount?</summary>
            <p>No, unfortunately we do not offer free shipping.</p>
        </details>
        <details>
            <summary>Can I cancel my order?</summary>
            <p>Yes, you can cancel your order within 24 hours of placing it. Please contact us, and
                we will arrange for this to happen.
            </p>
        </details>
        <h2>Returns and Refunds</h2>
        <details>
            <summary>How can I return an item?</summary>
            <p>Please click 'Return' and follow the instructions.
            </p>
        </details>
        <details>
            <summary>How long will it take for a refund to be processed?</summary>
            <p>Please allow 5-7 working days for your refund to show in
                your account, from the date you send your parcel back to us.</p>
        </details>
        <details>
            <summary>My refund has been processed, when will I get the funds?</summary>
            <p>Refunds can take up to 5 working days to reach your account, depending on your bank.</p>
        </details>
        <h2>Payments and Promo Codes</h2>
        <details>
            <summary>What payment methods do you offer?</summary>
            <p>We accept PayPal.</p>
        </details>
        <details>
            <summary>Can we add promo codes?</summary>
            <p>Yes, discount codes can be applied to checkout.</p>
        </details>
        <details>
            <summary>Why has my payment been declined?</summary>
            <p>If your payment has been declined, please check the following:</p>
            <p>Has the card you are using expired?</p>          
            <p>Are your card details correct, including security (CVC) code and expiry date?</p> 
            <p>Are your billing details correct, including name and address?</p> 
            <p>Does your billing address on your order match the details held by your card provider?</p> 
            <p>Have you checked your card has sufficient funds?</p> 
            <p>If the above is not the issue, please try again in 48 hours.</p>
        </details>
        <h2>Contact</h2>
        <details>
            <summary>How can I contact you?</summary>
            <p>We advise that you first look at the FAQs to find an answer to your question. If you cannot find an answer 
                to your question, please contact us using the 'Contact Us' page on our website.</p>
        </details>
        <details>
            <summary>How long do you take to reply when we use the 'Contact Us' form?</summary>
            <p>Please allow up to 24 hours and you should recieve a reply to your enquiry.</p>
        </details>
    </div>
</div>

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