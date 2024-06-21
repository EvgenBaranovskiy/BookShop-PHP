<?php
class User 
{
    public $ID;
    public $Login;
    public $Password;
    public $IsAdmin;

    public function __construct(int $ID, string $Login, string $password, bool $IsAdmin)
    {
        $this->ID = $ID;
        $this->Login = $Login;
        $this->Password = $password;
        $this->IsAdmin = $IsAdmin;
    }
}
