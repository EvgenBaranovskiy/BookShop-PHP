<?php
$title = "Genres list";
ob_start();


?>
<div class="container">
    <div class="row mt-5">
        <table class="table text-center align-middle">
            <thead class="table-dark align-middle">
                <tr>
                    <th>NAME</th>
                    <th>BOOKS COUNT</th>
                    <th>READ</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <? foreach ($genres as $genre) : ?>
                    <tr>
                        <form method="POST">
                        <input type="hidden" value="<?= $genre->ID ?>" name="genre-id">
                        <td><?= $genre->Name ?></td>
                        <td><?= $genre->books_count ?></td>
                        <td><button name="genre-open-btn" class="btn btn-secondary">Open</button></td>
                        </form>
                    </tr>
                <? endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
require "base_template.php";
?>