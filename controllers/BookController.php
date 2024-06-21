<?php
require_once "Controller.php";

class BookController extends Controller
{
    private $_bookModel;
    private $_userModel;

    public function __construct(BookModel $bookModel, UserModel $userModel)
    {
        $this->_bookModel = $bookModel;
        $this->_userModel = $userModel;
    }

    public function index()
    {
        $this->page(1);
    }

    public function page(int $page_number,  int $books_per_page = 6)
    {
        $user = $this->_userModel->get_current_user();
        $is_auth = $this->_userModel->is_auth();
        $is_admin = $this->_userModel->is_admin();
        $books = $this->_bookModel->GetAllBooks();

        //Вибірка за жанром
        if (!empty($_GET['genre-id'])) {

            $book_genre = $this->_bookModel->GetGenreById($_GET['genre-id']);

            $books = array_filter($books, function ($book) use ($book_genre) {
                return $book->Genre->ID == $book_genre->ID;
            });
        }

        //Розрахунок фрейму книжок 
        $total_count_of_books = count($books);
        $total_page_count = ceil(count($books) / $books_per_page);
        $start_index = $page_number * $books_per_page - $books_per_page;
        $books_on_page = array_slice($books, $start_index, $books_per_page);

        if (count($books_on_page) > 0) {
            require $this->view_path . "index_template.php";
        } else {
            require $this->view_path . "wrong_page_template.php";
        }
    }

    public function genres()
    {
        $user = $this->_userModel->get_current_user();
        $is_auth = $this->_userModel->is_auth();
        $is_admin = $this->_userModel->is_admin();

        if (isset($_POST['genre-open-btn'])) {
            header("Location: /book/page/1?genre-id={$_POST['genre-id']}");
            return;
        }

        $genres = $this->_bookModel->GetAllGenres();
        foreach ($genres as $genre) {
            $genre->books_count = $this->_bookModel->CountBooksByGenre($genre);
        }

        require $this->view_path . "show_genres_template.php";
    }

    public function show($book_id)
    {
        $user = $this->_userModel->get_current_user();
        $is_auth = $this->_userModel->is_auth();
        $is_admin = $this->_userModel->is_admin();
        $book = $this->_bookModel->GetBookById($book_id);

        if (!is_null($book)) {
            require $this->view_path . "show_book_template.php";
        } else {
            require $this->view_path . "wrong_page_template.php";
        }
    }

