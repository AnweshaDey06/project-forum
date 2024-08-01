<?php
include 'partials/dbconnect.php';

$thread_id = $_GET['threadid'];
$user_id = $_GET['userid'];
$sort = $_GET['sort'];
$order_by = 'created_at DESC';

if ($sort == 'oldest') {
    $order_by = 'created_at ASC';
} elseif ($sort == 'popular') {
    $order_by = 'likes DESC';
}

$sql = "SELECT * FROM forum.comments WHERE t_id = $thread_id AND comment_by = $user_id ORDER BY $order_by";
$result = selectsql($sql);
$noResult = true;

foreach ($result as $row) {
    $noResult = false;
    $comm_id = $row['comment_id'];
    $comm_content = $row['comment_content'];
    $comm_time = $row['created_at'];
    $is_edited = $row['is_edited'];

    echo '<div class="media my-3">
        <img class="mr-3" src="img/user_default.png" width="50px" alt="Media Img">
        <div class="media-body">
            <p class="font-weight-bold my-0">You at ' . $comm_time . ($is_edited ? ' (edited)' : '') . '</p>
            <h5 class="mt-8"><a class="text-dark" href="threads.php?commentid=' . $comm_id . '"></a></h5>
            ' . $comm_content . '
        </div>
        <div class="mr-3">
            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal" onclick="populateEditForm(' . $comm_id . ', \'' . addslashes($comm_content) . '\')">Edit</button>
            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="populateDeleteForm(' . $comm_id . ')">Delete</button>
        </div>
        <div>
            <button class="btn btn-sm btn-info like-btn" data-type="thread" data-id="'. $comm_id .'"><i class="bi bi-hand-thumbs-up"></i></button>
        </div>
    </div>';
}

if ($noResult) {
    echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
                <p class="lead">You have not posted any comments yet</p>
            </div>
          </div>';
}
?>
