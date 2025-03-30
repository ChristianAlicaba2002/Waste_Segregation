<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="Styles/AdminLogin.css">
    <link rel="icon" type="image/png" href="img/logo.png">
    <title>Admin Account</title>

</head>

<body>
    <a href="{{ route('view') }}" class="back-button">
        <i class="fas fa-circle-chevron-left"></i>
    </a>

    <div class="login-container">
    <div class="logo-container">
        <img src="{{ asset('img/logo.png') }}" alt="recycle logo">
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
                    <input type="password" id="password" name="password" required placeholder="Enter your password" autocomplete="off">
                    <i class="fa fa-eye toggle-icon" id="togglePassword"></i>
                </div>
            <button type="submit" class="btn">Log In</button>
        </form>
    </div>
    <script>
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
