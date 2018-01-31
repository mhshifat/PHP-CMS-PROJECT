<?php
    if(isset($_POST['register_submit'])) {

        require("../db/db.php");

        $resi_username = mysqli_real_escape_string($conn, $_POST['resi_username']);
        $resi_email = mysqli_real_escape_string($conn, $_POST['resi_email']);
        $resi_password = mysqli_real_escape_string($conn, $_POST['resi_password']);

        if(empty($resi_username) || empty($resi_email) || empty($resi_password)) {
            header("Location: ../register.php?page=register&empty-fields");
            exit();
        } else {
            $query = "SELECT * FROM users WHERE username='$resi_username' OR email='$resi_email'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $username = $row['username'];
            $password = $row['password'];

            if($username === $resi_username || $password === $resi_password) {
                header("Location: ../register.php?page=register&username-already-exist");
                exit();
            } elseif (!preg_match('/^[A-Za-z0-9]*$/', $username)) {
                header("Location: ../register.php?page=register&use-only-upper-lower-letters-and-numbers");
                exit();
            } elseif (!filter_var($resi_email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../register.php?register&please-use-a-valid-email");
                exit();
            } else {
                $hashPassword = password_hash($resi_password, PASSWORD_DEFAULT);
                $query_1 = "INSERT INTO users(username, email, password, role, date) VALUES('$resi_username', '$resi_email', '$hashPassword', 'user', now())";
                mysqli_query($conn, $query_1);
                header("Location: ../login.php?page=login&success");
                exit();
           }
        }

    } else {
        header("Location: ../register.php?page=registration&failed");
        exit();
    }
?>