<?php
class BookCover
{
    public $ID;
    public $ImgUrl;
    public $BookId;

    public function __construct(int $ID, string $ImgUrl, int $BookId)
    {
        $this->ID = $ID;
        $this->ImgUrl = $ImgUrl;
        $this->BookId = $BookId;
    }
}
