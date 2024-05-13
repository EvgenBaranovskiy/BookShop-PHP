<?php
$title = "Main page";
ob_start();
?>
<div class="row justify-content-center align-items-center">
    <img class="w-50 mt-5" src='/www/img/no_orders.png'>
    <h3 class="text-center">You haven't placed any orders yet! Place one and then return here.</h3>
</div>
<?php

$content = ob_get_clean();
require "base_template.php";
?>