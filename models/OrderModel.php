<?php
require_once "models/Model.php";
require_once "entities/Order.php";
require_once "entities/OrderStatus.php";

class OrderModel extends Model
{
    protected $_bookModel;
    protected $_userModel;

    public function __construct(BookModel $bookModel, UserModel $userModel, DBConnection $dbcon)
    {
        parent::__construct($dbcon);
        $this->_bookModel = $bookModel;
        $this->_userModel = $userModel;
    }

    public function GetStatuses(): array
    {
        $order_statuses_rows = $this->dbcon->readAll(self::ORDER_STATUSES_TABLE);
        $order_statuses = [];

        foreach ($order_statuses_rows as $order_status_row) {
            $order_statuses[] = new OrderStatus($order_status_row['id'], $order_status_row['name']);
        }

        return $order_statuses;
    }

    public function GetOrderStatusByName(string $name): ?OrderStatus
    {
        $order_statuses = $this->GetStatuses();
        foreach ($order_statuses as $order_status)
            if ($order_status->Name == $name)
                return $order_status;

        return null;
    }

    public function GetAllOrders(): array
    {
        $order_rows = $this->dbcon->readAll(self::ORDERS_TABLE);
        $books = $this->_bookModel->GetAllBooks();
        $statuses = $this->GetStatuses();
        $users = $this->_userModel->GetAllUsers();
        $orders = [];

        foreach ($order_rows as $order_row) {
            foreach ($books as $book)
                if ($book->ID == $order_row['book_id'])
                    $current_book = $book;

            foreach ($statuses as $status)
                if ($status->ID == $order_row['status_id'])
                    $current_status = $status;

            foreach ($users as $user)
                if ($user->ID == $order_row['user_id'])
                    $current_user = $user;

            $orders[] = new Order(
                $order_row['id'],
                $order_row['buyer_name'],
                $order_row['buyer_phone'],
                $current_book,
                $current_user,
                new DateTime($order_row['created_date']),
                $current_status
            );
        }

        //Сортування за датою створення (від актуального до застарілого)
        usort($orders, function($a, $b) {return $b->CreatedDate <=> $a->CreatedDate;});
        return $orders;
    }

    public function GetOrdersByUser(User $user): array
    {
        $all_orders = $this->GetAllOrders();
        $orders_by_user = [];
        foreach($all_orders as $order)
        {
            if ($order->User->ID == $user->ID)
                $orders_by_user[] = $order;
        }
        return $orders_by_user;
    }

    public function CreateOrder(Order $order): bool
    {
        $columns = "`buyer_name`, `buyer_phone`, `book_id`, `user_id`, `created_date`, `status_id`";
        $values = "'{$order->BuyerName}', 
                   '{$order->BuyerPhone}', 
                    {$order->Book->ID}, 
                    {$order->User->ID},
                    '{$order->CreatedDate->format('Y-m-d h:i:s')}', 
                    {$order->Status->ID}";
        $result = $this->dbcon->insert(self::ORDERS_TABLE, $columns, $values);
        return $result;
    }

    public function DeleteOrderById(int $order_id)
    {
        return $this->dbcon->delete($order_id, self::ORDERS_TABLE);
    }

    public function UpdateOrderStatus(int $order_id, int $new_status_id)
    {
        return $this->dbcon->change("status_id", "`{$new_status_id}`", $order_id, self::ORDERS_TABLE);
    }
}
