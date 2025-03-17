<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waste Segregation</title>
    <link rel="shortcut icon" href="{{ asset('img/finallogo.png') }}" type="image/png">

    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: white;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(to right,rgb(75, 202, 84),rgb(157, 248, 162));
            padding: 1.2rem 2.5rem;
            color: white;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar .menu {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .navbar .menu a {
            position: relative;
            text-decoration: none;
            color: white;
            font-weight: 500;
            padding: 0.8rem 1.2rem;
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 0;
        }

        .navbar .menu a:not(.logo-link)::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 5px;
            left: 50%;
            background-color: white;
            transform: translateX(-50%);
            transition: width 0.3s ease;
        }

        .navbar .menu a:not(.logo-link):hover {
            color: #ffffff;
        }

        .navbar .menu a:not(.logo-link):hover::after {
            width: 80%;
        }

        .navbar .menu img {
            display: block;
            margin: auto 0;
        }

        .navbar .btn-signin {
            background-color: rgba(255, 255, 255, 0.2);
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
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
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

        .auth-buttons {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .navbar .menu .logo-link {
            padding: 0;
            background: none;
            border-radius: 0;
        }

        .navbar .menu .logo-link:hover {
            background: none;
            transform: none;
            box-shadow: none;
        }

        .btn-admin {
            background-color: rgba(255, 255, 255, 0.2);
            border: 2px solid #66bb6a;
            padding: 0.8rem 1.5rem;
            border-radius: 25px;
            color: #66bb6a;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 1rem;
        }

        .btn-admin:hover {
            background-color: #66bb6a;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-decoration: none;
        }

    </style>
</head>
<body>

    <nav class="navbar">
        <div class="menu">
            <a href="{{ route('view') }}" class="logo-link">
                <img src="{{ asset('img/finallogo.png') }}" alt="recycle logo" style="width: 60px; height: 60px; margin-right: 15px;">
            </a>
            <a href="#home">Home</a>
            <a href="#about-us">About Us</a>
            <a href="#mission">Mission</a>
            <a href="#objectives">Objectives</a>
            <a href="#product-showcase">Product Showcase</a>
            <a href="#contact-us">Contact Us</a>
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
        <h1>Waste Management Statistics</h1>
        <div class="cards-container">
            <div class="card">
                <i class="fas fa-newspaper"></i>
                <h3>Paper Items</h3>
                <div class="stat">800</div>
            </div>
            <div class="card">
                <i class="fas fa-wine-bottle"></i>
                <h3>Plastic Items</h3>
                <div class="stat">800</div>
            </div>
            <div class="card">
                <i class="fas fa-cog"></i>
                <h3>Metal Items</h3>
                <div class="stat">800</div>
            </div>
        </div>
    </section>

    <section id="about-us" class="section">
        <h1>About Us</h1>
        <p>temporary pa ni ha</p>
        <a href="{{ route('adminLogin') }}" class="btn-admin">ADMIN</a>
    </section>

    <section id="mission" class="section">
        <h1>Our Mission</h1>
        <p>wala</p>
    </section>

    <section id="objectives" class="section">
        <h1>Our Objectives</h1>
        <p>wala sa</p>
    </section>

    <section id="product-showcase" class="section">
        <h1>Product Showcase</h1>
        <p>empty</p>
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
