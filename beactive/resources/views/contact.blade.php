<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <title>Contact Page</title> 
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
  <style>
    #dark-mode-toggle {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      cursor: pointer;
      background: none;
      border: none;
      font-size: 1.5rem;
    }
    #main-header {
      position: relative;
    }
  </style>
</head>
<body> 
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
  <div class="contact-container">
    <div class="centerform">
      <h1><b>Contact Us</b></h1>
      <p><i>Please use the form below to get in touch with us:</i></p>
      <form id="contactForm" onsubmit="return handleFormSubmit(event)">
        <br>
        <input type="text" name="Name" id="name" placeholder="Name" required/><br>
        <br>
        <input type="email" name="Email" id="email" placeholder="Email" required/><br>
        <br>
        <input type="confirm_email" name="confirm_email" id="confirm_email" placeholder="Confirm Email" required/><br>
        <br>
        <input type="phone" name="Phone Number" id="phoneno" placeholder="Phone Number" required/><br>
        <br><br>
        <label>
          Your Enquiry <br><br>
          <textarea name="Enquiry" id="enquiry" rows="4" cols="40"></textarea>
        </label>
        <br>
        <div class="submit">
          <br>
          <input type="submit" value="Submit">
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
        </div>
      </div>
      <div class="beactivefooter">
        <p>beActive - 2024</p>
      </div>
    </div>
  </footer>
  <script>
    function handleFormSubmit(event) {
      event.preventDefault();
      var name = document.getElementById('name').value;
      var email = document.getElementById('email').value;
      var confirmEmail = document.getElementById('confirm_email').value;
      var phone = document.getElementById('phoneno').value;
      var enquiry = document.getElementById('enquiry').value;
      if (email !== confirmEmail) {
        alert("The email addresses do not match!");
        return;
      }
      var message = `Name: ${name}\nEmail: ${email}\nPhone: ${phone}\nEnquiry: ${enquiry}\n\nDo you want to email your enquiry?`;
      var userConfirmation = confirm(message);
      if (userConfirmation) {
        alert("Thank you for your message. It has been received by our team at beActive!");
        document.getElementById('contactForm').reset(); 
      } else {
        alert("Your message has not been sent. Feel free to send us any enquiries you may have!");
      }
    }

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
      if (darkModeToggle) {
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
      }
    });
  </script>
</body>
</html>
