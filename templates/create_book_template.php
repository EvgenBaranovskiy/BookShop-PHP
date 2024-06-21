<?php
$title = "Create book";
ob_start();
?>

<div class="container h-100">
    <div class="card card-outline-secondary border border-white mt-5">
        <div class="card-header">
            <h3>Create book</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="/book/create/<?= $book->ID ?>" enctype="multipart/form-data">
                <span>Book name: </span>
                <div class="form-group">
                    <input name="book-name" class="form-control text-center" placeholder="Enter name" type="text" value="<?=$_POST['book-name']?>"/>
                </div>
                <span>Author: </span>
                <div class="form-group">
                    <input name="book-author" class="form-control text-center" placeholder="Enter author" type="text" value="<?=$_POST['book-author']?>"/>
                </div>
                <span>Short description: </span>
                <div class="form-group">
                    <textarea name="book-short-description" class="form-control" placeholder="Enter short description" type="text" maxlength="300"><?=$_POST['book-short-description']?></textarea>
                </div>
                <span>Full description: </span>
                <div class="form-group">
                    <textarea name="book-full-description" class="form-control" placeholder="Enter full description" type="multiline" maxlength="1000"><?=$_POST['book-full-description']?></textarea>
                </div>
                <span>Price: </span>
                <div class="form-group">
                    <input name="book-price" name="price" type="number" min="0.01" max="1000" step="0.01" class="form-control text-center" placeholder="Enter price" type="text" value="<?=$_POST['book-price']?>"/>
                </div>
                <span>Page count: </span>
                <div class="form-group">
                    <input name="book-page-count" type="number" min="1" step="1" class="form-control text-center" placeholder="Enter page count" type="text" value="<?=$_POST['book-page-count']?>"/>
                </div>
                <span>Genre: </span>
                <div class="form-group">
                    <select name="book-genre-id" class="form-control text-center" type="text">
                        <?php
                        foreach ($genres as $genre) :
                            echo "<option value='$genre->ID' ".($_POST['book-genre-id'] == $genre->ID ? 'selected' : '').">$genre->Name</option>";
                        endforeach;
                        ?>
                    </select>
                </div>
                <span>Book cover: </span>
                <div class="form-group">
                    <input type="file" name="book-cover" class="form-control" accept="image/png, image/jpeg, image/jpg" onchange="previewImage(event)" />
                </div>
                <div class="form-group">
                    <img id="image-preview" src="#" alt="Image Preview" class="card" style="display: none; max-width: 33%; margin: 15px auto; height: auto;" />
                </div>
                <?php
                //Errors
                if (!empty($error)) {
                    echo "<div class='text-danger'>$error</div>";
                }
                ?>
                <button class="btn btn-success w-100 mt-3" name="create-book-btn" type="submit">
                    Create book
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('image-preview');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>

<?php
$content = ob_get_clean();
require "base_template.php";
?>