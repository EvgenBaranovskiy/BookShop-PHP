<?php
class Order 
{
    public $ID;
    public $BuyerName;
    public $BuyerPhone;
    public $Book;
    public $User;
    public $CreatedDate;
    public $Status;

    public function __construct(int $ID, 
                                string $BuyerName, 
                                string $BuyerPhone, 
                                Book $Book,
                                User $User,
                                DateTime $CreatedDate,
                                OrderStatus $Status
                                )
{
    $this->ID = $ID;
    $this->BuyerName = $BuyerName;
    $this->BuyerPhone = $BuyerPhone;
    $this->Book = $Book;
    $this->User = $User;
    $this->CreatedDate = $CreatedDate;
    $this->Status = $Status;
}

}
