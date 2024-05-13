<?php
    $title="Book - ".$book->Name;
    ob_start();
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-4 d-flex justify-content-center">
            <div>
                <img class='card book-full-description-img' src="<?=$book->ImgCover->ImgUrl?>">
                <a class="btn btn-success w-100 mt-1" href="<?= "/order/create/" .$book->ID ?>">Order for <?=$book->Price?>$</a>
            </div>
        </div>
        <div class="col-8">
            <h3 class="book-full-description-header"><?=$book->Name?></h3>
            <h6>Author:  <?=$book->Author?> | Genre: <?=$book->Genre->Name?> | <?=$book->PageCount?> pages</h6>
            <div class="book-full-description-text">
                <?=$book->FullDescription?>
            </div>
        </div>
    </div>
</div>
<?php
    $content=ob_get_clean();
    require "base_template.php";
?>