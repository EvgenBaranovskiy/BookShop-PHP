<?php
    $title = "Create order";
    ob_start();
?>

<div class="container h-100">
    <div class="card card-outline-secondary border border-white mt-5">
        <div class="card-header">
            <h3>Order: "<?=$book->Name?>" (<?=$book->Price?>$)</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="/order/create/<?=$book->ID?>">
                <span>Buyer name: </span>
                <div class="form-group">
                    <input name="buyer-name" class="form-control text-center" placeholder="Buyer name" type="text" />
                </div>

                <span>Phone number: </span>
                <div class="form-group">
                    <input name="buyer-phone-number" class="form-control text-center" placeholder="Phone number" type="phone" />
                </div>

                <?php
                    //Errors
                    if (!empty($error))
                    {
                        echo "<div class='text-danger'>$error</div>";
                    }
                ?>

                <button class="btn btn-success w-100 mt-3" name="order-btn" type="submit">
                    Make order
                </button>
            </form>
        </div>
    </div>
</div>
<?php
    $content = ob_get_clean();
    require "base_template.php";
?>