<?php include_once "../config/db.php"; ?>
<?php
if (!isset($_SESSION['email'])) {
    echo "<script>window.location.href='signup.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Profile</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f4f4;
            padding-top: 70px;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .profile-box {
            width: 100%;
            max-width: 450px;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .profile-box img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
            border: 3px solid #ddd;
        }

        .profile-box h2 {
            font-size: 22px;
            color: #333;
            margin-bottom: 5px;
        }

        .profile-box p {
            font-size: 14px;
            color: #777;
            margin-bottom: 10px;
        }

        .profile-info {
            text-align: left;
            font-size: 14px;
        }

        .profile-info div {
            padding: 10px 15px;
            border-radius: 6px;
            background: #f8f9fa;
            margin-bottom: 8px;
            display: flex;
            justify-content: space-between;
            font-weight: 500;
        }

        .profile-info div span {
            color: #555;
            font-weight: normal;
        }

        @media (max-width: 600px) {
            .profile-box {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

    <?php include_once "../includes/navbar.php"; ?>
    <?php
    $email = $_SESSION['email'];
    $call_user_detail = mysqli_query($connect, "SELECT * FROM user where email='$email'");
    $user = mysqli_fetch_assoc($call_user_detail);
    ?>

    <!-- Profile Box -->
    <div class="profile-box">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="profile-img-container" onclick="document.getElementById('fileInput').click();">
            <img id="profileImage" src="https://picsum.photos/150" alt="User Avatar">
            <input type="file" name="dp" id="fileInput" accept="image/*" style="display: none;">
            <input type="submit" name="profile" hidden>
        </div>
        </form>
        <?php
            if(isset($_POST['profile'])){
                $email = $_SESSION['email'];
                $image = $_FILES['dp']['name'];
                $tmp_image = $_FILES['dp']['tmp_name'];
                move_uploaded_file($tmp_image, "dp/$image");

                $insert_dp = mysqli_query($connect,"UPDATE user SET dp='$image' where email='$email'");
            }
        ?>
        <h2><?php echo ($user['first_name'] . ' ' . $user['last_name']); ?></h2>
        <p><?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'guest@example.com'; ?></p>

        <div class="profile-info">
            <div><strong>First Name:</strong> <span><?php echo ($user['first_name']); ?></span></div>
            <div><strong>Last Name:</strong> <span><?php echo ($user['last_name']); ?></span></div>
            <div><strong>Birthday:</strong> <span><?php echo ($user['dob']); ?></span></div>

            <div><strong>Mobile:</strong> <span><?php echo ($user['mobile']); ?></span></div>
            <div><strong>Address:</strong> <span><?php echo ($user['address']); ?></span></div>
            <div><strong>Gender:</strong> <span><?php echo ($user['gender']); ?></span></div>
            <div><strong>Joined On:</strong> <span><?php echo ($user['join_date']); ?></span></div>
            <div><a href="" class="btn btn-success"><i class="bi bi-pencil-square me-2"></i>Edit profile</a></div>
        </div>
    </div>
    <script>
        document.getElementById('fileInput').addEventListener('change', function (event) {
            let file = event.target.files[0];

            if (file) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    document.getElementById('profileImage').src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        });

    </script>
</body>

</html>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">