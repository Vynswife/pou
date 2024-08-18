<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        /* Gradient Background */
        body.bg-gradient-primary {
            background: linear-gradient(135deg, #f5a6b5, #a0d8ef, #b8e5d3);
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 0%;
            }

            50% {
                background-position: 100% 100%;
            }

            100% {
                background-position: 0% 0%;
            }
        }

        /* Center the card */
        .card {
            max-width: 400px;
            width: 100%;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: auto;
        }

        .card-body {
            padding: 2rem;
        }

        .form-control {
            border-radius: 0.35rem;
        }

        .btn-primary {
            border-radius: 0.35rem;
        }

        .login-form__btn {
            margin-top: 1rem;
        }

        /* Center content vertically and horizontally */
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .row {
            display: flex;
            justify-content: center;
            width: 100%;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form id="myForm" class="" novalidate action="<?= base_url('home/aksi_login') ?>" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Username" name="username" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="password" class="form-control" placeholder="Password" name="pw" id="password" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" onclick="togglePasswordVisibility()" style="cursor: pointer;">
                                                        <i id="toggleEye" class="fa fa-eye"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="recaptcha-container" class="g-recaptcha" data-sitekey="6Lc4hyAqAAAAAII6iyuoLStoTtQFhP4_FKGMl_R_"></div>
                                        
                                        <!-- Offline CAPTCHA -->
                                        <div id="offline-captcha" class="form-group" style="display:none;">
                                            <label for="captcha">Solve this: <span id="captcha-equation"></span></label>
                                            <input type="text" class="form-control" id="captchaAnswer" placeholder="Enter your answer" required>
                                        </div>

                                        <br />
                                        <button class="btn login-form__btn submit w-100 btn btn-primary">Log In</button>
                                        <hr>
                                    </form>
                                    <hr>

                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('home/register') ?>">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('js/sb-admin-2.min.js') ?>"></script>

    <script>
        document.getElementById('myForm').addEventListener('submit', function (event) {
            var recaptchaContainer = document.getElementById('recaptcha-container');
            var offlineCaptchaContainer = document.getElementById('offline-captcha');

            if (recaptchaContainer.style.display !== 'none') {
                // Online reCAPTCHA check
                var response = grecaptcha.getResponse();
                if (response.length === 0) {
                    alert("Please complete the reCAPTCHA.");
                    event.preventDefault();
                }
            } else {
                // Offline CAPTCHA check
                var answer = parseInt(document.getElementById('captchaAnswer').value);
                if (isNaN(answer) || answer !== window.captchaResult) {
                    alert("Incorrect answer to the math problem.");
                    event.preventDefault();
                }
            }
        });

        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var toggleEye = document.getElementById('toggleEye');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleEye.classList.remove('fa-eye');
                toggleEye.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleEye.classList.remove('fa-eye-slash');
                toggleEye.classList.add('fa-eye');
            }
        }

        function setupOfflineCaptcha() {
            var num1 = Math.floor(Math.random() * 10);
            var num2 = Math.floor(Math.random() * 10);
            window.captchaResult = num1 + num2;
            document.getElementById('captcha-equation').innerText = num1 + " + " + num2 + " = ?";
        }

        window.onload = function () {
    var recaptchaContainer = document.getElementById('recaptcha-container');
    var offlineCaptchaContainer = document.getElementById('offline-captcha');

    // Check if Google reCAPTCHA has been loaded after a short delay
    setTimeout(function () {
        // If Google reCAPTCHA has not been initialized or there's no internet
        if (typeof grecaptcha === 'undefined' || !navigator.onLine) {
            // Hide reCAPTCHA and show offline CAPTCHA
            recaptchaContainer.style.display = 'none';
            offlineCaptchaContainer.style.display = 'block';
            setupOfflineCaptcha();
        } else {
            // reCAPTCHA is available
            recaptchaContainer.style.display = 'block';
            offlineCaptchaContainer.style.display = 'none';
        }
    }, 3000); // Wait 3 seconds to ensure reCAPTCHA loads
};

    </script>

</body>

</html>
