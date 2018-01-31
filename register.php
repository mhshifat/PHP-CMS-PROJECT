<?php
    require("includes/header.inc.php");
?>
<?php
    require("includes/navbar.inc.php");
?>
<div class="register">
    <div class="re_box">
        <h1><span>C</span>oders<span>BD</span></h1>
        <form action="script/register.script.php" method="POST">
            <div class="form-group group_1">
                <i class="fa fa-user"></i>
                <input type="text" name="resi_username" placeholder="Username">
            </div>
            <div class="form-group group_1">
                <i class="fa fa-envelope"></i>
                <input type="email" name="resi_email" placeholder="Email" required>
            </div>
            <div class="form-group group_1">
                <i class="fa fa-key"></i>
                <input type="password" name="resi_password" placeholder="Password" required>
            </div>
            <button type="submit" name="register_submit">Register</button>
        </form>
    </div>
</div>
<?php
    require("includes/copy.inc.php");
?>
<?php
    require("includes/footer.inc.php");
?>
