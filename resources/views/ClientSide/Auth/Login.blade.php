<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="Styles/Login.css">
    <link rel="icon" type="image/png" href="img/logo.png">
    <title>Segregation Trash Bin Log In</title>
</head>

<body>
    <a href="{{ route('view') }}" class="back-button" aria-label="Go back">
        <i class="fas fa-circle-chevron-left"></i>
    </a>

    <div class="alert-container">
        @if (session('success'))
            <div class="alert alert-success" id="successAlert">
                <i class="bi bi-check-circle alert-icon"></i>
                <span><?php session('error')?></span>
            </div>
        @endif
    </div>

    <div class="alert-container">
        @if (session('success'))
            <div class="alert alert-success" id="successAlert">
                <i class="bi bi-check-circle alert-icon"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif
    </div>

    <div class="alert-container">
        @if (session('error'))
            <div class="alert alert-danger" id="successAlert">
                <i class="bi bi-check-circle alert-icon"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif
    </div>

    <div class="page-container">
        <div class="left-section">
            <img src="{{ asset('img/ecoshield.gif') }}">
            <h2>Segregation Trash Bin System</h2>
            <p>Your contribution matters! Log in now to join our mission for a cleaner, greener planet—because every step counts toward a sustainable future. 🌍</p>
        </div>
        <div class="login-container">
            <div class="eco-icon">♻️</div>
            <h1>Welcome Back!</h1>
            <form action="/LoginClient" id="formAction" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" id="username" name="username" required placeholder="Enter your username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password" autocomplete="off">
                    <i class="fa fa-eye toggle-icon" id="togglePassword"></i>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
            <a href="{{ route('registerPage') }}" class="register-link">Don't have an account? Register here</a>
        </div>
    </div>

    <script>
        // document.getElementById('formAction').addEventListener('submit', (e)=> {
        //     e.preventDefault()

        //     // document.getElementById('formAction').action = '/LoginClient'
        //     username = document.getElementById('username')
        //     password = document.getElementById('password')

        //     if(username.value !== '' || !password.value == '')
        //     {    

        //     }
        //     else if(username.value == '' || password.value == '')
        //     {
        //         alert('input all fields')
        //     }


        // })



         setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.animation = 'slideOut 0.5s ease-out forwards';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);

        const passwordInput = document.getElementById("password");
        const toggleIcon = document.getElementById("togglePassword");

        passwordInput.addEventListener("input", function () {
    if (this.value.length > 0) {
        toggleIcon.style.display = "block";
    } else {
        toggleIcon.style.display = "none";
    }
});

        toggleIcon.addEventListener("click", function () {
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.classList.replace("fa-eye", "fa-eye-slash");
    } else {
        passwordInput.type = "password";
        toggleIcon.classList.replace("fa-eye-slash", "fa-eye");
    }
});
    </script>
</body>
</html>
