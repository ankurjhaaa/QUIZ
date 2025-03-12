<?php include_once "../config/db.php" ?>
<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.location.href='login.php';</script>";

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Navbar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }

        .table-container {
            max-width: 900px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background-color: #f8f9fa;
        }

        .btn-start {
            background-color: #86b817;
            color: white;
            font-weight: bold;
            border-radius: 5px;
        }

        .btn-start:hover {
            background-color: #6e9c14;
        }
    </style>
</head>

<body>

    <?php include_once "includes/navbar.php" ?>
    <?php include_once "includes/sub_nav.php" ?>

    <div class="table-container">
        <table class="table table-bordered text-center align-middle">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Topic</th>
                    <th>Total Question</th>
                    <th>Marks</th>
                    <th>Time Limit</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Linux : vi Editor</td>
                    <td>5</td>
                    <td>10</td>
                    <td>10 min</td>
                    <td><button class="btn btn-start"><i class="bi bi-box-arrow-up-right"></i> Start</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Linux : Startup</td>
                    <td>5</td>
                    <td>10</td>
                    <td>10 min</td>
                    <td><button class="btn btn-start"><i class="bi bi-box-arrow-up-right"></i> Start</button></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Networking</td>
                    <td>2</td>
                    <td>4</td>
                    <td>5 min</td>
                    <td><button class="btn btn-start"><i class="bi bi-box-arrow-up-right"></i> Start</button></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>C++ Coding</td>
                    <td>2</td>
                    <td>4</td>
                    <td>5 min</td>
                    <td><button class="btn btn-start"><i class="bi bi-box-arrow-up-right"></i> Start</button></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>PHP Coding</td>
                    <td>2</td>
                    <td>4</td>
                    <td>5 min</td>
                    <td><button class="btn btn-start"><i class="bi bi-box-arrow-up-right"></i> Start</button></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Linux : File Management</td>
                    <td>2</td>
                    <td>4</td>
                    <td>5 min</td>
                    <td><button class="btn btn-start"><i class="bi bi-box-arrow-up-right"></i> Start</button></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>