<?php
$title = "Main page";
ob_start();
?>
<div class="row justify-content-center align-items-center">
    <img class="w-50" src='/www/img/wrong_page.jpg'>
    <h3 class="text-center">Sorry! This page doesn't exist. <a href="/">Back to the main page...</a></h3>
</div>
<?php

$content = ob_get_clean();
require "base_template.php";
?>