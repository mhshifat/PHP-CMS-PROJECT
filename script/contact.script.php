<?php
    if(isset($_POST['mail_submit'])) {

        require("../db/db.php");

        $name = $_POST['contact_name'];
        $email = $_POST['contact_email'];
        $subject = $_POST['contact_subject'];
        $body = $_POST['contact_msg'];

        $to = 'support@codersbd.ga';
        $header = 'From: '  . $email;
        $msg = 'You received an E-mail from your Website by ' . $name . '........\n\nSubject: ' . $subject . '\n\n' . $body;

        mail($to, $header, $msg);
        header("Location: ../contact.php?page=contact&send=success");
        exit();
    }
?>