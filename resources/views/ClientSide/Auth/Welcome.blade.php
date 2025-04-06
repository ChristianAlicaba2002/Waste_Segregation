<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/png" href="img/logo.png">
    <link rel="stylesheet" href="Styles/Welcome.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <title>Segregation Trash Bin</title>
</head>
<body>

<nav class="navbar">
    <a href="#" class="logo-link">
        <img src="{{ asset('img/logo.png') }}" alt="Logo">
        TrashBinnie
    </a>
    <div class="menu">
        <a href="#home" class="{{ request()->is('#home') ? 'active' : '' }}">Home</a>
        <a href="#about-us" class="{{ request()->is('#about-us') ? 'active' : '' }}">About Us</a>
        <a href="#product-showcase" class="{{ request()->is('#product-showcase') ? 'active' : '' }}">Product Showcase</a>
        <a href="#contact-us" class="{{ request()->is('#contact-us') ? 'active' : '' }}">Contact Us</a>
    </div>
    <div class="auth-buttons">
        <a href="{{ route('loginPage') }}" class="btn-signin">Sign In</a>
        <a href="{{ route('registerPage') }}" class="btn-signin">Sign Up</a>
    </div>
</nav>

    <div class="content">
            <div class="main-slogan">
                <h1>Turning waste into wonder---</h1>
                <h5>automatically sorting metal, plastic, and paper for a cleaner, greener tomorrow!    </div>
    </div>

    <section id="home" class="section">
        <h1>Segregation Trash Bin Statistics</h1>

        @php
            $categories = DB::connection('mysql_waste_admin')->table('waste_category')->get();
            $paperCount = $categories->where('category_name', 'Paper')->count();
            $plasticCount = $categories->where('category_name', 'Plastic')->count();
            $metalCount = $categories->where('category_name', 'Metal')->count();
        @endphp

        <div class="cards-container">
            @if($categories->count() > 0)
                <div class="card">
                    <i class="fas fa-newspaper"></i>
                    <h3>Paper Items</h3>
                    <div class="stat">{{ number_format($paperCount) }}</div>
                </div>
                <div class="card">
                    <i class="fas fa-wine-bottle"></i>
                    <h3>Plastic Items</h3>
                    <div class="stat">{{ number_format($plasticCount) }}</div>
                </div>
                <div class="card">
                    <i class="fas fa-cog"></i>
                    <h3>Metal Items</h3>
                    <div class="stat">{{ number_format($metalCount) }}</div>
                </div>
            @else
                <div class="card">
                    <i class="fas fa-newspaper"></i>
                    <h3>Paper Items</h3>
                    <div class="stat">0</div>
                </div>
                <div class="card">
                    <i class="fas fa-wine-bottle"></i>
                    <h3>Plastic Items</h3>
                    <div class="stat">0</div>
                </div>
                <div class="card">
                    <i class="fas fa-cog"></i>
                    <h3>Metal Items</h3>
                    <div class="stat">0</div>
                </div>
            @endif
        </div>
    </section>

    <section id="about-us" class="section">
        <h1>Mission and Objective</h1>
        <video autoplay muted loop id="background-video">
        <source src="/img/video.mp4" type="video/mp4">
    </video>

    </section>

    <section id="product-showcase" class="section">
        <h1>Product Showcase</h1>
    </section>

    <section id="contact-us" class="section">
    <h1>Need Support?</h1>
    <p>Contact us if u need assistance.</p>
    <div class="contact-container">
  <form class="contact-form">
    <div class="row">
      <div class="form-group">
        <input type="text" placeholder="First Name" required>
      </div>
      <div class="form-group">
        <input type="text" placeholder="Last Name" required>
      </div>
    </div>
    <div class="row">
      <div class="form-group full-width">
        <input type="email" placeholder="Your Email" required>
      </div>
    </div>
    <div class="row">
      <div class="form-group full-width">
        <textarea placeholder="Your Message" required></textarea>
      </div>
    </div>
    <div class="row center-button">
      <button type="submit">Submit</button>
    </div>
  </form>
</div>


    </div>
</section>


</body>
</html>
