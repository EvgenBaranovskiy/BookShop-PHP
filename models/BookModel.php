<?php
require_once "models/Model.php";
require_once "entities/Book.php";
require_once "entities/BookGenre.php";
require_once "entities/BookCover.php";

class BookModel extends Model
{
    public function GetBookById($book_id): ?Book
    {
        $books = $this->GetAllBooks();

        foreach ($books as $book)
            if ($book->ID == $book_id)
                return $book;
        return null;
    }

    public function GetAllBooks(): array
    {
        $book_rows = $this->dbcon->readAll(self::BOOKS_TABLE);

        $books = [];
        $avaliable_genres = $this->GetAllGenres();
        $book_covers = $this->GetAllBookCovers();

        foreach ($book_rows as $book_row) {
            $current_book = new Book();
            $current_book->ID = $book_row['id'];
            $current_book->Name = $book_row['name'];
            $current_book->Author = $book_row['author'];
            $current_book->ShortDescription = $book_row['short_description'];
            $current_book->FullDescription = $book_row['full_description'];
            $current_book->Price = $book_row['price'];
            $current_book->PageCount = $book_row['page_count'];
            $current_book->ID = $book_row['id'];

            foreach ($avaliable_genres as $genre)
                if ($genre->ID == $book_row['genre_id']) {
                    $current_book->Genre = $genre;
                    break;
                }

            foreach ($book_covers as $book_cover)
                if ($book_cover->BookId == $book_row['id']) {
                    $current_book->ImgCover = $book_cover;
                    break;
                }

            $books[] = $current_book;
        }

        return $books;
    }

    public function GetAllGenres(): array
    {
        $genres_rows = $this->dbcon->readAll(self::GENRES_TABLE);
        $genres = [];
        foreach ($genres_rows as $genre_row) {
            $genres[] = new BookGenre($genre_row['id'], $genre_row['name']);
        }
        return $genres;
    }

    public function GetGenreById($genre_id) : BookGenre
    {
        $genres = $this->GetAllGenres();
        foreach($genres as $genre)
            if ($genre->ID == $genre_id)
                return $genre;
        
        return null;
    }

    public function CountBooksByGenre(BookGenre $genre): int
    {
        $result = $this->dbcon->read("id", self::BOOKS_TABLE, "genre_id = {$genre->ID}" );
        return count($result);
    }

    public function GetAllBookCovers(): array
    {
        $bookcover_rows = $this->dbcon->readAll(self::BOOK_COVERS_TABLE);
        $book_covers = [];
        foreach ($bookcover_rows as $book_cover_row) {
            $book_covers[] = new BookCover(
                $book_cover_row['id'],
                $book_cover_row['img_url'],
                $book_cover_row['book_id']
            );
        }
        return $book_covers;
    }
}