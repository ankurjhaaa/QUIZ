<?php include_once "config/db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        /* Full Page Background */
        body {
            background: url('https://picsum.photos/1920/1080') no-repeat center center/cover;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding-top: 70px;
        }

        

        .signup-container {
            width: 100%;
            max-width: 420px;
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

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 991px) {
            .signup-container {
                position: static;
                transform: none;
                margin: 20px auto;
            }
        }
    </style>
</head>

<body>

    <?php include_once "includes/navbar.php" ?>

    

    <!-- Signup Form -->
    <div class="signup-container">
        <h3 class="text-center mb-4">Sign in</h3>
        <form method="POST" >
            
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign in</button>
            <a href="signup.php">Signup</a>
        </form>
    </div>

</body>

</html>