    public function edit($book_id)
    {
        $user = $this->_userModel->get_current_user();
        $is_auth = $this->_userModel->is_auth();
        $is_admin = $this->_userModel->is_admin();
        $genres = $this->_bookModel->GetAllGenres();
        $book = $this->_bookModel->GetBookById($book_id);

        if ($is_admin && !is_null($book)) {
            if (isset($_POST['create-book-btn'])) {
                $error = "";
                //Validation
                //Book name validation
                if (empty($_POST['book-name'])) {
                    $error = "<li>Book name is required!</li>";
                } elseif (strlen($_POST['book-name']) > 50) {
                    $error = "<li>The name of the book must be less than 50 characters long!</li>";
                }
                //Author validation
                if (empty($_POST['book-author'])) {
                    $error .= "<li>Book author is required!</li>";
                } elseif (strlen($_POST['book-author']) > 100) {
                    $error .= "<li>The author of the book must be less than 100 characters long!</li>";
                }
                //Short description validation
                if (empty($_POST['book-short-description'])) {
                    $error .= "<li>Short description is required!</li>";
                } elseif (strlen($_POST['book-short-description']) > 300) {
                    $error .= "<li>Short description must be less than 300 characters long!</li>";
                }
                //Full description validation
                if (empty($_POST['book-full-description'])) {
                    $error .= "<li>Full description is required!</li>";
                } elseif (strlen($_POST['book-full-description']) > 1500) {
                    $error .= "<li>Full description must be less than 1500 characters long!</li>";
                }
                //Price validation
                if (empty($_POST['book-price'])) {
                    $error .= "<li>Book price is required!</li>";
                } elseif (is_float($_POST['book-full-description']) && $_POST['book-full-description'] > 0 && $_POST['book-full-description'] < 1000) {
                    $error .= "<li>Book price must be float (from 0.01 to 1000$)!</li>";
                }
                //Page count validation
                if (empty($_POST['book-page-count'])) {
                    $error .= "<li>Page count is required!</li>";
                } elseif (is_float($_POST['book-page-count']) && $_POST['book-page-count'] > 0) {
                    $error .= "<li>The price of the book must be an integer and greater than 0!</li>";
                }
                //File validation
                if (isset($_FILES['book-cover']) && $_FILES['book-cover']['error'] = UPLOAD_ERR_OK) {
                    $fileMimeType = mime_content_type($_FILES['book-cover']['tmp_name']);
                    $allowedMimeTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                    $maxFileSize = 2.5 * 1024 * 1024;

                    if (!in_array($fileMimeType, $allowedMimeTypes)) {
                        $error .= "<li>Invalid image type! Only JPEG, JPG, and PNG are allowed.</li>";
                    }

                    if ($_FILES['book-cover']['size'] > $maxFileSize) {
                        $error .= "<li>File size exceeds the maximum limit of 2.5 MB.</li>";
                    }
                }

                //Validation is ok
                if (empty($error)) 
                {
                    //Збереження зображення
                    if (!empty($_FILES['book-cover']['tmp_name']))
                    {
                        $fileExtension = pathinfo($_FILES['book-cover']['name'], PATHINFO_EXTENSION);
                        do {
                            $uniqueName = uniqid('book_cover_', true) . '.' . $fileExtension;
                            $uploadfile = $this->_bookModel::BOOK_COVERS_DIR . $uniqueName;
                        } while (file_exists($uploadfile));

                        if (!copy($_FILES['book-cover']['tmp_name'], $uploadfile)) {
                            $error .= "<li>File upload failed.</li>";
                            require $this->view_path . "create_book_template.php";
                            return;
                        }

                        //Delete old img
                        $file_to_delete = ".".$book->ImgCover->ImgUrl;
                        if (!empty($book->ImgCover->ImgUrl) && file_exists($file_to_delete))
                        {
                            unlink($file_to_delete);   
                        }
                    }

                    //Пошук жанру за id
                    $genre = null;
                    foreach ($genres as $current_genre) {
                        if ($current_genre->ID == $_POST['book-genre-id']) {
                            $genre = $current_genre;
                            break;
                        }
                    }

                    //Відредагована книга
                    $book->Name = $_POST['book-name'];
                    $book->Author = $_POST['book-author'];
                    $book->ShortDescription = $_POST['book-short-description'];
                    $book->FullDescription= $_POST['book-full-description'];
                    $book->Price= $_POST['book-price'];
                    $book->PageCount= $_POST['book-page-count'];
                    $book->Genre = $genre;

                    
                    if (!empty($uploadfile))
                    {
                        $book->ImgCover->ImgUrl = substr($uploadfile, 1);
                    }

                    if ($this->_bookModel->EditBook($book) === true)
                    {
                        return header("Location: /book/show/{$book->ID}");
                    }
                    else
                    {
                        return;
                    }
                }
            }
            require $this->view_path . "edit_book_template.php";
        } else {
            require $this->view_path . "wrong_page_template.php";
        }
    }

