<style>
    /* Sub Navbar (Category Section - Auto Slider) */
    .category-slider {
            width: 100%;
            overflow-x: auto;
            white-space: nowrap;
            background: white;
            /* margin-top: 56px; */
            padding: 10px 0;
            display: flex;
            gap: 15px;
            scroll-behavior: smooth;
        }

        .category-slider::-webkit-scrollbar {
            display: none;
        }

        .category-slider a {
            flex: 0 0 auto;
            text-decoration: none;
            color: black;
            font-weight: bold;
            padding: 10px 20px;
            transition: 0.3s;
            border-radius: 5px;
            font-size: 16px;
            background: #f8f9fa;
        }

        .category-slider a:hover {
            background: black;
            color: white;
        }
</style>

<!-- Category Slider -->
<div class="category-slider">
    <a href="#">Category 1</a>
    <a href="#">Category 2</a>
    <a href="#">Category 3</a>
    <a href="#">Category 4</a>
    <a href="#">Category 5</a>
    <a href="#">Category 6</a>
    <a href="#">Category 7</a>
</div>