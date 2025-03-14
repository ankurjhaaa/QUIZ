<?php include_once "config/db.php"; ?>
<?php
if (!isset($_SESSION['email'])) {
    echo "<script>window.location.href='signup.php';</script>";

}
?>
<?php
if (isset($_GET['quiz_title'])) {
    $quiz_id = $_GET['quiz_title'];
}

$call_questions = mysqli_query($connect, "SELECT * FROM quiz_questions where quiz_id='$quiz_id'");
$quiz_serial = mysqli_fetch_assoc($call_questions);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz </title>
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

        /* Form Check Labels को Dark और Bold किया */
        .form-check-input {
            color: black;
            /* Dark Black */
            font-weight: bold;
            /* Bold Text */
            font-size: 18px;
            /* Slightly Bigger */
            border: black solid 1px;
        }

        .form-check-label {
            /* color: black ; */
            /* Dark Black */
            font-weight: 500;
            /* Bold Text */
            font-size: 18px;
            /* Slightly Bigger */

        }

        /* Radio Button Hover Effect */
    </style>
</head>

<body>

    <?php include_once "includes/navbar.php" ?>
    <?php include_once "includes/sub_nav.php" ?>

    <div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="card shadow-lg p-4" style="width: 500px;">
            <h4 class="text-center mb-4">(<?php echo $quiz_serial['quiz_id']; ?>) . Quiz Question</h4>

            <div id="quiz-container">
                <form action="submit_quiz.php" method="post">
                    <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>">

                    <?php
                    $question_no = 1; // Question Counter
                    
                    $call_questions = mysqli_query($connect, "SELECT * FROM quiz_questions WHERE quiz_id='$quiz_id'");
                    while ($quiz_questions = mysqli_fetch_assoc($call_questions)) { ?>

                        <div class="quiz-question">
                            <p class="fw-bold"><?php echo $question_no; ?>) <?php echo $quiz_questions['question']; ?></p>

                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    name="answer[<?php echo $quiz_questions['id']; ?>]" value="A">
                                <label class="form-check-label">A) <?php echo $quiz_questions['option_a']; ?></label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    name="answer[<?php echo $quiz_questions['id']; ?>]" value="B">
                                <label class="form-check-label">B) <?php echo $quiz_questions['option_b']; ?></label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    name="answer[<?php echo $quiz_questions['id']; ?>]" value="C">
                                <label class="form-check-label">C) <?php echo $quiz_questions['option_c']; ?></label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    name="answer[<?php echo $quiz_questions['id']; ?>]" value="D">
                                <label class="form-check-label">D) <?php echo $quiz_questions['option_d']; ?></label>
                            </div>
                        </div>

                        <?php $question_no++;
                    } ?>

                    <!-- Submit Button -->

                    <div class="text-center mt-3">
                        <button type="submit" name="submit" class="btn btn-success d-none" id="submitBtn">
                            <i class="bi bi-send"></i> Submit
                        </button>
                    </div>
                </form>




            </div>

            <!-- Navigation Buttons -->
            <div class="d-flex justify-content-between mt-4">
                <button class="btn btn-secondary" id="prevBtn" disabled>
                    <i class="bi bi-arrow-left"></i> Previous
                </button>
                <button class="btn btn-primary" id="nextBtn">
                    Next <i class="bi bi-arrow-right"></i>
                </button>
            </div>

            <!-- Submit Button -->

        </div>
    </div>

    <!-- JavaScript for Question Navigation -->
    <script>
        let currentQuestion = 0;
        const questions = document.querySelectorAll(".quiz-question");
        const prevBtn = document.getElementById("prevBtn");
        const nextBtn = document.getElementById("nextBtn");
        const submitBtn = document.getElementById("submitBtn");

        function updateQuestion() {
            questions.forEach((q, index) => {
                q.classList.toggle("d-none", index !== currentQuestion);
            });

            // Update button states
            prevBtn.disabled = currentQuestion === 0;
            nextBtn.classList.toggle("d-none", currentQuestion === questions.length - 1);
            submitBtn.classList.toggle("d-none", currentQuestion !== questions.length - 1);
        }

        prevBtn.addEventListener("click", () => {
            if (currentQuestion > 0) {
                currentQuestion--;
                updateQuestion();
            }
        });

        nextBtn.addEventListener("click", () => {
            if (currentQuestion < questions.length - 1) {
                currentQuestion++;
                updateQuestion();
            }
        });

        updateQuestion();
    </script>








</body>

</html>