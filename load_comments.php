<?php
include 'partials/dbconnect.php';

$thread_id = $_GET['threadid'];
$sort = $_GET['sort'];
$role = $_GET['role'];

$order_by = 'created_at DESC';
if ($sort == 'oldest') {
    $order_by = 'created_at ASC';
} elseif ($sort == 'popular') {
    $order_by = 'likes DESC';
}

$sql = "SELECT * FROM forum.comments WHERE t_id = $thread_id ORDER BY $order_by";
$result = selectsql($sql);
$noResult = true;
foreach ($result as $row) {
    $noResult = false;
    $comm_id = $row['comment_id'];
    $comm_content = $row['comment_content'];
    $comm_time = $row['created_at'];
    $comm_u_id = $row['comment_by'];
    $is_edited = $row['is_edited'];

    $sql2 = "SELECT u_name,u_role FROM forum.users WHERE u_id = $comm_u_id";
    $row2 = selectsql($sql2);

    echo '<div class="media my-3">
        <img class="mr-3" src="img/user_default.png" width="50px" alt="Media Img">
        <div class="media-body">
            <p class="font-weight-bold my-0">' . $row2[0]['u_name'] . ' at ' . $comm_time . ($is_edited ? ' (edited)' : '') . '</p>
            <h5 class="mt-8"><a class="text-dark" href="threads.php?commentid=' . $comm_id . '"></a></h5>
            ' . $comm_content . '
        </div>';
    // Check if the logged-in user is an admin
    if ($role == 'admin') {
        echo '<div class="ms-2 mr-3">
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal" onclick="populateEditForm(' . $comm_id . ', \'' . $comm_content . '\')">Edit</button>
            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" onclick="populateDeleteForm(' . $comm_id . ')">Delete</button>
        </div>';
    }
    echo'<div>
            <button class="btn btn-sm btn-info like-btn" data-type="thread" data-id="'. $comm_id .'"><i class="bi bi-hand-thumbs-up"></i></button>
    </div>';


    echo '</div>';
}

if ($noResult) {
    echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-5">No Comments till now</h1>
                <p class="lead"> Be the first person to post a comment!</p>
            </div>
          </div>';
}
?>
