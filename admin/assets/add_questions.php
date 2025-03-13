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
    <title>Quiz Questions</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }

        .container-box {
            max-width: 1000px;
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .search-box {
            width: 100%;
            max-width: 400px;
            margin-bottom: 15px;
        }

        /* अब टेबल को स्क्रॉलेबल बना दिया है */
        .table-responsive {
            overflow-x: auto;
            white-space: nowrap;
        }

        .table {
            background-color: white;
            border-radius: 8px;
        }

        .table thead {
            background-color: #007bff;
            color: white;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn-action {
            border: none;
            padding: 5px 10px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-edit {
            background-color: #28a745;
            color: white;
        }

        .btn-edit:hover {
            background-color: #218838;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>

    <!-- Navbar Includes -->
    <?php include_once "../includes/navbar.php"; ?>
    <?php include_once "../includes/sub_nav.php"; ?>

    <!-- Search Box -->
    <div class="container text-center mt-4">
        <input type="text" id="searchInput" class="form-control search-box" placeholder="🔍 Search Questions...">
    </div>

    <!-- Quiz Table (अब Slider में) -->
    <div class="container-box">
        <h4 class="text-center mb-3">📋 Quiz Questions</h4>
        
        <!-- यह div टेबल को स्क्रॉलेबल बनाता है -->
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Quiz ID</th>
                        <th>Question</th>
                        <th>Option A</th>
                        <th>Option B</th>
                        <th>Option C</th>
                        <th>Option D</th>
                        <th>Correct</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="quizTable">
                    <tr>
                        <td>1</td>
                        <td>101</td>
                        <td>What is Linux?</td>
                        <td>Operating System</td>
                        <td>Software</td>
                        <td>Hardware</td>
                        <td>None</td>
                        <td>A</td>
                        <td>
                            <button class="btn-action btn-edit"><i class="bi bi-pencil"></i></button>
                            <button class="btn-action btn-delete"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>102</td>
                        <td>What is PHP?</td>
                        <td>Programming Language</td>
                        <td>Database</td>
                        <td>Browser</td>
                        <td>Server</td>
                        <td>A</td>
                        <td>
                            <button class="btn-action btn-edit"><i class="bi bi-pencil"></i></button>
                            <button class="btn-action btn-delete"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>103</td>
                        <td>What is HTML used for?</td>
                        <td>Database</td>
                        <td>Server</td>
                        <td>Structuring Webpages</td>
                        <td>Programming</td>
                        <td>C</td>
                        <td>
                            <button class="btn-action btn-edit"><i class="bi bi-pencil"></i></button>
                            <button class="btn-action btn-delete"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript for Search -->
    <script>
        document.getElementById("searchInput").addEventListener("keyup", function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll("#quizTable tr");

            rows.forEach(row => {
                let text = row.innerText.toLowerCase();
                row.style.display = text.includes(filter) ? "" : "none";
            });
        });
    </script>

</body>
</html>
