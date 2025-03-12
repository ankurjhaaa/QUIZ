<style>
    /* Sub Navbar (Category Section - Auto Slider) */
    .category-slider {
            width: 100%;
            overflow-x: auto;
            white-space: nowrap;
            background: rgba(178, 176, 176, 0.8);
            /* margin-top: 56px; */
            /* padding: 10px 0; */
            display: flex;
            gap: 18px;
            scroll-behavior: smooth;
            /* margin-top: 7px; */
            
        }

        .category-slider::-webkit-scrollbar {
            display: none;
        }

        .category-slider a {
            flex: 0 0 auto;
            text-decoration: none;
            color: black;
            font-weight: bold;
            padding: 12px 22px;
            transition: 0.3s;
            /* border-radius: 5px; */
            font-size: 20px;
            /* background: #f8f9fa; */
        }

        .category-slider a:hover {
            background: black;
            color: white;
        }
</style>

<!-- Category Slider -->
<div class="category-slider">
    <!-- <a href=""></i>Dashboard</a> -->
    <a href="http://localhost/QUIZ/admin"><i class="bi bi-house-door me-2"></i>Home</a>
    <a href="#"><i class="bi bi-person-bounding-box me-2"></i></i>User</a>
    <a href="http://localhost/QUIZ/admin/assets/add_quiz.php"><i class="bi bi-cloud-plus me-2"></i>Add Quiz</a>
    <a href="#"><i class="bi bi-eye me-2"></i>View Quiz</a>
    <a href="#">Feedback</a>
    <a href="logout.php"><i class="bi bi-box-arrow-left me-2"></i>Signout</a>
    <!-- <a href="#">Category 4</a>
    <a href="#">Category 5</a>
    <a href="#">Category 6</a>
    <a href="#">Category 7</a> -->
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">