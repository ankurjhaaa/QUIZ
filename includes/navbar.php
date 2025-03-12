<style>
    /* Navbar */
    .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background: rgba(0, 0, 0, 0.8);
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
</style>
<!-- Navbar -->
<nav class="navbar navbar-dark">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a class="navbar-brand ms-3" href="">QUIZ</a>
            <a href="login.php" class="btn btn-signin me-3">
                <i class="bi bi-person"></i> Sign In
            </a>
        </div>
    </nav>
