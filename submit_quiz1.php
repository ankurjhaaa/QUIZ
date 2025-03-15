<?php
include_once "config/db.php";
// session_start();

// User Login Check
if (!isset($_SESSION['email'])) {
    echo "<script>window.location.href='signup.php';</script>";
    exit;
}

if (isset($_POST['submit'])) {
    $quiz_id = $_POST['quiz_id'];

    // ✅ सबसे पहले Check करें कि User ने कोई Answer दिया है या नहीं
    if (isset($_POST['answer']) && is_array($_POST['answer'])) {
        $user_answers = $_POST['answer']; // User के दिए गए Answers
    } else {
        $user_answers = []; // अगर कोई जवाब नहीं दिया, तो Empty Array रखें
    }

    $correct_count = 0; // सही जवाब की गिनती
    $wrong_count = 0;   // गलत जवाब की गिनती
    $total_questions = 0; // कुल सवाल

    // Database से Quiz के सभी Questions निकालो
    $get_questions = mysqli_query($connect, "SELECT * FROM quiz_questions WHERE quiz_id='$quiz_id'");

    while ($row = mysqli_fetch_assoc($get_questions)) {
        $total_questions++;
        $question_id = $row['id'];
        $correct_answer = $row['corr_option']; // सही जवाब Database में Stored है

        if (isset($user_answers[$question_id])) {
            $user_answer = $user_answers[$question_id];

            if ($user_answer == $correct_answer) {
                $correct_count++; // सही जवाब मिला
            } else {
                $wrong_count++; // गलत जवाब मिला
            }
        } else {
            $wrong_count++; // ❌ कोई जवाब नहीं दिया गया, तो इसे गलत गिनो
        }
    }

    // कुल स्कोर निकालें
    $score = ($correct_count / $total_questions) * 100;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4 text-center">
        <h2 class="text-primary">🎉 आपका Quiz Result 🎉</h2>
        <p class="fs-4"><strong>सही उत्तर:</strong> <span class="text-success"><?php echo $correct_count; ?></span></p>
        <p class="fs-4"><strong>गलत उत्तर:</strong> <span class="text-danger"><?php echo $wrong_count; ?></span></p>
        <p class="fs-4"><strong>आपका स्कोर:</strong> <span class="text-info"><?php echo round($score, 2); ?>%</span></p>
        <a href="start_quiz.php?quiz_title=<?php echo $quiz_id; ?>" class="btn btn-primary">🔄 फिर से कोशिश करें</a>
    </div>
</body>

</html>
<a href="start_quiz.php?quiz_title=<?php echo $quiz_id; ?>" class="btn btn-primary">🔄 Retry Quiz</button>
