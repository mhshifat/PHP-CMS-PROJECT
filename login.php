<?php
    require("includes/header.inc.php");
?>
<?php
    require("includes/navbar.inc.php");
?>
<div class="register">
    <div class="re_box">
        <h1><span>C</span>oders<span>BD</span></h1>
        <form action="script/login.script.php" method="GET">
            <div class="form-group group_1">
                <i class="fa fa-envelope"></i>
                <input type="email" name="login_email" placeholder="Email" required>
            </div>
            <div class="form-group group_1">
                <i class="fa fa-key"></i>
                <input type="password" name="login_password" placeholder="Password" required>
            </div>
            <button type="submit" name="login_submit">Login</button>
        </form>
    </div>
</div>
<?php
    require("includes/copy.inc.php");
?>
<?php
    require("includes/footer.inc.php");
?>
