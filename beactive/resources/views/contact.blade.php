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
    <meta charset="UTF-8"/>
    <title>Contact Page</title> 
    <link rel = "stylesheet"  type="text/css" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <div id="customAlert" class="custom-alert hidden">
        <div class="custom-alert-content">
            <p id="alertMessage"></p>
            <button id="alertOkButton">OK</button>
        </div>
    </div>
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
                <li><a id="contact" a href="{{ route('contact') }}">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <div class = "contact-container">
        <div class = "centerform" >
        <h1><b>Contact Us</h1></b>
        <p><i>Please use the form below to get in touch with us:</p></i>

            <!--The input fields for the form-->
            <form id="contactForm" onsubmit="return handleFormSubmit(event)">
                <br><input type ="text" name="Name" id="name" placeholder="Name" required/><br>
                <br><input type="email" name="Email" id="email"  placeholder="Email" required/><br>
                <br><input type="confirm_email" name="confirm_email" id="confirm_email" placeholder="Confirm Email" required/><br>
                <br><input type="phone" name="Phone Number" id="phoneno" placeholder="Phone Number" required/><br>
                    
                <br>
                <br>
                <label> Your Enquiry </br> </br>
                    <textarea name="Enquiry" id="enquiry" rows= "4"cols="40"> </textarea>
                </label>
                <br>

                <div class = "submit">
                    <br> <input type= "submit" value ="Submit">
                </div>

            </form>   
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
                                    <button type="submit" style="border: none; background: none; color: inherit; font: inherit; cursor: pointer; padding: 0;">
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
    function showCustomAlert(message, isConfirm = false) {
        document.getElementById('alertMessage').textContent = message;
        document.getElementById('customAlert').classList.remove('hidden');

        return new Promise((resolve) => {
            document.getElementById('alertOkButton').onclick = function () {
                document.getElementById('customAlert').classList.add('hidden');
                resolve(true); 
            };


            if (isConfirm) {
                if (!document.getElementById('alertCancelButton')) {
                    const cancelButton = document.createElement('button');
                    cancelButton.id = 'alertCancelButton';
                    cancelButton.textContent = 'Cancel';
                    document.querySelector('.custom-alert-content').appendChild(cancelButton);
                }

                document.getElementById('alertCancelButton').onclick = function () {
                    document.getElementById('customAlert').classList.add('hidden');
                    resolve(false); 
                };
            } else {
                const cancelButton = document.getElementById('alertCancelButton');
                if (cancelButton) {
                    cancelButton.remove();
                }
            }
        });
    }

    async function handleFormSubmit(event) {
        event.preventDefault();


        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var confirmEmail = document.getElementById('confirm_email').value;
        var phone = document.getElementById('phoneno').value;
        var enquiry = document.getElementById('enquiry').value;


        if (email !== confirmEmail) {
            await showCustomAlert("The email addresses do not match!");
            return;
        }

        var message = `Name: ${name}\nEmail: ${email}\nPhone: ${phone}\nEnquiry: ${enquiry}\n\nDo you want to email your enquiry?`;

        var userConfirmation = await showCustomAlert(message, true);

        if (userConfirmation) {
            await showCustomAlert("Thank you for your message. It has been received by our team at beActive!");
            document.getElementById('contactForm').reset();
        } else {
            await showCustomAlert("Your message has not been sent. Feel free to send us any enquiries you may have!");
        }
    }

    document.getElementById('contactForm').addEventListener('submit', handleFormSubmit);

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
 
