<?php
    require("includes/header.inc.php");
?>
<?php
    require("includes/navbar.inc.php");
?>
<div class="contact">
    <div class="re_box_1">
        <h1><span>C</span>oders<span>BD</span></h1>
        <form action="script/contact.script.php" method="POST">
            <div class="form-group group_1">
                <input type="text" name="contact_name" placeholder="Your name" required>
            </div>
            <div class="form-group group_1">
                <input type="email" name="contact_email" placeholder="Your email" required>
            </div>
            <div class="form-group group_1">
                <input type="text" name="contact_subject" placeholder="Your subject" required>
            </div>
            <textarea name="contact_msg" id="" cols="30" rows="10" placeholder="Your message" required></textarea>
            <button type="submit" name="mail_submit">Send Mail</button>
        </form>
    </div>
</div>
<?php
    require("includes/copy.inc.php");
?>
<?php
    require("includes/footer.inc.php");
?>
