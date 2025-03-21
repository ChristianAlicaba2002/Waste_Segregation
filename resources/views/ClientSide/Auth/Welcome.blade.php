<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segregation Trash Bin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #f0f7f0 0%, #e8f5e9 100%);
        }
        html{
            scroll-behavior: smooth;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(to right,rgb(44, 197, 54),rgb(173, 235, 176));
            padding: 0.8rem 2rem;
            color: white;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar .menu {
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 1;
            gap: 3rem;
            margin-left: 50px;
        }

        .navbar .menu a {
            position: relative;
            text-decoration: none;
            color: white;
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
            text-align: center;
        }

        .navbar .menu a:hover {
            background: none;
            box-shadow: none;
            transform: none;
        }

        .navbar .menu a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: white;
            transition: width 0.3s ease;
        }

        .navbar .menu a:hover::after {
            width: 100%;
        }

        .navbar .btn-signin {
            background-color: rgba(255, 255, 255, 0.26);
            border: 2px solid white;
            padding: 0.8rem 1.5rem;
            border-radius: 25px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;

        }

        .navbar .btn-signin:hover {
            background-color: white;
            color: #66bb6a;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(124, 245, 124, 0.75);
            text-decoration: none;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
            text-align: center;
            color: #2e7d32;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .content::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: url('img/earth.jpg');
            opacity: 5;
            background-repeat:repeat;
            opacity: 0.1;
            z-index: -1;
        }

        .slogan-container {
            max-width: 800px;
            animation: fadeIn 1.5s ease-out;
        }

        .main-slogan {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, #2e7d32, #66bb6a);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .sub-slogan {
            font-size: 1.5rem;
            color: #4caf50;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, #2e7d32, #66bb6a);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: fadeIn 1.5s ease-out;
        }

        p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 1rem auto;
            line-height: 1.6;
            color: #4caf50;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section {
            min-height: 100vh;
            padding: 80px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .section p {
            text-align: center;
            margin: 0 auto;
        }

        .cards-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 50px;
        }

        .card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            width: 300px;
            text-align: center;
            box-shadow: 0 10px 20px rgba(68, 219, 113, 0.65);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card i {
            font-size: 3rem;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #74d47a, #66bb6a);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .card h3 {
            color: #2e7d32;
            margin-bottom: 15px;
            font-size: 1.5rem;
        }

        .card .stat {
            font-size: 2rem;
            font-weight: bold;
            color: #66bb6a;
            margin: 10px 0;
        }

        .card p {
            color: #666;
            font-size: 1rem;
        }

        .contact-container {
            max-width: 600px;
            width: 100%;
            margin: 0 auto;
        }

        .contact-form {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(68, 219, 113, 0.2);
        }
        .active{
            background: rgba(255, 255, 255, 0.2);
            color: black;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.2);
        }

        .logo-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .logo-link:hover {
            transform: scale(1.1);
        }

        .logo-link img {
            margin-left: 1rem;
            width: 65px;
            height: 65px;
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
        }

        .section .btn-signin {
            background-color: rgba(255, 255, 255, 0.2);
            border: 2px solid #66bb6a;
            padding: 0.8rem 1.5rem;
            border-radius: 25px;
            color: #66bb6a;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .section .btn-signin:hover {
            background-color: #66bb6a;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>
<body>

    <nav class="navbar">
        <a href="#" class="logo-link">
            <img src="{{ asset('img/finallogo.png') }}" alt="Logo">
        </a>
        <div class="menu">
            <a href="#home" class="{{ request()->is('#home') ? 'active' : '' }}">Home</a>
            <a href="#about-us" class="{{ request()->is('#about-us') ? 'active' : '' }}">About Us</a>
            <a href="#mission" class="{{ request()->is('#mission') ? 'active' : '' }}">Mission</a>
            <a href="#objectives" class="{{ request()->is('#objectives') ? 'active' : '' }}">Objectives</a>
            <a href="#product-showcase" class="{{ request()->is('#product-showcase') ? 'active' : '' }}">Product Showcase</a>
            <a href="#contact-us" class="{{ request()->is('#contact-us') ? 'active' : '' }}">Contact Us</a>
        </div>
        <div class="auth-buttons">
            <a href="{{ route('loginPage') }}" class="btn-signin">Sign In</a>
            <a href="{{ route('registerPage') }}" class="btn-signin">Sign Up</a>
        </div>
    </nav>

    <div class="content">
        <div class="slogan-container">
            <h1 class="main-slogan">Segregate Today for a Greener Tomorrow</h1>
            <p class="sub-slogan">Join us in our mission to create a sustainable future through proper waste segregation.
            Every piece of paper, plastic, and metal sorted is a step towards environmental preservation.</p>
        </div>
    </div>

    <section id="home" class="section">
        <h1>Segregation Trash Bin Statistics</h1>

        @php
            $categories = DB::table('waste_disposal_record')->get();
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
                    <!-- number of items collected from database -->
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
                    <!-- number of items collected from database -->
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
        <h1>About Us</h1>
        <a href="{{ route('adminLogin') }}" class="btn-signin">ADMIN</a>
    </section>

    <section id="mission" class="section">
        <h1>Our Mission</h1>
    </section>

    <section id="objectives" class="section">
        <h1>Our Objectives</h1>
    </section>

    <section id="product-showcase" class="section">
        <h1>Product Showcase</h1>
    </section>

    <section id="contact-us" class="section">
        <h1>Contact Us</h1>
        <div class="contact-container">
            <form class="contact-form">
                    <p>asskja</p>
            </form>
    </section>

</body>
</html>
