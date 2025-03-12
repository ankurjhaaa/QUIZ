<?php include_once "../config/db.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Full Page Background */
        body {
            background: url('https://picsum.photos/1920/1080') no-repeat center center/cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Login Container */
        .login-container {
            width: 100%;
            max-width: 400px;
            background: rgba(255, 255, 255, 0.85);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            position: fixed;
            right: 5%;
            top: 50%;
            transform: translateY(-50%);
            /* animation: fadeIn 1s ease-in-out; */
        }

        /* Fade-in Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Center Form in Mobile */
        @media (max-width: 991px) {
            .login-container {
                position: static;
                transform: none;
                margin: 20px auto;
            }
        }
    </style>
</head>
<body>

    <!-- Login Form -->
    <div class="login-container">
        <h3 class="text-center mb-4">Login</h3>
        <form method="POST" >
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
        </form>
        <?php
            if(isset($_POST['login'])){
                $email = $_POST['email'];
                $_SESSION['admin_email'] = $email;
                $password = $_POST['password'];
                // $insert = mysqli_query($connect,"INSERT INTO ADMIN (email,password) VALUE ('$email','$password')");
                $check_data = mysqli_query($connect,"SELECT * FROM admin where email='$email' AND password='$password'");
                $count = mysqli_num_rows($check_data);
                if($count == 1){
                echo "<script>window.location.href='index.php';</script>";

                }
            }

        ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
