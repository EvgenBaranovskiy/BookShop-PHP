<?php
$title = "Login";
ob_start();
?>

<div class="container h-100">
    <div class="card card-outline-secondary border border-white mt-5">
        <div class="card-header">
            <h3>Authorization</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <span>Login: </span>
                <div class="form-group">
                    <input name="login" class="form-control text-center" placeholder="Login" type="text" />
                </div>
                <span>Password: </span>
                <div class="form-group">
                    <input name="password" class="form-control text-center" placeholder="Password" type="password" />
                </div>
                <?php
                    //Errors
                    if (!empty($error))
                    {
                        echo "<div class='text-danger'>$error</div>";
                    }
                ?>
                <button class="btn btn-success w-100 mt-3" name="log-btn" type="submit">
                    Login
                </button>
                <a class="btn btn-primary w-100 mt-1" href="/user/registration">
                    Go to the registration form
                </a>
            </form>
        </div>
    </div>
</div>
<?php
    $content = ob_get_clean();
    require "base_template.php";
?>