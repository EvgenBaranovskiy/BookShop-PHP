<?php

class OrderStatus
{
    public $ID;
    public $Name;

    public function __construct(int $ID, string $Name)
    {
        $this->ID = $ID;
        $this->Name = $Name;
    }
}
