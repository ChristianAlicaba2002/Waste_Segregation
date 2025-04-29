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
            <img src="img/lines.png" alt="Menu">
        </label>

        <div class="menu">
            <a href="#home">Home</a>
            <a href="#about-us">About Us</a>
            <a href="#product-showcase">Product Showcase</a>
            <a href="#contact-us">Contact Us</a>
        </div>
    </nav>

    <section class="welcome-section">
    <h1 class="welcome-title">Welcome to TrashBinnie</h1>
    <h2 class="welcome-subtitle">Improving household through the process of proper segregation.</h2>
    <a href="{{ route('registerPage') }}" class="btn-signin">Sign Up</a>
    </section>

    <section class="home-section" id="home">
        @php
            $categories = DB::connection('mysql_waste_admin')->table('waste_disposal_record')->get();
            $paperCount = $categories->where('category_name', 'Paper')->count();
            $plasticCount = $categories->where('category_name', 'Plastic')->count();
            $metalCount = $categories->where('category_name', 'Metal')->count();
        @endphp

        <div class="cards-container">
            <div class="left-section">
                <h1>TrashBinnie Statistics</h1>
            </div>
            @if($categories->count() > 0)
                <div class="card">
                    <i class="fas fa-newspaper"></i>
                    <div class="stat">{{ number_format($paperCount) }}</div>
                    <h3>Paper Items</h3>
                </div>
                <div class="card">
                    <i class="fas fa-wine-bottle"></i>
                    <div class="stat">{{ number_format($plasticCount) }}</div>
                    <h3>Plastic Items</h3>
                </div>
                <div class="card">
                    <i class="fas fa-cog"></i>
                    <div class="stat">{{ number_format($metalCount) }}</div>
                    <h3>Metal Items</h3>
                </div>
            @else
                <div class="card">
                    <i class="fas fa-newspaper"></i>
                    <div class="stat">0</div>
                    <h3>Paper Items</h3>
                </div>
                <div class="card">
                    <i class="fas fa-wine-bottle"></i>
                    <div class="stat">0</div>
                    <h3>Plastic Items</h3>
                </div>
                <div class="card">
                    <i class="fas fa-cog"></i>
                    <div class="stat">0</div>
                    <h3>Metal Items</h3>
                </div>
            @endif
        </div>
    </section>

    <section class="about-us-section" id="about-us">
        <div class="mvv-card">
            <img src="img/mission.png" alt="Mission">
            <h1>Mission</h1>
            <p>To improve our ecosystem and help out our environment through proper segregation and festering a cleaner and efficient usage of garbage,
                we can ensure a healthier and greener tomorrow.
            </p>
        </div>
        <div class="mvv-card">
            <img src="img/vision.png" alt="Vision">
            <h1>Vision</h1>
            <p>To build a world where waste can be extracted, utilized, and sustained; a world where recycling is no longer a nightmare hindered by inseparable clumps of garbage;
                a greener field nurtured by those who came before; and factories where every single mineral serves a meaningful purpose.</p>
        </div>
    </section>


    <section class="product-section" id="product-showcase">

    </section>


    @if(session('success'))
        <script>alert("{{session('success')}}")</script>
    @endif


    @if(session('error'))
        <script>alert("{{session('error')}}")</script>
    @endif

    <section  class="contact-section" id="contact-us">
        <div class="contact-container">
            <img src="img/vase.jpg" alt="">
            <form action="{{route('sendfeedback')}}" class="contact-form" method="post">
                @csrf
                @method("POST")
                <div class="row">
                    <div class="form-group">
                        <input type="text" name="first_name" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="last_name" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group full-width">
                        <input type="email" name="username" placeholder="Your Email" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group full-width">
                        <textarea name="message" placeholder="Your Message" required></textarea>
                    </div>
                </div>
                <div class="row center-button">
                    <button type="submit">Submit</button>
                </div>
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
