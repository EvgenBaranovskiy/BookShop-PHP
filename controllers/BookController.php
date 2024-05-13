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

        public function index($books_per_page = 6) {
            $this->page(1);
        }

        public function page(int $page_number,  int $books_per_page = 6)
        {
            $user = $this->_userModel->get_current_user();
            $is_auth = $this->_userModel->is_auth();
            $books = $this->_bookModel->GetAllBooks();

            //Вибірка за жанром
            if (!empty($_GET['genre-id']))
            {
                
                $book_genre = $this->_bookModel->GetGenreById($_GET['genre-id']);

                $books = array_filter($books, function($book) use ($book_genre) 
                { 
                    return $book->Genre->ID == $book_genre->ID;
                });
            }
            
            //Розрахунок фрейму книжок 
            $total_count_of_books = count($books); 
            $total_page_count = ceil(count($books) / $books_per_page);
            $start_index = $page_number * $books_per_page - $books_per_page;
            $books_on_page = array_slice($books, $start_index, $books_per_page);
            
            if (count($books_on_page) > 0)
            {
                require $this->view_path . "index_template.php";
            }
            else
            {
                require $this->view_path . "wrong_page_template.php";
            }
        }

        public function genres()
        {
            $user = $this->_userModel->get_current_user();
            $is_auth = $this->_userModel->is_auth();

            if (isset($_POST['genre-open-btn']))
            {
                header("Location: /book/page/1?genre-id={$_POST['genre-id']}");
                return;
            }

            $genres = $this->_bookModel->GetAllGenres();
            foreach($genres as $genre)
            {
                $genre->books_count = $this->_bookModel->CountBooksByGenre($genre);
            }

            require $this->view_path . "show_genres_template.php";
        }

        public function show($book_id)
        {
            $user = $this->_userModel->get_current_user();
            $is_auth = $this->_userModel->is_auth();
            $book = $this->_bookModel->GetBookById($book_id);

            if (!is_null($book))
            {
                require $this->view_path . "show_book_template.php";
            }
            else
            {
                require $this->view_path . "wrong_page_template.php";
            }
        }
    }