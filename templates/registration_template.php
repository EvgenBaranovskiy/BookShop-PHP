<?php
    $title = "Registration";
    ob_start();
?>

<div class="container h-100">
    <div class="card card-outline-secondary border border-white mt-5">
        <div class="card-header">
            <h3>Registration</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="/user/registration">


                <span>Login: </span>
                <div class="form-group">
                    <input name="login" class="form-control text-center" value="" placeholder="Login" type="text" />
                </div>
                <span>Password: </span>
                <div class="form-group">
                    <input name="password" class="form-control text-center" placeholder="Password" type="password" />
                </div>
                <span>Reenter password: </span>
                <div class="form-group">
                    <input name="repassword" class="form-control text-center" placeholder="Reenter password" type="password" />
                </div>
                <br>
                <?php
                    //Errors
                    if (!empty($error))
                    {
                        echo "<div class='text-danger'>$error</div>";
                    }

                    if (!empty($msg))
                    {
                        echo "<div class='text-success'>$msg</div>";
                    }
                ?>
                <button class="btn btn-success w-100 mt-3" name="reg-btn" type="submit">
                    Registration
                </button>
                <a class="btn btn-primary w-100 mt-1" href="/user/login">
                    Go to the authorization form
                </a>
            </form>
        </div>
    </div>
</div>
<?php
    $content = ob_get_clean();
    require "base_template.php";
?>