<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.location.href='../login.php';</script>";
}
?>
<!-- Admin Navbar -->
<nav class="navbar navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="http://localhost/QUIZ/admin">Admin Quiz</a>
    <a href="logout.php" class="btn btn-danger">Logout</a>
</nav>