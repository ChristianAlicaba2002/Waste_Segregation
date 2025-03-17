<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waste Segregation Login</title>
    <link rel="shortcut icon" href="{{ asset('img/finallogo.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    body {
        font-family: 'Arial', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color:white;
    }

    .page-container {
        display: flex;
        width: 80%;
        max-width: 1000px;
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(156, 233, 132, 0.55);
    }
    .page-container img{
        border: 1px solid white;
        border-radius: 100%;
        box-shadow: 2px 4px 10px rgba(182, 236, 166, 0.72);
    }
    .page-container h2, p{
        color:#1b5e20;
    }
    .left-section {
        flex: 1;
        background-color: white;
        padding: 2rem;
        border-radius: 15px 0 0 15px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border-right: 1px solid rgb(66, 173, 73);
    }

    .left-section img {
        width: 80%;
        max-width: 300px;
        margin-bottom: 2rem;
    }

    .left-section h2 {
        font-size: 1.8rem;
        margin-bottom: 1rem;
    }

    .left-section p {
        text-align: center;
        line-height: 1.6;
    }

    .login-container {
        flex: 1;
        padding: 3rem;
        text-align: center;
    }

    .back-button {
        position: absolute;
        top: 20px;
        left: 20px;
        color:rgb(106, 218, 111);
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 2rem;
        margin-left: 5rem;
        margin-top: 1.5rem;
        font-weight: bold;
    }

    .back-button:hover {
        color:rgba(18, 87, 23, 0.88);
    }

    h1 {
        color: #2e7d32;
        margin-bottom: 1.5rem;
    }

    .form-group {
        margin-bottom: 1rem;
        text-align: left;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        color: #2e7d32;
    }

    input {
        width: 100%;
        padding: 0.8rem;
        border: 1px solid #a5d6a7;
        border-radius: 5px;
        box-sizing: border-box;
    }

    input:focus {
        outline: none;
        border-color: #2e7d32;
    }

    .btn {
        font-size: medium;
        background-color:rgb(66, 173, 73);
        color: white;
        padding: 0.8rem 1.5rem;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        transition: background-color 0.3s;
        width: 40%;
    }

    .btn:hover {
        background-color: #2e7d32;
    }

    .register-link {
        margin-top: 1.5rem;
        display: block;
        color: #2e7d32;
        text-decoration: none;
    }

    .register-link:hover {
        text-decoration: underline;
    }

    .eco-icon {
        color: #2e7d32;
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .alert-container {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1000;
        width: 80%;
        max-width: 500px;
        text-align: center;
    }

    .alert-center {
        position: fixed;
        top: 15%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
        width: 80%;
        max-width: 400px;
        text-align: center;
    }

    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        animation: slideIn 0.5s ease-out;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    @keyframes slideIn {
        from {
            transform: translateY(-100%);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateY(0);
            opacity: 1;
        }

        to {
            transform: translateY(-100%);
            opacity: 0;
        }
    }
</style>
<body>
    <a href="{{ route('view') }}" class="back-button">
        <i class="fas fa-circle-chevron-left"></i>
    </a>

    <div class="alert-container">
        @if (session('success'))
            <div class="alert alert-success" id="successAlert">
                <i class="bi bi-check-circle alert-icon"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif
    </div>

    <div class="page-container">
        <div class="left-section">
            <img src="{{ asset('img/ecoshield.gif') }}">
            <h2>Waste Segregation System</h2>
            <p>Your contribution matters! Log in now to join our mission for a cleaner, greener planet—because every step counts toward a sustainable future. 🌍</p>
        </div>
        <div class="login-container">
            <div class="eco-icon">♻️</div>
            <h1>Welcome Back!</h1>
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" id="username" name="username" required placeholder="Enter your username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password">
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
            <a href="{{ route('registerPage') }}" class="register-link">Don't have an account? Register here</a>
        </div>
    </div>

    <script>
         setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.animation = 'slideOut 0.5s ease-out forwards';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    </script>
</body>
</html>