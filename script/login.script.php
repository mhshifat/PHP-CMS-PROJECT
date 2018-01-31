<?php
    session_start();
    if(isset($_GET['login_submit'])) {

        require("../db/db.php");

        $login_email = mysqli_real_escape_string($conn, $_GET['login_email']);
        $login_password = mysqli_real_escape_string($conn, $_GET['login_password']);

        if(empty($login_email) || empty($login_password)) {
            header("Location: ../login.php?page=login&some-fields-are-empty");
            exit();
        } else {
            $query = "SELECT * FROM users";
            $result = mysqli_query($conn, $query);
            if($row = mysqli_fetch_assoc($result)) {
                $hashedPWD = password_verify($login_password, $row['password']);

                if($hashedPWD == false) {
                    header("Location: ../login.php?page=login&password-incorrect");
                    exit();
                } elseif ($hashedPWD == true) {

                    $query_1 = "SELECT * FROM users WHERE email='$login_email'";
                    $result_1 = mysqli_query($conn, $query_1);
                    $row = mysqli_fetch_assoc($result_1);
                    $email = $row['email'];
                    if(!$email === $login_email) {
                        header("Location: ../login.php?page=login&login=invalid");
                        exit();
                    } else {
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['password'] = $row['password'];
                        $_SESSION['role'] = $row['role'];
                        header("Location: ../admin/index.php?page=dashboard&success");
                        exit();
                    }
                }
            }
        }

    } else {
        header("Location: ../login.php?page=login&failed");
        exit();
    }
?>