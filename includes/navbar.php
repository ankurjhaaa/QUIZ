<?php
// if (isset($_SESSION['user'])) {
//     // $user = getUser();
// }
?>
<style>
    /* Navbar */
    .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        background: rgba(56, 56, 56, 0.8);
        padding: 12px 0;
    }

    .navbar-brand {
        font-size: 24px;
        font-weight: bold;
        color: white;
    }

    .btn-signin {
        background: #fff;
        color: black;
        border-radius: 5px;
        padding: 6px 15px;
    }

    .btn-signin:hover {
        background: #f1f1f1;
    }

    /* Button Styling */
    .btn-signin {
        /* background: linear-gradient(45deg, #007bff, #6610f2); */
        background: white;
        /* Gradient Background */
        color: black;
        border-radius: 25px;
        padding: 8px 15px;
        transition: 0.3s ease-in-out;
    }

    .btn-signin:hover {
        /* background: linear-gradient(45deg, #0056b3, #4e0ba3); */
        background: gray;
        transform: scale(1.05);
    }

    /* Profile Image */
    .user-img {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid white;
    }

    /* Dropdown Menu Styling */
    .dropdown-menu {
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        animation: fadeIn 0.3s ease-in-out;
    }

    /* Hover Effects */
    .dropdown-item {
        padding: 10px 15px;
        transition: all 0.3s ease-in-out;
        font-weight: 500;
    }

    .dropdown-item:hover {
        background: rgba(0, 123, 255, 0.2);
        color: rgb(28, 31, 34);
        transform: translateX(5px);
    }

    /* Logout Button Effect */
    .dropdown-item.text-danger:hover {
        background: rgba(255, 0, 0, 0.2);
        color: red;
    }

    /* Smooth Dropdown Animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
<!-- Navbar -->
<nav class="navbar navbar-dark">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a class="navbar-brand ms-3" href="index.php">QUIZ</a>

        <?php
        if (isset($_SESSION['email'])) { ?>
            <?php
            $username = $_SESSION['email'];
            $call_name = mysqli_query($connect, "SELECT * FROM user WHERE email='$username'");
            $user_detail = mysqli_fetch_assoc($call_name);
            $user_dp = $user_detail['dp'];

            if ($user_dp == "") {
                $user_dp = "dp/user_blank_profile.webp";
            }
            ?>
            <a href="#" class="btn btn-signin me-3 dropdown-toggle d-flex align-items-center" id="userDropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?= $user_dp ?>" alt="User" class="rounded-circle me-2 user-img">
                <span>Hi, <strong><?= $user_detail['first_name'] ?></strong></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="profile.php">👤 Profile</a></li>
                <li><a class="dropdown-item" href="home.php">🏠 Home</a></li>
                <li><a class="dropdown-item" href="settings.php">⚙️ Settings</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item text-danger" href="logout.php">🚪 Logout</a></li>
            </ul>

        <?php } else { ?>
            <a href="login.php" class="btn btn-signin me-3">
                <i class="bi bi-person"></i> Sign In
            </a>
        <?php } ?>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>