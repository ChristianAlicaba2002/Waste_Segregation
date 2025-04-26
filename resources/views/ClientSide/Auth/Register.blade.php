<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/png" href="img/logo.png">
    <link rel="stylesheet" href="Styles/Register.css">
    <title>Segregation Trash Bin Register</title>
</head>

<body>
    <a href="{{ route('view') }}" class="back-button">
        <i class="fas fa-circle-chevron-left"></i>
    </a>


    <div class="page-container">
        <div class="left-section">
            <img src="{{ asset('img/trash.gif') }}">
            <h2>Segregation Mission</h2>
            <h2>Join Now!</h2>
        </div>
        <div class="register-container">
            <h1>Create an Account</h1>
            <form action="{{route('registerClient')}}" method="POST" id="SubmitForm">
                @csrf
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" required placeholder="Enter your first name" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" required placeholder="Enter your last name" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required placeholder="Enter your username" required>
                    @if (session('usernameExists'))
                    <label class="ErrorMessage" for="">{{ session('usernameExists') }}</label>
                    <script>
                        document.getElementById('username').style.border = '1px solid red'
                    </script>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password" autocomplete="off">
                    <i class="fa fa-eye toggle-icon" id="togglePassword"></i>
                    @if(session('passlengthrequired'))
                    <label class="ErrorMessage" for="">{{ session('passlengthrequired') }}</label>
                    <script>
                        document.getElementById('password').style.border = '1px solid red';
                    </script>
                    @endif
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm your password">
                    <i class="fa fa-eye toggle-icon" id="toggleConfirmPassword"></i>
                    @if(session('passwordMismatch'))
                    <label class="ErrorMessage" for="">{{ session('passwordMismatch') }}</label>
                    <script>
                        document.getElementById('confirm_password').style.border = '1px solid red';
                    </script>
                    @endif
                </div>

                <button type="submit" class="btn">Register</button>
            </form>
            <a href="{{ route('loginPage') }}" class="login-link">Already have an account? Login here</a>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function setupPasswordToggle(inputId, toggleId) {
                const passwordInput = document.getElementById(inputId);
                const toggleIcon = document.getElementById(toggleId);

                passwordInput.addEventListener("input", function() {
                    toggleIcon.style.display = this.value.length > 0 ? "block" : "none";
                });

                toggleIcon.addEventListener("click", function() {
                    if (passwordInput.type === "password") {
                        passwordInput.type = "text";
                        toggleIcon.classList.replace("fa-eye", "fa-eye-slash");
                    } else {
                        passwordInput.type = "password";
                        toggleIcon.classList.replace("fa-eye-slash", "fa-eye");
                    }
                });
            }

            setupPasswordToggle("password", "togglePassword");
            setupPasswordToggle("confirm_password", "toggleConfirmPassword");
        });
    </script>
</body>

</html>