    public function create()
    {
        $user = $this->_userModel->get_current_user();
        $is_auth = $this->_userModel->is_auth();
        $is_admin = $this->_userModel->is_admin();
        $genres = $this->_bookModel->GetAllGenres();

        if ($is_admin) {
            if (isset($_POST['create-book-btn'])) {
                $error = "";
                //Validation
                //Book name validation
                if (empty($_POST['book-name'])) {
                    $error = "<li>Book name is required!</li>";
                } elseif (strlen($_POST['book-name']) > 50) {
                    $error = "<li>The name of the book must be less than 50 characters long!</li>";
                }
                //Author validation
                if (empty($_POST['book-author'])) {
                    $error .= "<li>Book author is required!</li>";
                } elseif (strlen($_POST['book-author']) > 100) {
                    $error .= "<li>The author of the book must be less than 100 characters long!</li>";
                }
                //Short description validation
                if (empty($_POST['book-short-description'])) {
                    $error .= "<li>Short description is required!</li>";
                } elseif (strlen($_POST['book-short-description']) > 300) {
                    $error .= "<li>Short description must be less than 300 characters long!</li>";
                }
                //Full description validation
                if (empty($_POST['book-full-description'])) {
                    $error .= "<li>Full description is required!</li>";
                } elseif (strlen($_POST['book-full-description']) > 1500) {
                    $error .= "<li>Full description must be less than 1500 characters long!</li>";
                }
                //Price validation
                if (empty($_POST['book-price'])) {
                    $error .= "<li>Book price is required!</li>";
                } elseif (is_float($_POST['book-full-description']) && $_POST['book-full-description'] > 0 && $_POST['book-full-description'] < 1000) {
                    $error .= "<li>Book price must be float (from 0.01 to 1000$)!</li>";
                }
                //Page count validation
                if (empty($_POST['book-page-count'])) {
                    $error .= "<li>Page count is required!</li>";
                } elseif (is_float($_POST['book-page-count']) && $_POST['book-page-count'] > 0) {
                    $error .= "<li>The price of the book must be an integer and greater than 0!</li>";
                }
                //File validation
                if (!isset($_FILES['book-cover']) || $_FILES['book-cover']['error'] != UPLOAD_ERR_OK) {
                    $error .= "<li>Book cover is required!</li>";
                } else {
                    $fileMimeType = mime_content_type($_FILES['book-cover']['tmp_name']);
                    $allowedMimeTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                    $maxFileSize = 2.5 * 1024 * 1024;

                    if (!in_array($fileMimeType, $allowedMimeTypes)) {
                        $error .= "<li>Invalid image type! Only JPEG, JPG, and PNG are allowed.</li>";
                    }

                    if ($_FILES['book-cover']['size'] > $maxFileSize) {
                        $error .= "<li>File size exceeds the maximum limit of 2.5 MB.</li>";
                    }
                }

                //Validation is ok
                if (empty($error)) 
                {
                    //Збереження зображення
                    $fileExtension = pathinfo($_FILES['book-cover']['name'], PATHINFO_EXTENSION);
                    do {
                        $uniqueName = uniqid('book_cover_', true) . '.' . $fileExtension;
                        $uploadfile = $this->_bookModel::BOOK_COVERS_DIR . $uniqueName;
                    } while (file_exists($uploadfile));

                    if (!copy($_FILES['book-cover']['tmp_name'], $uploadfile)) {
                        $error .= "<li>File upload failed.</li>";
                        require $this->view_path . "create_book_template.php";
                        return;
                    }

                    //Пошук жанру за id
                    $genre = null;
                    foreach ($genres as $current_genre) {
                        if ($current_genre->ID == $_POST['book-genre-id']) {
                            $genre = $current_genre;
                            break;
                        }
                    }

                    //Створення книги
                    $new_book = new Book(null, 
                                        $_POST['book-name'], 
                                        $_POST['book-author'],
                                        $_POST['book-short-description'],
                                        $_POST['book-full-description'],
                                        $_POST['book-price'],
                                        $_POST['book-page-count'],
                                        $genre,
                                        new BookCover(-1, substr($uploadfile, 1), -1)
                    );

                    $new_book = $this->_bookModel->CreateBook($new_book);
                    return header("Location: /book/show/{$new_book->ID}");
                }
            }
            require $this->view_path . "create_book_template.php";
        } else {
            require $this->view_path . "wrong_page_template.php";
        }
    }
}