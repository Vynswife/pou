<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">
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
            max-width: 400px; /* Set a max width for the card */
            width: 100%; /* Make sure it uses full width up to the max width */
            border: none; /* Remove border if needed */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional shadow */
            margin: auto; /* Center the card horizontally */
        }

        .card-body {
            padding: 2rem; /* Padding inside the card */
        }

        .form-control {
            border-radius: 0.35rem; /* Slightly rounded corners */
        }

        .btn-primary {
            border-radius: 0.35rem; /* Match button corners with input fields */
        }

        .login-form__btn {
            margin-top: 1rem; /* Spacing between button and form elements */
        }

        /* Center content vertically and horizontally */
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Full viewport height */
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

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="mt-5 mb-5 login-input" action="<?= base_url('home/aksi_t_register') ?>" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label for="yourUsername" class="form-label">Username</label>
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Your name" name="nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label for="yourUsername" class="form-label">Jenis kelamin</label>
                                        <select class="form-control" name="jk">
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label for="yourUsername" class="form-label">Password</label>
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="pass">
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100">Create an account</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="http://localhost:8080/home/login">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
    <script src
