<?php
class Book
{
    public $ID;
    public $Name;
    public $Author;
    public $ShortDescription;
    public $FullDescription;
    public $Price;
    public $PageCount;
    public $Genre;
    public $ImgCover;

    public function __construct(int $ID = null, 
                                string $Name = null,
                                string $Author = null,
                                string $ShortDescription = null, 
                                string $FullDescription = null,
                                float $Price = null,
                                int $PageCount = null,
                                BookGenre $Genre = null,
                                BookCover $ImgCover = null                                
                                )
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Author = $Author;
        $this->ShortDescription = $ShortDescription;
        $this->FullDescription = $FullDescription;
        $this->Price = $Price;
        $this->PageCount = $PageCount;
        $this->Genre = $Genre;
        $this->ImgCover = $ImgCover;
    }
}
