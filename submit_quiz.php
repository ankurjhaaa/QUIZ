<?php include_once "config/db.php"; ?>
<?php
if (!isset($_SESSION['email'])) {
    echo "<script>window.location.href='signup.php';</script>";
}

if (isset($_POST['submit'])) {
    $quiz_id = $_POST['quiz_id'];

    if (isset($_POST['answer']) && is_array($_POST['answer'])) {
        $user_answers = $_POST['answer'];
    } else {
        $user_answers = [];
    }

    $correct_count = 0;
    $wrong_count = 0;
    $total_questions = 0;
    $get_questions = mysqli_query($connect, "SELECT * FROM quiz_questions WHERE quiz_id='$quiz_id'");

    while ($row = mysqli_fetch_assoc($get_questions)) {
        $total_questions++;
        $question_id = $row['id'];
        $correct_answer = $row['corr_option'];

        if (isset($user_answers[$question_id])) {
            $user_answer = $user_answers[$question_id];

            if ($user_answer == $correct_answer) {
                $correct_count++;
            } else {
                $wrong_count++;
            }
        } else {
            $wrong_count++;
        }
    }


    $score = ($correct_count / $total_questions) * 100;
    $per_score = round($score, 2);

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz Result</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding-top: 70px;
            background: #f8f9fa;
        }

        .result-card {
            margin-top: 9%;
            max-width: 500px;
            width: 100%;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            /* transition: transform 0.3s ease-in-out; */
        }

        /* .result-card:hover {
            transform: scale(1.05);
        } */
        .result-card h2 {
            margin-bottom: 20px;
            color: #007bff;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .result-item {
            display: flex;
            justify-content: space-between;
            padding: 12px;
            border-bottom: 1px solid #ddd;
            font-size: 18px;
        }

        .retry-btn {
            margin-top: 20px;
            padding: 12px 20px;
            text-decoration: none;
            font-size: 18px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* .retry-btn:hover {
            background: #0056b3;
            transform: translateY(-2px);
        } */
    </style>
</head>

<body>
    <?php include_once "includes/navbar.php"; ?>
    <?php include_once "includes/sub_nav.php"; ?>

    <div class="container mt-4">
        <form action="" method="post">
            <div class="result-card mx-auto">
                <h2>🎯 Quiz Result</h2>
                <div class="result-item">
                    <span><i class="bi bi-check-circle text-success"></i> Total Questions:</span>
                    <span><?php echo $total_questions; ?></span>
                </div>
                <div class="result-item">
                    <span><i class="bi bi-check-circle text-success"></i> Right Answers:</span>
                    <span><?php echo $correct_count; ?></span>
                </div>
                <div class="result-item">
                    <span><i class="bi bi-x-circle text-danger"></i> Wrong Answers:</span>
                    <span><?php echo $wrong_count; ?></span>
                </div>
                <div class="result-item">
                    <span><i class="bi bi-percent text-primary"></i> Total Percentage:</span>
                    <span><?php echo round($score, 2); ?> %</span>
                </div>
                <!-- <div class="result-item">
                    <span><i class="bi bi-clock text-warning"></i> Total Time:</span>
                    <span>5m 30s</span>
                </div> -->
                <a class="retry-btn btn btn-primary"
                    onclick="window.location.href='start_quiz.php?quiz_title=<?php echo $quiz_id; ?>'">🔄 Retry Quiz</a>
            </div>
        </form>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $quiz_id = $_POST['quiz_id'];
    $user_email = $_SESSION['email'];


    $insert_user_ans = mysqli_query($connect, "INSERT INTO user_answer (quiz_id, total_que, right_ans, wrong_ans, total_score, email ) VALUE ('$quiz_id','$total_questions','$correct_count','$wrong_count','$per_score','$user_email')");

}
?>