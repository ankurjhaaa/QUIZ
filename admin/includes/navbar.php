<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.location.href='../login.php';</script>";
}
?>
<!-- Admin Navbar -->
<nav class="navbar navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="../../../QUIZ/admin/index.php">Admin Quiz</a>
    <a href="../../../QUIZ/admin/logout.php" class="btn btn-danger">Logout</a>
</nav>