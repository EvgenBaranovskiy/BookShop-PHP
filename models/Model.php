<?php
    require_once "./DBConnection.php";

    abstract class Model {
        protected  $dbcon;
        protected const BOOKS_TABLE = "books";
        protected const GENRES_TABLE = "genres";
        protected const BOOK_COVERS_TABLE = "book_covers";
        protected const USERS_TABLE = "users";
        protected const ORDER_STATUSES_TABLE = "order_status";
        protected const ORDERS_TABLE = "book_orders";
        
        public function __construct(DBConnection $dbcon)
        {
            $this->dbcon = $dbcon;
            $this->dbcon->connect();
        }
    }