<?php
$title = "Main page";

//Розрахунок фрейму для пагініції
$pagination_frame_size = 3;
$current_frame = ceil($page_number / $pagination_frame_size);
$frame_start = $page_number - 1 > 0 ? $page_number - 1 : 1;
$frame_end = ($frame_start + $pagination_frame_size) > $total_page_count ? $total_page_count : $frame_start + $pagination_frame_size;

ob_start();
?>
<div class="book-cards-container">
    <?php foreach ($books_on_page as $book): ?>
        <div class="book-card-preview">
            <div class="book-card-img-preview">
                <img src="<?= $book->ImgCover->ImgUrl ?>">
                <div class="book-card-labels">
                    <div class="book-card-price"><?= $book->Price ?>$</div>
                    <div class="book-card-genre"><?= $book->Genre->Name ?></div>
                </div>

            </div>
            <div class="book-card-description">
                <div class="book-card-description-header">
                    <?= $book->Name ?>
                </div>
                <div class="book-card-short-description-text">
                    <?= $book->ShortDescription ?>
                </div>
            </div>

            <a class="btn btn-primary w-100 mt-1" href="<?= "/book/show/" . $book->ID ?>">Read more</a>

            <?php if (!$is_admin): ?>
            <a class="btn btn-success w-100 mt-1" href="<?= "/order/create/" . $book->ID ?>">Order now</a>
            <?php else: ?>
            <a class="btn btn-warning w-100 mt-1 " href="<?= "/book/edit/" . $book->ID ?>">Edit</a>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

<!--Pagination-->
    <input type="hidden" value="<?= $_GET['genre-id']?>" name="genre-id">
    <div class="d-flex justify-content-center mt-3">
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item <?= $page_number == 1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="<?= "/book/page/" . ($page_number - 1) . "?genre-id=".($_GET['genre-id']) ?>" onclick="this.parentNode.submit();">Previous</a>
                </li>
                <?php
                for ($i = $frame_start; $i <= $frame_end; $i++) {
                ?>
                    <li class="page-item">
                        <a class="page-link <?= $page_number == $i ? 'active' : '' ?>" href="<?= "/book/page/" . $i . "?genre-id=".($_GET['genre-id']) ?>" onclick="this.parentNode.submit();"><?= $i ?></a>
                    </li>
                <?php } ?>
                <li class="page-item">
                    <a class="page-link <?= $page_number == $total_page_count ? 'disabled' : '' ?>" href="<?= "/book/page/" . ($page_number + 1) . "?genre-id=".($_GET['genre-id']) ?>" >Next</a>
                </li>
            </ul>
        </nav>
    </div>
<?php

$content = ob_get_clean();
require "base_template.php";
?>