<?php include_once "config/db.php"; ?>
<?php
    if(!isset($_SESSION['email'])){
        echo "<script>window.location.href='signup.php';</script>";

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz Signup</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        /* Full Page Background */
        body {
            /* background: url('https://picsum.photos/1920/1080') no-repeat center center/cover; */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding-top: 70px;
        }
    </style>
</head>

<body>

    <?php include_once "includes/navbar.php" ?>
    <?php include_once "includes/sub_nav.php" ?>


    

    

</body>

</html>