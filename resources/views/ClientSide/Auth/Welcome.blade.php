<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/IM_logo.png">
    <link rel="stylesheet" href="Styles/Welcome.css">
    <title>TrashBinnie</title>
</head>
<body>

    <nav class="navbar">
        <a href="#" class="logo-link">
            <img src="{{ asset('img/IM_logo.png') }}" alt="Logo">
            TrashBinnie
        </a>
        <input type="checkbox" id="menu-toggle" style="display: none;">
        <label for="menu-toggle" class="menu-toggle">
            <img src="img/lines.png" alt="Menu"></label>

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
            <h5>automatically sorting metal, plastic, and paper for a cleaner, greener tomorrow!</h5>
        </div>
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
        <div class="mission-vision-values">
            <div class="mission-section">
                <img src="img/mission.png" alt="Mission">
                <h1>Mission</h1>
                <p>To deploy intelligent, automated waste segregation systems that minimize landfill waste and promote a sustainable environment.</p>
            </div>
            <div class="vision-section">
                <img src="img/vision.png" alt="Vision">
                <h1>Vision</h1>
                <p>To establish a future where automated, efficient waste segregation is seamlessly integrated into urban environments globally.</p>
            </div>
            <div class="values-section">
                <img src="img/values.png" alt="Values">
                <h1>Values</h1>
                <p>To uphold environmental responsibility, innovation, and community well-being in the development and implementation of our automated trash segregation systems.</p>
            </div>
        </div>
    </section>

    <section id="product-showcase" class="section">
        <img src="img/recyc.gif" alt="" style="width: auto; height:10%">
    </section>

    <section id="contact-us" class="section">
        <h1>Need Support?</h1>
        <p>Contact us if u need assistance.</p>
        <div class="contact-container">
            <img src="img/vase.jpg" alt="">
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
    </section>
    <script>document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.navbar .menu');

    menuToggle.addEventListener('click', function() {
        menu.classList.toggle('active');
    });
});</script>
</body>
</html>
