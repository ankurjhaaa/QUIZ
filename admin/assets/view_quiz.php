<?php include_once "../../config/db.php"; ?>

<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.location.href='../login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f5f5f5;
        }

        .table-wrapper {
            overflow-x: auto;
            white-space: nowrap;
            padding: 20px;
        }

        .table-container {
            min-width: 900px;
            background: white;
            padding: 20px;
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
        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-input {
            width: 70%;
            max-width: 400px;
            padding: 8px;
            border-radius: 20px;
            border: 1px solid #ccc;
            outline: none;
            text-align: center;
        }

        .search-btn {
            background-color: #007bff;
            color: white;
            border-radius: 20px;
            padding: 8px 20px;
            border: none;
            cursor: pointer;
            transition: 0.3s;
        }

        .search-btn:hover {
            background-color: #0056b3;
        }

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

    <?php include_once "../includes/navbar.php"; ?>
    <?php include_once "../includes/sub_nav.php"; ?>

    <div class="table-wrapper">
        <div class="table-container">

            <!-- Search Box -->
            <div class="search-container">
                <input type="text" id="searchBox" class="search-input" placeholder="Search Topics...">
                <button class="search-btn"><i class="bi bi-search"></i> Search</button>
            </div>

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
                    <?php
                    $call_title = mysqli_query($connect, "SELECT * FROM quiz_title");
                    while ($title = mysqli_fetch_array($call_title)) { ?>

                        <tr>
                        <?php
                            $quiz_id = $title['id'];
                            $count = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM quiz_title JOIN quiz_questions ON quiz_title.id = quiz_questions.quiz_id where quiz_title.id='$quiz_id' "));

                            ?>
                            <td><?= $title['id'] ?></td>
                            <td><?= $title['title'] ?></td>
                            <td><?= $count ?></td>
                            <!-- <td>10</td> -->
                            <td><?= $title['time_limit'] * $count ?> min</td>
                            <td><a href="view_questions.php?view_question=<?= $title['id'] ?>" class="btn btn-primary"><i class="bi bi-eye"></i>
                                    View Questions</a>
                                <a href="add_questions.php?add_question=<?= $title['id'] ?>" class="btn btn-success"><i class="bi bi-file-earmark-plus"></i>
                                    Add Questions</a>
                                <a href="" class="btn btn-danger"><i class="bi bi-trash3"></i> Delete</a>
                            </td>
                        </tr>

                    <?php } ?>


                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript for Live Search -->
    <script>
        document.getElementById("searchBox").addEventListener("keyup", function () {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll("#dataTable tbody tr");

            rows.forEach(row => {
                let topic = row.cells[1].textContent.toLowerCase();
                if (topic.includes(filter)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>

</body>

</html>