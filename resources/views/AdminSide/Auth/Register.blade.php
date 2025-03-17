<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waste Segregation Register</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .page-container {
            display: flex;
            width: 80%;
            max-width: 1000px;
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
        }

        .left-section img {
            width: 80%;
            max-width: 300px;
            margin-bottom: 2rem;
        }

        .left-section h2 {
            font-size: 1.8rem;
            color: #1b5e20;
        }

        .register-container {
            flex: 1;
            padding: 3rem;
            text-align: center;
        }
        .register-container h1{
            color: #2e7d32;
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
            background-color: rgb(66, 173, 73);
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

        .login-link {
            margin-top: 1.5rem;
            display: block;
            color: #2e7d32;
            text-decoration: none;
        }

        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="page-container">
        <div class="left-section">
            <img src="{{ asset('img/trash.gif') }}">
            <h2>Waste Segregation Mission</h2>
            <h2>Join Now!</h2>
        </div>
        <div class="register-container">
            <h1>Create an Account</h1>
            <form action="{{ route('registerPage') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required placeholder="Enter your username">
                </div>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" required placeholder="Enter your first name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" required placeholder="Enter your last name">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm your password">
                </div>
                <button type="submit" class="btn">Register</button>
            </form>
            <a href="{{ route('loginPage') }}" class="login-link">Already have an account? Login here</a>
        </div>
    </div>
</body>
</html>
