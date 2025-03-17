<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Account</title>
    <link rel="shortcut icon" href="{{ asset('img/finallogo.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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

    .login-container {
        background-color: white;
        padding: 3rem;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(176, 243, 156, 0.95);
        width: 100%;
        max-width: 400px;
        text-align: center;
    }

    .back-button {
        position: absolute;
        top: 20px;
        left: 20px;
        color: rgb(106, 218, 111);
        text-decoration: none;
        font-size: 2rem;
        margin-left: 2rem;
        margin-top: 1rem;
    }

    .back-button:hover {
        color: rgba(18, 87, 23, 0.88);
    }

    h1 {
        color:  rgba(176, 243, 156, 0.95);
        margin-bottom: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
        text-align: left;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        color:  rgba(18, 87, 23, 0.88);
        font-weight: bold;
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
        box-shadow:rgb(138, 255, 140);
    }

    .btn {
        font-size: medium;
        background-color: rgb(66, 173, 73);
        color: white;
        padding: 0.8rem 1.5rem;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 50%;
        font-weight: bold;
    }

    .btn:hover {
        background-color: #2e7d32;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .eco-icon {
        color: #2e7d32;
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .logo-container {
        margin-bottom: 20px;
    }

    .logo-container img {
        width: 80px;
        height: 80px;
        margin-right: 10px;
        animation: floatLogo 2s ease-in-out infinite;
        filter: drop-shadow(0 0 10px rgb(228, 255, 229))
               drop-shadow(0 0 20px rgb(194, 255, 196))
               drop-shadow(0 0 30px rgb(160, 255, 164));
    }

    .logo-container h1 {
        margin-top: 15px;
        color: #2e7d32;
    }

    @keyframes floatLogo {
        0% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
        100% {
            transform: translateY(0);
        }
    }

    .logo-container {
        animation: entrance 1s ease-out;
    }

    @keyframes entrance {
        0% {
            opacity: 0;
            transform: scale(0.3) rotate(-45deg);
        }
        50% {
            transform: scale(1.2) rotate(15deg);
        }
        100% {
            opacity: 1;
            transform: scale(1) rotate(0);
        }
    }
</style>
<body>
    <a href="{{ route('view') }}" class="back-button">
        <i class="fas fa-circle-chevron-left"></i>
    </a>

    <div class="login-container">
    <div class="logo-container">
        <img src="{{ asset('img/finallogo.png') }}" alt="recycle logo">
        <h1>ADMIN</h1>
    </div>
        <form action="{{ route('adminLogin') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="companyname">Company Name</label>
                <input type="text" id="companyname" name="companyname" required placeholder="Enter Company Name">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
            </div>
            <button type="submit" class="btn">Log In</button>
        </form>
    </div>
</body>
</html>