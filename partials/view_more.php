<?php
include 'dbconnect.php';
// Assume $categories contains all categories fetched from the database
$categories = selectsql("SELECT * FROM forum.categories");
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- Other navigation items -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="partails/nav.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="categoryDropdown">
                    <?php
                    $count = 0;
                    foreach ($categories as $category) {
                        $count++;
                        $class = $count > 5 ? 'd-none' : ''; // Hide categories beyond the first 5
                        echo '<a class="dropdown-item ' . $class . '" href="threadlist.php?catid=' . $category['c_id'] . '">' . $category['c_name'] . '</a>';
                    }
                    ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" id="viewMore">View More</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
