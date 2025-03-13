<?php include_once "../../config/db.php"; ?>
<?php
// if (!isset($_SESSION['admin_email'])) {
//     echo "<script>window.location.href='../login.php';</script>";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Number Input Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Full Page Layout */
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa; /* Light Grey Background */
        }

        /* Center Content */
        .container-center {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Form Container */
        .form-container {
            width: 100%;
            max-width: 400px;
            background: rgba(255, 255, 255, 0.95);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            animation: fadeIn 0.8s ease-in-out;
        }

        /* Fade-in Animation */
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

        /* Input Fields */
        .form-control {
            border-radius: 6px;
            border: 1px solid #ddd;
            transition: 0.3s;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 6px rgba(0, 123, 255, 0.3);
        }

        /* Submit Button */
        .btn-submit {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            transition: 0.3s;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        /* Responsive Adjustments */
        @media (max-width: 576px) {
            .form-container {
                max-width: 90%;
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar Includes -->
    <?php include_once "../includes/navbar.php"; ?>
    <?php include_once "../includes/sub_nav.php"; ?>

    <!-- Centered Form -->
    <div class="container-center">
        <div class="form-container">
            <h4 class="text-center mb-3">Enter Details</h4>
            <form method="POST">
                <div class="row g-2">
                    <div class="col-6">
                        <label class="form-label">Quiz Title</label>
                        <input type="text" name="title" class="form-control" placeholder="enter quiz title" required>
                    </div>
                    <!-- <div class="col-6">
                        <label class="form-label">Number of Question</label>
                        <input type="number" name="no_que" class="form-control" required>
                    </div> -->
                    <div class="col-6">
                        <label class="form-label">right ansuer. marks</label>
                        <input type="number" name="no_right_ans" class="form-control" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">wrong ans. marks </label>
                        <input type="number" name="no_wrong_ans" class="form-control" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Time Limit (minutes)</label>
                        <input type="number" name="time_limit" class="form-control" required>
                    </div>
                    
                </div>
                <div class="mb-2 mt-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="2" placeholder="Enter description"></textarea>
                </div>
                <button type="submit" name="title_submit" class="btn btn-submit w-100 mt-2">Submit</button>
            </form>
            <?php
                if(isset($_POST['title_submit'])){
                    $title = $_POST['title'];
                    // $no_que = $_POST['no_que'];
                    $no_right_ans = $_POST['no_right_ans'];
                    $no_wrong_ans = $_POST['no_wrong_ans'];
                    $time_limit = $_POST['time_limit'];
                    $description = $_POST['description'];

                    $insert_title = mysqli_query($connect,"INSERT INTO quiz_title (title,no_right_ans,no_wrong_ans,time_limit,description) VALUE ('$title','$no_right_ans','$no_wrong_ans','$time_limit','$description')");
                }

            ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
