<?php
session_start();
    if(isset($_POST['comment_submit'])) {
        $comment = $_POST['comment'];
        if(isset($_GET['blogId'])) {
            $blogId = $_GET['blogId'];
            require("../db/db.php");
            $query = "INSERT INTO comments(comment, blog_id, status, date, username) VALUES('$comment', '$blogId', 'unapproved', now(), 'shifat')";
            mysqli_query($conn, $query);
            header("Location: ../post.php?page=blog&blogID={$blogId}&post={$blogId}");
            exit();
        }
    }
?>