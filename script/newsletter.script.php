<?php
    if(isset($_POST['news_submit'])) {
        $email = $_POST['newsletter'];
        require("../db/db.php");
        $query = "INSERT INTO newsletter(email) VALUES('$email')";
        mysqli_query($conn, $query);
        header("Location: ../index.php");
        exit();
    }
?>