<?php include_once "config/db.php"; ?>
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

        .table-responsive {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
        }

        table {
            min-width: 700px;
            scroll-snap-align: start;
        }

        .card {
            border-radius: 15px;
            transition: 0.3s;
        }

        /* .card:hover {
            transform: scale(1.02);
        } */

        .btn-success {
            transition: 0.3s;
        }

        .btn-success:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>

    <?php include_once "includes/navbar.php" ?>
    <?php include_once "includes/sub_nav.php" ?>



    <div class="container mt-4">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded">
            <h3 class="text-center mb-3">Your Activity</h3>
            <div class="table-responsive" style="overflow-x: auto; white-space: nowrap;">
                <table class="table table-bordered table-striped text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Serial No</th>
                            <th>Date</th>
                            <th>topic</th>
                            <th>Total Questions</th>
                            <th>Right Answers</th>
                            <th>Wrong Answers</th>
                            <th>Score (%)</th>
                            <th>Retake</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sn = 1;
                        $user_email = $_SESSION['email'];
                        $call_user_ans = mysqli_query($connect, "SELECT * FROM user_answer where email='$user_email' ORDER BY id DESC");
                        while ($user_ans = mysqli_fetch_array($call_user_ans)) { ?>


                            <tr>
                                <td><?= $sn ?></td>
                                <td><?= $user_ans['end_time'] ?></td>
                                <td>
                                    <?php
                                    $quiz_id = $user_ans['quiz_id'];
                                    $call_topic = mysqli_query($connect, "SELECT * FROM quiz_title where id='$quiz_id'");
                                    $quiz_topic = mysqli_fetch_assoc($call_topic);

                                    ?>
                                    <span class="d-inline-block text-truncate" style="max-width: 150px;"
                                        title="<?= $quiz_topic['title'] ?>">
                                        <?= $quiz_topic['title'] ?>
                                    </span>
                                </td>
                                <td><?= $user_ans['total_que'] ?></td>
                                <td><?= $user_ans['right_ans'] ?></td>
                                <td><?= $user_ans['wrong_ans'] ?></td>
                                <td><?= $user_ans['total_score'] ?> % </td>
                                <td><a href="start_quiz.php?quiz_title=<?= $quiz_topic['id'] ?>" class="btn btn-success btn-sm">Try Again</a></td>
                            </tr>
                            <?php $sn++;
                        } ?>

                        <!-- More rows dynamically from database -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>









</body>

</html>