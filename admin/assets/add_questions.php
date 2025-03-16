<?php include_once "../../config/db.php"; ?>
<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.location.href='../login.php';</script>";
}
?>
<?php
if (isset($_GET['add_question'])) {
    $id = $_GET['add_question'];
    $call_title = mysqli_query($connect, "SELECT * FROM quiz_title JOIN quiz_questions ON quiz_title.id = quiz_questions.quiz_id where quiz_questions.id='$id'");
    $title = mysqli_fetch_array($call_title);
    // $count = mysqli_num_rows($call_title);
    // $count_question = mysqli_fetch_assoc($count);



} ?>
<?php

// $call_title = ;
// $title = mysqli_fetch_assoc($call_title);
$count = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM quiz_title JOIN quiz_questions ON quiz_title.id = quiz_questions.quiz_id where quiz_title.id='$id' "));
// $count_question = mysqli_fetch_assoc($count);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz Questions</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        .table-wrapper {
            overflow-x: auto;
            white-space: nowrap;
            /* padding: 20px; */
        }

        .table-container {
            /* min-width: 900px; */
            background: white;
            /* padding: 20px; */
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background-color: #343a40;
            color: white;
        }

        .table tbody tr:hover {
            background-color: #f1f3f5;
        }



        /* Stylish Search Box */

        /* Scrollbar Styling */
        .table-wrapper::-webkit-scrollbar {
            height: 8px;
        }

        .table-wrapper::-webkit-scrollbar-thumb {
            background: #aaa;
            border-radius: 10px;
        }

        .table-wrapper::-webkit-scrollbar-track {
            background: #ddd;
            border-radius: 10px;
        }
    </style>

</head>

<body>

    <!-- Navbar Includes -->
    <?php include_once "../includes/navbar.php"; ?>
    <?php include_once "../includes/sub_nav.php"; ?>



    <div class="container mt-5">
        <div class="table-wrapper">
            <div class="table-container">

                <!-- Search Box -->


                <table class="table table-bordered text-center align-middle" id="dataTable">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Topic</th>
                            <th>Total Question</th>
                            <!-- <th>Marks</th> -->
                            <th>Time Limit</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr>
                            <td><?= $title['id'] ?></td>
                            <td><?= $title['title'] ?></td>
                            <td><?= $count ?></td>
                            <!-- <td>10</td> -->
                            <td><?= $title['time_limit'] * $count ?> min</td>
                            <td>
                                <a href="" class="btn btn-success"><i class="bi bi-trash3"></i> edit</a>
                            </td>
                        </tr>






                    </tbody>
                </table>
            </div>
        </div>
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h4>Add New Question</h4>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Question:</label>
                        <textarea class="form-control" name="question" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Option A:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="option_a" required>
                                <div class="input-group-text">
                                    <input type="radio" name="corr_option" value="A" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Option B:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="option_b" required>
                                <div class="input-group-text">
                                    <input type="radio" name="corr_option" value="B" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Option C:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="option_c" required>
                                <div class="input-group-text">
                                    <input type="radio" name="corr_option" value="C" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Option D:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="option_d" required>
                                <div class="input-group-text">
                                    <input type="radio" name="corr_option" value="D" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="add_questions" class="btn btn-success">
                            <i class="bi bi-plus-circle"></i> Add Question
                        </button>
                    </div>
                </form>
                <?php
                // include_once "../../config/db.php"; // Database Connection
                
                if (isset($_POST['add_questions'])) {
                    $quiz_id = $title['id'];
                    $question = $_POST['question'];
                    $option_a = $_POST['option_a'];
                    $option_b = $_POST['option_b'];
                    $option_c = $_POST['option_c'];
                    $option_d = $_POST['option_d'];
                    $corr_option = $_POST['corr_option'];

                    // SQL Query
                    $sql = mysqli_query($connect, "INSERT INTO quiz_questions (quiz_id,question, option_a, option_b, option_c, option_d, corr_option) 
            VALUES ('$quiz_id','$question', '$option_a', '$option_b', '$option_c', '$option_d', '$corr_option')");

                    if ($sql) {
                        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                        echo "<script>
                            Swal.fire({
                                 title: '$count Question In This Topic !',
                                 text: 'Press below button to Add More !',
                                 icon: 'success',
                                 confirmButtonText: 'Add More'
                               }).then((result) => {
                                 if (result.isConfirmed) {
                                   window.location.href = ''; // यहां अपनी लिंक डालें
                                 }
                               });

                        </script>";

                    } else {
                        echo "Error: " ;
                    }
                }
                ?>

            </div>
        </div>
    </div>








    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>