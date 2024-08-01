<script language="Javascript" type="text/javascript" src="/ess/bootstrap/js/bootstrap.min.js"></script>
<script language="Javascript" type="text/javascript" src="/ess/bootstrap/js/jquery.js"></script>
<script language="Javascript" type="text/javascript" src="/ess/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php
// session_start();
include 'handleLogin.php';

// Fetch the logged-in user's role at the start of your script
$logged_in_user_role = '';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $logged_in_user_id = $_SESSION['u_id'];
    $sql = "SELECT u_role FROM forum.users WHERE u_id = '$logged_in_user_id'";
    $logged_in_user_result = selectsql($sql);
    if (!empty($logged_in_user_result)) {
        $logged_in_user_role = $logged_in_user_result[0]['u_role'];
    }
}

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href= "/project">QueryPoint</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggle-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/project">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">';

                        $sql = "SELECT * FROM forum.categories LIMIT 5";
                        $result = selectsql($sql);
                        foreach($result as $row){
                            $cat_id = $row['c_id'];
                            $cat_name = $row['c_name'];
                            echo '<a class="dropdown-item" href="threadlist.php?catid=' . $cat_id . '">'.$cat_name.'</a>';
                        }
                        
                        echo'<div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">View More</a>';
                        if ($logged_in_user_role == 'admin'){
                            echo'<div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="manage_categories.php">Manage Categories</a>';
                        }
                    echo'</div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="GET" action="search.php">
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
            </form>';

            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                echo '<form class="form-inline my-2 my-lg-0">
                    <p class="text-light my-0 mx-4">Welcome ' . $_SESSION['u_email'] . '</p>
                    <a href="partials/logout.php" role="button" class="btn btn-outline-danger text-white border-white mx-1">Logout</a>
                </form>';    
            }
            else{
            echo '<div class="ms.2">
                    <button class="btn btn-outline-primary text-white border-white ml-4" data-toggle="modal" data-target="#loginModal">Login</button>
                    <button class="btn btn-outline-primary text-white border-white mx-1" data-toggle="modal" data-target="#signupModal">Signup</button>
                </div>';
            }
    echo '</div>
</nav>';
?>